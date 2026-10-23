<?php
/**
 * REVO LUX MEDIA - Security Hardening Module
 * Protects against CVE-2024-4577, XSS, CSRF, Injection & Automated Spam
 */

declare(strict_types=1);

// Prevent direct execution
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    http_response_code(403);
    exit('Direct access not permitted');
}

/**
 * 1. Runtime Guard for CVE-2024-4577 and CGI Argument Injection
 * Even if Apache rewrite module is bypassed or running standalone, PHP catches this.
 */
function guardAgainstCgiArgumentInjection(): void {
    $queryString = $_SERVER['QUERY_STRING'] ?? '';
    $requestUri = $_SERVER['REQUEST_URI'] ?? '';

    // Check for encoded soft hyphens or dashes combined with PHP flags
    $suspiciousPatterns = [
        '/%2d/i',
        '/%ad/i',
        '/^[ \t]*(?:-|\xad)/i',
        '/auto_prepend_file/i',
        '/auto_append_file/i',
        '/allow_url_include/i',
        '/disable_functions/i',
        '/php:\/\/input/i',
        '/php:\/\/filter/i',
        '/data:\/\//i',
        '/cgi-bin/i',
        '/\0/' // Null byte
    ];

    foreach ($suspiciousPatterns as $pattern) {
        if (preg_match($pattern, $queryString) || preg_match($pattern, $requestUri)) {
            // Log security event safely
            error_log(sprintf('[SECURITY_ALERT] Blocked suspicious request: %s from IP %s', $requestUri, $_SERVER['REMOTE_ADDR'] ?? 'unknown'));
            http_response_code(400);
            exit('400 Bad Request: Malformed request parameters detected.');
        }
    }
}

// Run the guard immediately
guardAgainstCgiArgumentInjection();

/**
 * 2. Send Secure HTTP Response Headers
 */
function sendSecurityHeaders(): void {
    if (headers_sent()) {
        return;
    }
    
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
    
    // Modern Content Security Policy (allows Google Fonts and SVG icons)
    $csp = "default-src 'self'; " .
           "img-src 'self' data: https:; " .
           "script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; " .
           "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; " .
           "font-src 'self' https://fonts.gstatic.com data:; " .
           "connect-src 'self'; " .
           "frame-ancestors 'self'; " .
           "base-uri 'self'; " .
           "form-action 'self';";
           
    header("Content-Security-Policy: {$csp}");
}

/**
 * 3. CSRF Protection
 */
function generateCsrfToken(): string {
    if (empty($_SESSION['csrf_token']) || empty($_SESSION['csrf_token_time']) || (time() - $_SESSION['csrf_token_time'] > 7200)) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $_SESSION['csrf_token_time'] = time();
    }
    return $_SESSION['csrf_token'];
}

function validateCsrfToken(?string $token): bool {
    if (empty($token) || empty($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * 4. HTML Escaping Helper (XSS Prevention)
 */
function e(?string $value): string {
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * 5. Input Sanitization Helpers
 */
function cleanInput(?string $data): string {
    if ($data === null) {
        return '';
    }
    $data = trim($data);
    // Strip control characters except newline and tab
    $data = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $data);
    return $data ?? '';
}

function cleanPhone(?string $phone): string {
    if ($phone === null) {
        return '';
    }
    // Remove everything except digits and '+'
    $clean = preg_replace('/[^\d+]/', '', $phone) ?? '';
    // Normalize Malaysian numbers: if starts with '01', convert to '601'
    if (strpos($clean, '01') === 0) {
        $clean = '6' . $clean;
    } elseif (strpos($clean, '+60') === 0) {
        $clean = substr($clean, 1);
    }
    return $clean;
}

/**
 * 6. Spam Prevention: Honeypot & Timestamp verification
 */
function verifyFormAntiSpam(array $postData, int $minSeconds = 2): array {
    // 1. Honeypot check (field named 'revo_hp' should remain empty)
    if (!empty($postData['revo_hp'])) {
        return ['valid' => false, 'error' => 'Panggilan ditolak oleh sistem keselamatan anti-spam.'];
    }

    // 2. Submission speed check (bots submit in under 1-2 seconds)
    $formLoadTime = isset($postData['form_loaded_at']) ? (int)$postData['form_loaded_at'] : 0;
    if ($formLoadTime > 0 && (time() - $formLoadTime < $minSeconds)) {
        return ['valid' => false, 'error' => 'Penyerahan terlalu pantas. Sila cuba sebentar lagi.'];
    }

    return ['valid' => true, 'error' => ''];
}
