<?php
/**
 * REVO LUX MEDIA - Configuration File
 * Built with modern, secure PHP standards (PHP 8.2+ compatible, PHP 7.4+ safe)
 */

declare(strict_types=1);

// Prevent direct script execution if accessed outside root
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    http_response_code(403);
    exit('Direct access not permitted');
}

// 1. Set Timezone for Malaysia (Kuala Lumpur)
date_default_timezone_set('Asia/Kuala_Lumpur');

// 2. Error Reporting: log errors privately, do not display raw stack traces to users
ini_set('display_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

// 3. Secure Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_path', '/');
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || ($_SERVER['SERVER_PORT'] ?? 80) == 443;
    ini_set('session.cookie_secure', $isHttps ? '1' : '0');
    ini_set('session.cookie_samesite', 'Lax');
    
    session_name('REVOLUX_SESSID');
    session_start();
}

// 4. Application Paths & URLs
define('APP_ROOT', dirname(__DIR__));
define('DATA_PATH', APP_ROOT . DIRECTORY_SEPARATOR . 'data');
define('LOG_PATH', APP_ROOT . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'app.log');

// Base URL calculation
$scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
$baseUrl = rtrim(str_replace('\\', '/', $scriptDir), '/');
if (substr($baseUrl, -6) === '/admin') {
    $baseUrl = substr($baseUrl, 0, -6);
}
define('BASE_URL', $baseUrl);

// 5. Default Brand Constants
define('BRAND_NAME', 'REVO LUX MEDIA');
define('BRAND_NETWORK', 'REVO PREMIUM MOBILE MEDIA NETWORK');
define('BRAND_DOMAIN', 'REVOLUXMEDIA.my.id');
define('PRIMARY_TAGLINE', 'YOUR BRAND. OUR JOURNEY.');
define('SECONDARY_TAGLINE', 'THE MEDIA NETWORK INSIDE THE JOURNEY.');
define('MALAY_HEADLINE', 'IKLANKAN JENAMA ANDA DALAM ALPHARD & VELLFIRE.');
define('DEFAULT_PHONE', '+60 11-1188 6654');
define('DEFAULT_WHATSAPP_NUM', '601111886654');
define('DEFAULT_EMAIL', 'SMGMH23@GMAIL.COM');
define('TARGET_FLEET_COUNT', 50);

// Pre-filled WhatsApp message
define('DEFAULT_WA_MESSAGE', 'Salam REVO, saya ingin mengetahui lebih lanjut tentang peluang pengiklanan melalui Toyota Alphard dan Toyota Vellfire. Boleh kongsikan maklumat kempen dan pakej yang tersedia?');

// Generate safe WhatsApp link helper
function getWhatsAppUrl(string $customMessage = ''): string {
    $msg = !empty($customMessage) ? $customMessage : DEFAULT_WA_MESSAGE;
    return 'https://wa.me/' . DEFAULT_WHATSAPP_NUM . '?text=' . rawurlencode($msg);
}
