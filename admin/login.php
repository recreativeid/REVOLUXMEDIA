<?php
/**
 * REVO LUX MEDIA — Admin Login Portal
 * Secure session authentication with brute-force delay and CSRF protection
 */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/security.php';
require_once __DIR__ . '/../includes/data_manager.php';

sendSecurityHeaders();

// If already logged in, redirect to dashboard
if (!empty($_SESSION['revo_admin_logged_in'])) {
    header('Location: index.php');
    exit;
}

$error = '';
$csrfToken = generateCsrfToken();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedCsrf = $_POST['csrf_token'] ?? '';
    if (!validateCsrfToken($submittedCsrf)) {
        $error = 'Sesi keselamatan tamat tempoh. Sila cuba lagi.';
    } else {
        $username = cleanInput($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        // Prevent brute force with small artificial sleep (300ms)
        usleep(300000);

        if (RevoDataManager::verifyAdmin($username, $password)) {
            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);
            $_SESSION['revo_admin_logged_in'] = true;
            $_SESSION['revo_admin_user'] = $username;
            $_SESSION['revo_admin_login_time'] = time();

            header('Location: index.php');
            exit;
        } else {
            $error = 'Nama pengguna atau kata laluan tidak tepat.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal Login | REVO LUX MEDIA</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    .admin-login-body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(circle at top, #181E26 0%, #050608 100%);
      padding: 20px;
    }
    .admin-login-card {
      background: var(--c-charcoal);
      border: 1px solid rgba(201, 164, 92, 0.35);
      border-radius: var(--radius-md);
      padding: 36px 30px;
      max-width: 420px;
      width: 100%;
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.8);
    }
    .login-brand {
      text-align: center;
      margin-bottom: 24px;
    }
    .login-brand .brand-emblem {
      margin: 0 auto 12px auto;
    }
    .login-title {
      font-size: 1.35rem;
      font-weight: 700;
      color: var(--c-white);
    }
    .login-subtitle {
      font-size: 0.8rem;
      color: var(--c-silver);
      margin-top: 4px;
    }
    .default-creds-hint {
      background: rgba(201, 164, 92, 0.08);
      border: 1px dashed rgba(201, 164, 92, 0.3);
      padding: 10px 14px;
      border-radius: 4px;
      margin-top: 20px;
      font-size: 0.775rem;
      color: var(--c-silver);
    }
  </style>
</head>
<body class="admin-login-body">

  <div class="admin-login-card">
    <div class="login-brand">
      <div class="brand-emblem">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
          <polyline points="2 17 12 22 22 17"></polyline>
          <polyline points="2 12 12 17 22 12"></polyline>
        </svg>
      </div>
      <div class="login-title">REVO LUX MEDIA</div>
      <div class="login-subtitle">Administrator Management Portal</div>
    </div>

    <?php if (!empty($error)): ?>
      <div class="form-feedback error" style="display:block; margin-bottom: 20px;">
        <?= e($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="login.php" novalidate>
      <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

      <div class="form-group" style="margin-bottom: 16px;">
        <label for="username">Nama Pengguna (Username)</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="admin" required autofocus>
      </div>

      <div class="form-group" style="margin-bottom: 24px;">
        <label for="password">Kata Laluan (Password)</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="••••••••••••" required>
      </div>

      <button type="submit" class="btn btn-primary btn-full-mobile">
        <span>LOG MASUK SISTEM</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
    </form>

    <div class="default-creds-hint">
      <strong style="color: var(--c-gold-champagne);">Maklumat Log Masuk Lalai:</strong><br>
      Pengguna: <code style="color:#FFF;">admin</code> | Kata Laluan: <code style="color:#FFF;">RevoAdmin@2026!</code><br>
      <span style="font-size: 0.725rem; color: #8F949E;">(Kata laluan boleh ditukar pada bila-bila masa di dalam dashboard).</span>
    </div>

    <div style="text-align: center; margin-top: 20px;">
      <a href="../index.php" class="btn-text-link" style="font-size: 0.8rem;">
        &larr; Kembali ke Laman Web Utama
      </a>
    </div>
  </div>

</body>
</html>
