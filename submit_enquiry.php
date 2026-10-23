<?php
/**
 * REVO LUX MEDIA - Contact Enquiry Submission Handler
 * Features: CSRF protection, anti-spam honeypot, strict validation, and atomic JSON persistence.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/security.php';
require_once __DIR__ . '/includes/data_manager.php';

sendSecurityHeaders();

$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

function respond(bool $success, string $message, array $extra = [], bool $isAjax = true): void {
    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array_merge([
            'success' => $success,
            'message' => $message
        ], $extra));
        exit;
    } else {
        if ($success) {
            $_SESSION['flash_success'] = $message;
            if (!empty($extra['wa_url'])) {
                header('Location: ' . $extra['wa_url']);
                exit;
            }
        } else {
            $_SESSION['flash_error'] = $message;
        }
        header('Location: index.php#contact');
        exit;
    }
}

// Accept only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    respond(false, 'Kaedah permintaan tidak sah (Method Not Allowed).', [], $isAjax);
}

// 1. Validate CSRF Token
$csrfToken = $_POST['csrf_token'] ?? '';
if (!validateCsrfToken($csrfToken)) {
    http_response_code(403);
    respond(false, 'Sesi keselamatan telah tamat tempoh. Sila muat semula halaman dan cuba lagi.', [], $isAjax);
}

// 2. Anti-Spam Checks (Honeypot + Timing)
$antiSpam = verifyFormAntiSpam($_POST);
if (!$antiSpam['valid']) {
    http_response_code(400);
    respond(false, $antiSpam['error'], [], $isAjax);
}

// 3. Extract and Sanitize Inputs
$name = cleanInput($_POST['name'] ?? '');
$company = cleanInput($_POST['company'] ?? '');
$email = cleanInput($_POST['email'] ?? '');
$rawPhone = cleanInput($_POST['phone'] ?? '');
$cleanPhone = cleanPhone($rawPhone);
$industry = cleanInput($_POST['industry'] ?? '');
$budget = cleanInput($_POST['budget'] ?? 'Belum ditentukan / Fleksibel');
$objectives = cleanInput($_POST['objectives'] ?? '');
$message = cleanInput($_POST['message'] ?? '');

// 4. Strict Validation
$errors = [];

if (empty($name) || mb_strlen($name) < 2) {
    $errors[] = 'Sila masukkan nama penuh anda.';
}

if (empty($company) || mb_strlen($company) < 2) {
    $errors[] = 'Sila masukkan nama syarikat atau perniagaan anda.';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Sila masukkan alamat e-mel yang sah.';
}

if (empty($cleanPhone) || strlen($cleanPhone) < 9) {
    $errors[] = 'Sila masukkan nombor WhatsApp yang sah (contoh: 012-3456789 atau +601111886654).';
}

if (empty($industry)) {
    $errors[] = 'Sila pilih kategori industri perniagaan anda.';
}

if (empty($message) && empty($objectives)) {
    $errors[] = 'Sila nyatakan objektif kempen atau mesej ringkas tentang keperluan anda.';
}

if (!empty($errors)) {
    http_response_code(422);
    respond(false, implode(' ', $errors), ['errors' => $errors], $isAjax);
}

// 5. Build Enquiry Data Array
$enquiryData = [
    'name' => $name,
    'company' => $company,
    'email' => $email,
    'phone' => $rawPhone,
    'phone_normalized' => $cleanPhone,
    'industry' => $industry,
    'budget' => $budget,
    'objectives' => $objectives,
    'message' => $message,
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'user_agent' => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255)
];

// Save Enquiry
$saved = RevoDataManager::addEnquiry($enquiryData);

if (!$saved) {
    http_response_code(500);
    respond(false, 'Maaf, ralat sistem berlaku semasa menyimpan maklumat. Sila hubungi kami terus melalui WhatsApp.', [], $isAjax);
}

// 6. Generate Direct WhatsApp Link with pre-filled message
$waText = "Salam REVO LUX MEDIA,\n\n" .
          "Saya telah menghantar pertanyaan melalui laman web:\n" .
          "• Nama: {$name}\n" .
          "• Syarikat: {$company}\n" .
          "• Industri: {$industry}\n" .
          "• E-mel: {$email}\n" .
          "• Anggaran Bajet: {$budget}\n" .
          "• Objektif: " . (!empty($objectives) ? $objectives : '-') . "\n" .
          "• Nota: " . (!empty($message) ? $message : 'Berminat berbincang tentang slot pengiklanan Alphard & Vellfire.') . "\n\n" .
          "Boleh kita bincangkan cadangan kempen yang bersesuaian?";

$waUrl = 'https://wa.me/' . DEFAULT_WHATSAPP_NUM . '?text=' . rawurlencode($waText);

// Rotate CSRF token after successful submission
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

respond(true, 'Terima kasih! Pertanyaan anda telah berjaya diterima. Pasukan REVO akan menghubungi anda tidak lama lagi, atau anda boleh terus berbual di WhatsApp.', [
    'wa_url' => $waUrl,
    'new_csrf' => $_SESSION['csrf_token']
], $isAjax);
