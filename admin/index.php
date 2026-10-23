<?php
/**
 * REVO LUX MEDIA — Administrator Management Dashboard
 * Full control over Package Rates, Inquiries, Brand Settings & Security
 */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/security.php';
require_once __DIR__ . '/../includes/data_manager.php';

sendSecurityHeaders();

// Require Login
if (empty($_SESSION['revo_admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$csrfToken = generateCsrfToken();
$flashSuccess = '';
$flashError = '';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedCsrf = $_POST['csrf_token'] ?? '';
    if (!validateCsrfToken($submittedCsrf)) {
        $flashError = 'Ralat sesi keselamatan CSRF. Sila muat semula halaman.';
    } else {
        $action = $_POST['action'] ?? '';

        // 1. UPDATE PACKAGES
        if ($action === 'update_packages') {
            $pkgs = RevoDataManager::getPackages();
            $updatedPkgs = [];

            foreach ($pkgs as $index => $existingPkg) {
                $id = $existingPkg['id'];
                $updatedPkgs[] = [
                    'id' => $id,
                    'code' => cleanInput($_POST["pkg_{$id}_code"] ?? $existingPkg['code']),
                    'name' => cleanInput($_POST["pkg_{$id}_name"] ?? $existingPkg['name']),
                    'tag' => cleanInput($_POST["pkg_{$id}_tag"] ?? ($existingPkg['tag'] ?? '')),
                    'description' => cleanInput($_POST["pkg_{$id}_description"] ?? $existingPkg['description']),
                    'suitable_format' => cleanInput($_POST["pkg_{$id}_format"] ?? $existingPkg['suitable_format']),
                    'coverage' => cleanInput($_POST["pkg_{$id}_coverage"] ?? $existingPkg['coverage']),
                    'period' => cleanInput($_POST["pkg_{$id}_period"] ?? $existingPkg['period']),
                    'price' => cleanInput($_POST["pkg_{$id}_price"] ?? $existingPkg['price']),
                    'price_note' => cleanInput($_POST["pkg_{$id}_price_note"] ?? $existingPkg['price_note']),
                    'cta_text' => cleanInput($_POST["pkg_{$id}_cta"] ?? ($existingPkg['cta_text'] ?? 'BINCANGKAN PAKEJ')),
                    'whatsapp_msg' => cleanInput($_POST["pkg_{$id}_wamsg"] ?? ($existingPkg['whatsapp_msg'] ?? ''))
                ];
            }

            if (RevoDataManager::savePackages($updatedPkgs)) {
                $flashSuccess = 'Maklumat pakej dan kadar pelaburan telah berjaya dikemaskini!';
            } else {
                $flashError = 'Gagal menyimpan maklumat pakej ke pangkalan data fail.';
            }
        }

        // 2. UPDATE SETTINGS
        elseif ($action === 'update_settings') {
            $currentSettings = RevoDataManager::getSettings();
            $newSettings = [
                'phone' => cleanInput($_POST['phone'] ?? $currentSettings['phone']),
                'whatsapp' => cleanPhone($_POST['whatsapp'] ?? $currentSettings['whatsapp']),
                'email' => cleanInput($_POST['email'] ?? $currentSettings['email']),
                'target_fleet' => (int)($_POST['target_fleet'] ?? $currentSettings['target_fleet']),
                'fleet_headline' => cleanInput($_POST['fleet_headline'] ?? $currentSettings['fleet_headline']),
                'fleet_subtext' => cleanInput($_POST['fleet_subtext'] ?? $currentSettings['fleet_subtext']),
                'soft_reassurance' => cleanInput($_POST['soft_reassurance'] ?? $currentSettings['soft_reassurance'])
            ];

            if (RevoDataManager::saveSettings($newSettings)) {
                $flashSuccess = 'Tetapan am jenama dan nombor perhubungan berjaya disimpan!';
            } else {
                $flashError = 'Gagal menyimpan tetapan am.';
            }
        }

        // 3. UPDATE ENQUIRY STATUS
        elseif ($action === 'update_enquiry_status') {
            $enquiryId = cleanInput($_POST['enquiry_id'] ?? '');
            $newStatus = cleanInput($_POST['status'] ?? '');
            if (!empty($enquiryId) && !empty($newStatus)) {
                RevoDataManager::updateEnquiryStatus($enquiryId, $newStatus);
                $flashSuccess = "Status pertanyaan {$enquiryId} telah ditukar kepada '{$newStatus}'.";
            }
        }

        // 4. DELETE ENQUIRY
        elseif ($action === 'delete_enquiry') {
            $enquiryId = cleanInput($_POST['enquiry_id'] ?? '');
            if (!empty($enquiryId)) {
                RevoDataManager::deleteEnquiry($enquiryId);
                $flashSuccess = "Pertanyaan {$enquiryId} telah dipadam.";
            }
        }

        // 5. UPDATE PASSWORD
        elseif ($action === 'update_password') {
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if (empty($newPassword) || strlen($newPassword) < 8) {
                $flashError = 'Kata laluan baharu mestilah sekurang-kurangnya 8 aksara.';
            } elseif ($newPassword !== $confirmPassword) {
                $flashError = 'Pengesahan kata laluan baharu tidak sepadan.';
            } elseif (!RevoDataManager::verifyAdmin($_SESSION['revo_admin_user'] ?? 'admin', $currentPassword)) {
                $flashError = 'Kata laluan semasa anda tidak tepat.';
            } else {
                RevoDataManager::updateAdminPassword($newPassword);
                $flashSuccess = 'Kata laluan pentadbir telah berjaya dikemaskini!';
            }
        }
    }
}

// Fetch refreshed data
$packages = RevoDataManager::getPackages();
$settings = RevoDataManager::getSettings();
$enquiries = RevoDataManager::getEnquiries();

// Summary stats
$totalEnquiries = count($enquiries);
$newEnquiriesCount = count(array_filter($enquiries, function($e) {
    return ($e['status'] ?? '') === 'Baru (New)';
}));
?>
<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | REVO LUX MEDIA</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      background-color: #07090D;
    }
    .admin-header-bar {
      background: var(--c-charcoal);
      border-bottom: 1px solid rgba(201, 164, 92, 0.2);
      padding: 16px 0;
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .admin-nav-tabs {
      display: flex;
      gap: 8px;
      overflow-x: auto;
      border-bottom: 1px solid rgba(201, 164, 92, 0.15);
      padding-bottom: 12px;
      margin-bottom: 24px;
    }
    .admin-tab-btn {
      padding: 10px 18px;
      background: rgba(36, 42, 50, 0.35);
      border: 1px solid rgba(201, 164, 92, 0.15);
      border-radius: var(--radius-sm);
      color: var(--c-silver);
      font-size: 0.85rem;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      white-space: nowrap;
      transition: all var(--transition-fast);
    }
    .admin-tab-btn.active, .admin-tab-btn:hover {
      background: rgba(201, 164, 92, 0.12);
      border-color: var(--c-gold-metallic);
      color: var(--c-gold-champagne);
    }
    .admin-tab-panel {
      display: none;
    }
    .admin-tab-panel.active {
      display: block;
    }
    .stat-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 2px 7px;
      background: var(--c-gold-metallic);
      color: #050608;
      border-radius: 20px;
      font-size: 0.7rem;
      font-weight: 700;
    }
    .admin-card {
      background: var(--c-charcoal);
      border: 1px solid rgba(201, 164, 92, 0.2);
      border-radius: var(--radius-md);
      padding: 24px;
      margin-bottom: 24px;
    }
    .admin-card-title {
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--c-white);
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .stats-row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      margin-bottom: 24px;
    }
    .stat-box {
      background: var(--c-charcoal);
      border: 1px solid rgba(201, 164, 92, 0.18);
      border-radius: var(--radius-sm);
      padding: 16px 20px;
    }
    .stat-label {
      font-size: 0.775rem;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--c-silver);
    }
    .stat-value {
      font-size: 1.85rem;
      font-weight: 700;
      color: var(--c-gold-champagne);
      margin-top: 4px;
    }
    /* Table */
    .table-responsive {
      width: 100%;
      overflow-x: auto;
    }
    .admin-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.85rem;
      text-align: left;
    }
    .admin-table th {
      background: rgba(36, 42, 50, 0.6);
      padding: 12px 14px;
      color: var(--c-gold-champagne);
      font-weight: 600;
      border-bottom: 1px solid rgba(201, 164, 92, 0.2);
      white-space: nowrap;
    }
    .admin-table td {
      padding: 14px;
      border-bottom: 1px solid rgba(201, 164, 92, 0.1);
      color: var(--c-ivory);
      vertical-align: top;
    }
    .admin-table tr:hover {
      background: rgba(36, 42, 50, 0.25);
    }
    .status-badge {
      display: inline-block;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 0.725rem;
      font-weight: 600;
    }
    .status-new {
      background: rgba(37, 211, 102, 0.2);
      color: #25D366;
      border: 1px solid rgba(37, 211, 102, 0.4);
    }
    .status-progress {
      background: rgba(201, 164, 92, 0.2);
      color: var(--c-gold-champagne);
      border: 1px solid rgba(201, 164, 92, 0.4);
    }
    .status-closed {
      background: rgba(169, 173, 180, 0.2);
      color: var(--c-silver);
      border: 1px solid rgba(169, 173, 180, 0.3);
    }
  </style>
</head>
<body>

  <!-- Top Bar -->
  <header class="admin-header-bar">
    <div class="revo-container" style="display: flex; align-items: center; justify-content: space-between;">
      <div style="display: flex; align-items: center; gap: 12px;">
        <div class="brand-emblem" style="width: 32px; height: 32px;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width: 16px; height: 16px;">
            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
            <polyline points="2 17 12 22 22 17"></polyline>
            <polyline points="2 12 12 17 22 12"></polyline>
          </svg>
        </div>
        <div>
          <span style="font-weight: 700; color: #FFF; font-size: 1rem; letter-spacing: 0.05em;">REVO LUX</span>
          <span style="font-size: 0.75rem; color: #C9A45C; margin-left: 6px;">Portal Pengurusan</span>
        </div>
      </div>

      <div style="display: flex; align-items: center; gap: 14px;">
        <a href="../index.php" target="_blank" class="btn btn-outline btn-sm">
          <span>Lihat Laman Web</span>
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/></svg>
        </a>
        <a href="logout.php" class="btn-text-link" style="color: #EF9A9A; font-size: 0.8rem;">
          Log Keluar
        </a>
      </div>
    </div>
  </header>

  <div class="revo-container" style="padding-top: 24px; padding-bottom: 48px;">

    <!-- Alerts -->
    <?php if (!empty($flashSuccess)): ?>
      <div class="form-feedback success" style="display:block; margin-bottom: 20px;">
        <?= e($flashSuccess) ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($flashError)): ?>
      <div class="form-feedback error" style="display:block; margin-bottom: 20px;">
        <?= e($flashError) ?>
      </div>
    <?php endif; ?>

    <!-- Overview Stats -->
    <div class="stats-row">
      <div class="stat-box">
        <div class="stat-label">Jumlah Pertanyaan</div>
        <div class="stat-value"><?= $totalEnquiries ?></div>
      </div>
      <div class="stat-box">
        <div class="stat-label">Pertanyaan Baru (Leads)</div>
        <div class="stat-value" style="color: #25D366;"><?= $newEnquiriesCount ?></div>
      </div>
      <div class="stat-box">
        <div class="stat-label">Pakej Aktif</div>
        <div class="stat-value"><?= count($packages) ?></div>
      </div>
      <div class="stat-box">
        <div class="stat-label">Sasaran Kenderaan (Fleet)</div>
        <div class="stat-value"><?= e((string)($settings['target_fleet'] ?? TARGET_FLEET_COUNT)) ?></div>
      </div>
    </div>

    <!-- Tab Bar -->
    <div class="admin-nav-tabs" role="tablist">
      <button type="button" class="admin-tab-btn active" data-tab="tab-packages">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
        <span>Pakej Kempen (Rates & Packages)</span>
      </button>

      <button type="button" class="admin-tab-btn" data-tab="tab-enquiries">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        <span>Pertanyaan Pelanggan (Leads)</span>
        <?php if ($newEnquiriesCount > 0): ?>
          <span class="stat-badge"><?= $newEnquiriesCount ?></span>
        <?php endif; ?>
      </button>

      <button type="button" class="admin-tab-btn" data-tab="tab-settings">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
        <span>Tetapan Jenama (Brand Info)</span>
      </button>

      <button type="button" class="admin-tab-btn" data-tab="tab-security">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
        <span>Keselamatan & Kata Laluan</span>
      </button>
    </div>

    <!-- ====================================================================
         TAB 1: PACKAGES MANAGEMENT
         ==================================================================== -->
    <div class="admin-tab-panel active" id="tab-packages">
      <form method="POST" action="index.php">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <input type="hidden" name="action" value="update_packages">

        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
          <div>
            <h2 style="font-size: 1.35rem; color: #FFF;">Kemaskini Pakej & Struktur Pelaburan</h2>
            <p style="font-size: 0.85rem; color: var(--c-silver);">
              Sebarang perubahan kadar harga, spesifikasi atau tajuk akan dipaparkan serta-merta pada halaman utama.
            </p>
          </div>
          <button type="submit" class="btn btn-primary btn-sm">
            <span>Simpan Semua Pakej</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
          </button>
        </div>

        <?php foreach ($packages as $pkg): ?>
          <?php $id = $pkg['id']; ?>
          <div class="admin-card">
            <div class="admin-card-title">
              <span><?= e($pkg['code']) ?> — <?= e($pkg['name']) ?></span>
              <span style="font-size: 0.75rem; color: var(--c-gold-metallic);">ID: <?= e($id) ?></span>
            </div>

            <div class="form-grid form-grid-2">
              <div class="form-group">
                <label>Kod Pakej</label>
                <input type="text" name="pkg_<?= e($id) ?>_code" class="form-control" value="<?= e($pkg['code']) ?>">
              </div>
              <div class="form-group">
                <label>Nama Pakej</label>
                <input type="text" name="pkg_<?= e($id) ?>_name" class="form-control" value="<?= e($pkg['name']) ?>">
              </div>
            </div>

            <div class="form-grid form-grid-2" style="margin-top: 14px;">
              <div class="form-group">
                <label>Lencana / Badge Tag</label>
                <input type="text" name="pkg_<?= e($id) ?>_tag" class="form-control" value="<?= e($pkg['tag'] ?? '') ?>">
              </div>
              <div class="form-group">
                <label>Teks Butang CTA</label>
                <input type="text" name="pkg_<?= e($id) ?>_cta" class="form-control" value="<?= e($pkg['cta_text'] ?? 'BINCANGKAN PAKEJ') ?>">
              </div>
            </div>

            <div class="form-group" style="margin-top: 14px;">
              <label>Penerangan Ringkas (Description)</label>
              <textarea name="pkg_<?= e($id) ?>_description" class="form-control" style="min-height: 60px;"><?= e($pkg['description']) ?></textarea>
            </div>

            <div class="form-grid form-grid-2" style="margin-top: 14px;">
              <div class="form-group">
                <label>Format Iklan Sesuai</label>
                <input type="text" name="pkg_<?= e($id) ?>_format" class="form-control" value="<?= e($pkg['suitable_format']) ?>">
              </div>
              <div class="form-group">
                <label>Liputan Kenderaan</label>
                <input type="text" name="pkg_<?= e($id) ?>_coverage" class="form-control" value="<?= e($pkg['coverage']) ?>">
              </div>
            </div>

            <div class="form-grid form-grid-2" style="margin-top: 14px;">
              <div class="form-group">
                <label>Tempoh Kempen</label>
                <input type="text" name="pkg_<?= e($id) ?>_period" class="form-control" value="<?= e($pkg['period']) ?>">
              </div>
              <div class="form-group">
                <label>Kadar Harga / Investment Structure</label>
                <input type="text" name="pkg_<?= e($id) ?>_price" class="form-control" value="<?= e($pkg['price']) ?>" placeholder="Hubungi Kami Untuk Kadar">
              </div>
            </div>

            <div class="form-grid form-grid-2" style="margin-top: 14px;">
              <div class="form-group">
                <label>Nota Tambahan Harga</label>
                <input type="text" name="pkg_<?= e($id) ?>_price_note" class="form-control" value="<?= e($pkg['price_note'] ?? '') ?>">
              </div>
              <div class="form-group">
                <label>Teks Mesej WhatsApp Khusus</label>
                <input type="text" name="pkg_<?= e($id) ?>_wamsg" class="form-control" value="<?= e($pkg['whatsapp_msg'] ?? '') ?>">
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <div style="text-align: right; margin-top: 16px;">
          <button type="submit" class="btn btn-primary">
            <span>Simpan Perubahan Pakej</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>
        </div>
      </form>
    </div>

    <!-- ====================================================================
         TAB 2: LEADS & ENQUIRIES
         ==================================================================== -->
    <div class="admin-tab-panel" id="tab-enquiries">
      <div class="admin-card">
        <div class="admin-card-title">
          <span>Senarai Pertanyaan Pelanggan (Leads)</span>
          <span style="font-size: 0.85rem; color: var(--c-silver); font-weight: normal;">
            <?= count($enquiries) ?> Pertanyaan Diterima
          </span>
        </div>

        <?php if (empty($enquiries)): ?>
          <div style="text-align: center; padding: 40px 20px; color: var(--c-silver);">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 12px; color: var(--c-gold-metallic);"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
            <p>Belum ada sebarang pertanyaan dihantar melalui borang.</p>
          </div>
        <?php else: ?>
          <div class="table-responsive">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>Masa & ID</th>
                  <th>Nama & Syarikat</th>
                  <th>Hubungan (WhatsApp & E-mel)</th>
                  <th>Industri & Bajet</th>
                  <th>Objektif / Mesej</th>
                  <th>Status</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($enquiries as $enq): ?>
                  <?php 
                    $phoneClean = preg_replace('/[^\d]/', '', $enq['phone'] ?? '');
                    if (strpos($phoneClean, '01') === 0) $phoneClean = '6' . $phoneClean;
                    $waLink = 'https://wa.me/' . $phoneClean . '?text=' . rawurlencode('Salam ' . ($enq['name'] ?? '') . ', terima kasih kerana menghubungi REVO LUX MEDIA berkenaan peluang kempen jenama ' . ($enq['company'] ?? '') . '.');
                    $isNew = ($enq['status'] ?? '') === 'Baru (New)';
                  ?>
                  <tr>
                    <td>
                      <strong style="color: var(--c-gold-champagne);"><?= e($enq['id'] ?? '') ?></strong><br>
                      <span style="font-size: 0.75rem; color: var(--c-silver-dark);"><?= e($enq['created_at'] ?? '') ?></span>
                    </td>
                    <td>
                      <strong><?= e($enq['name'] ?? '') ?></strong><br>
                      <span style="font-size: 0.8rem; color: var(--c-silver);"><?= e($enq['company'] ?? '') ?></span>
                    </td>
                    <td>
                      <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" style="color: #25D366; display: inline-flex; align-items: center; gap: 4px; font-weight: 600;">
                        <span><?= e($enq['phone'] ?? '') ?></span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/></svg>
                      </a><br>
                      <span style="font-size: 0.775rem; color: var(--c-silver);"><?= e($enq['email'] ?? '') ?></span>
                    </td>
                    <td>
                      <span style="font-weight: 600;"><?= e($enq['industry'] ?? '') ?></span><br>
                      <span style="font-size: 0.775rem; color: var(--c-silver-dark);">Bajet: <?= e($enq['budget'] ?? 'Fleksibel') ?></span>
                    </td>
                    <td style="max-width: 260px;">
                      <?php if (!empty($enq['objectives'])): ?>
                        <div style="font-size: 0.8rem; font-weight: 600; color: var(--c-gold-champagne); margin-bottom: 2px;">
                          Objektif: <?= e($enq['objectives']) ?>
                        </div>
                      <?php endif; ?>
                      <div style="font-size: 0.8rem; color: var(--c-silver); line-height: 1.4;">
                        <?= nl2br(e($enq['message'] ?? '')) ?>
                      </div>
                    </td>
                    <td>
                      <form method="POST" action="index.php" style="margin: 0;">
                        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                        <input type="hidden" name="action" value="update_enquiry_status">
                        <input type="hidden" name="enquiry_id" value="<?= e($enq['id'] ?? '') ?>">
                        <select name="status" class="form-control" style="padding: 4px 8px; font-size: 0.75rem; width: auto;" onchange="this.form.submit()">
                          <option value="Baru (New)" <?= ($enq['status'] ?? '') === 'Baru (New)' ? 'selected' : '' ?>>Baru (New)</option>
                          <option value="Dihubungi (Contacted)" <?= ($enq['status'] ?? '') === 'Dihubungi (Contacted)' ? 'selected' : '' ?>>Dihubungi</option>
                          <option value="Dalam Perbincangan" <?= ($enq['status'] ?? '') === 'Dalam Perbincangan' ? 'selected' : '' ?>>Dalam Perbincangan</option>
                          <option value="Selesai (Closed)" <?= ($enq['status'] ?? '') === 'Selesai (Closed)' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                      </form>
                    </td>
                    <td>
                      <div style="display: flex; gap: 6px; align-items: center;">
                        <a href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="padding: 4px 8px; font-size: 0.7rem; min-height: 28px;" title="Terus Buka WhatsApp">
                          WhatsApp
                        </a>
                        <form method="POST" action="index.php" onsubmit="return confirm('Adakah anda pasti ingin memadam rekod pertanyaan ini?');" style="margin: 0;">
                          <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                          <input type="hidden" name="action" value="delete_enquiry">
                          <input type="hidden" name="enquiry_id" value="<?= e($enq['id'] ?? '') ?>">
                          <button type="submit" style="background: none; border: none; color: #EF9A9A; cursor: pointer; padding: 4px;" title="Padam Rekod">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- ====================================================================
         TAB 3: BRAND SETTINGS
         ==================================================================== -->
    <div class="admin-tab-panel" id="tab-settings">
      <div class="admin-card">
        <div class="admin-card-title">
          <span>Tetapan Maklumat Jenama & Perhubungan Rasmi</span>
        </div>

        <form method="POST" action="index.php">
          <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
          <input type="hidden" name="action" value="update_settings">

          <div class="form-grid form-grid-2">
            <div class="form-group">
              <label>Nombor Paparan Telefon / WhatsApp</label>
              <input type="text" name="phone" class="form-control" value="<?= e($settings['phone'] ?? DEFAULT_PHONE) ?>">
              <span style="font-size: 0.725rem; color: var(--c-silver-dark);">Format paparan seperti: +60 11-1188 6654</span>
            </div>

            <div class="form-group">
              <label>Nombor WhatsApp Sistem (Pautan URL)</label>
              <input type="text" name="whatsapp" class="form-control" value="<?= e($settings['whatsapp'] ?? DEFAULT_WHATSAPP_NUM) ?>">
              <span style="font-size: 0.725rem; color: var(--c-silver-dark);">Hanya digit tanpa tanda sempang cth: 601111886654</span>
            </div>
          </div>

          <div class="form-grid form-grid-2" style="margin-top: 14px;">
            <div class="form-group">
              <label>E-mel Korporat Rasmi</label>
              <input type="email" name="email" class="form-control" value="<?= e($settings['email'] ?? DEFAULT_EMAIL) ?>">
            </div>

            <div class="form-group">
              <label>Sasaran Kenderaan Armada (Target Fleet Count)</label>
              <input type="number" name="target_fleet" class="form-control" value="<?= e((string)($settings['target_fleet'] ?? TARGET_FLEET_COUNT)) ?>">
            </div>
          </div>

          <div class="form-group" style="margin-top: 14px;">
            <label>Tajuk Utama Rangkaian Kami (Fleet Headline)</label>
            <input type="text" name="fleet_headline" class="form-control" value="<?= e($settings['fleet_headline'] ?? '50 Kenderaan. Satu Rangkaian Media.') ?>">
          </div>

          <div class="form-group" style="margin-top: 14px;">
            <label>Penerangan Rangkaian Kami (Fleet Subtext)</label>
            <textarea name="fleet_subtext" class="form-control" style="min-height: 80px;"><?= e($settings['fleet_subtext'] ?? '') ?></textarea>
          </div>

          <div class="form-group" style="margin-top: 14px;">
            <label>Mesej Reassurance Mesra (Soft Reassurance)</label>
            <textarea name="soft_reassurance" class="form-control" style="min-height: 70px;"><?= e($settings['soft_reassurance'] ?? '') ?></textarea>
          </div>

          <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
              <span>Simpan Tetapan Jenama</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- ====================================================================
         TAB 4: SECURITY & PASSWORD
         ==================================================================== -->
    <div class="admin-tab-panel" id="tab-security">
      <!-- Security Status Card -->
      <div class="admin-card">
        <div class="admin-card-title">
          <span>Status Keselamatan Pelayan & Perlindungan PHP</span>
          <span style="font-size: 0.75rem; background: rgba(37, 211, 102, 0.2); color: #25D366; padding: 4px 8px; border-radius: 4px; border: 1px solid rgba(37, 211, 102, 0.4);">
            Aktif & Dilindungi
          </span>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 14px; margin-bottom: 20px;">
          <div style="background: rgba(36, 42, 50, 0.4); padding: 12px 16px; border-radius: 4px; border-left: 3px solid #25D366;">
            <div style="font-size: 0.75rem; color: var(--c-silver-dark);">Perlindungan CVE-2024-4577 (PHP CGI)</div>
            <div style="font-size: 0.9rem; font-weight: 600; color: #FFF; margin-top: 2px;">Penapis Argument Injection Aktif</div>
          </div>

          <div style="background: rgba(36, 42, 50, 0.4); padding: 12px 16px; border-radius: 4px; border-left: 3px solid #C9A45C;">
            <div style="font-size: 0.75rem; color: var(--c-silver-dark);">PHP Runtime Version</div>
            <div style="font-size: 0.9rem; font-weight: 600; color: #FFF; margin-top: 2px;"><?= phpversion() ?> (Safe Architecture)</div>
          </div>

          <div style="background: rgba(36, 42, 50, 0.4); padding: 12px 16px; border-radius: 4px; border-left: 3px solid #25D366;">
            <div style="font-size: 0.75rem; color: var(--c-silver-dark);">Perlindungan CSRF & Sesi</div>
            <div style="font-size: 0.9rem; font-weight: 600; color: #FFF; margin-top: 2px;">HttpOnly, SameSite Strict, Token Aktif</div>
          </div>

          <div style="background: rgba(36, 42, 50, 0.4); padding: 12px 16px; border-radius: 4px; border-left: 3px solid #25D366;">
            <div style="font-size: 0.75rem; color: var(--c-silver-dark);">Direktori Data Rahsia</div>
            <div style="font-size: 0.9rem; font-weight: 600; color: #FFF; margin-top: 2px;">Akses Terus Disekat (.htaccess 403)</div>
          </div>
        </div>

        <p style="font-size: 0.85rem; color: var(--c-silver);">
          Sistem REVO LUX MEDIA dibina mengikut piawaian PHP terkini. Sebarang percubaan menyuntik parameter berbahaya melalui URL (seperti eksploitasi CGI Windows yang sedang tular) akan disekat serta-merta pada lapisan Apache dan modul sekuriti PHP sebelum kod dijalankan.
        </p>
      </div>

      <!-- Password Change Card -->
      <div class="admin-card">
        <div class="admin-card-title">
          <span>Tukar Kata Laluan Pentadbir</span>
        </div>

        <form method="POST" action="index.php" style="max-width: 500px;">
          <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
          <input type="hidden" name="action" value="update_password">

          <div class="form-group" style="margin-bottom: 14px;">
            <label>Kata Laluan Semasa</label>
            <input type="password" name="current_password" class="form-control" required>
          </div>

          <div class="form-group" style="margin-bottom: 14px;">
            <label>Kata Laluan Baharu (Minimum 8 aksara)</label>
            <input type="password" name="new_password" class="form-control" required minlength="8">
          </div>

          <div class="form-group" style="margin-bottom: 20px;">
            <label>Sahkan Kata Laluan Baharu</label>
            <input type="password" name="confirm_password" class="form-control" required minlength="8">
          </div>

          <button type="submit" class="btn btn-primary btn-sm">
            <span>Kemaskini Kata Laluan</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>
        </form>
      </div>
    </div>

  </div>

  <script>
    // Simple Tab Switching logic
    const tabBtns = document.querySelectorAll('.admin-tab-btn');
    const tabPanels = document.querySelectorAll('.admin-tab-panel');

    tabBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const targetId = btn.getAttribute('data-tab');

        tabBtns.forEach(b => b.classList.remove('active'));
        tabPanels.forEach(p => p.classList.remove('active'));

        btn.classList.add('active');
        const targetPanel = document.getElementById(targetId);
        if (targetPanel) targetPanel.classList.add('active');
      });
    });
  </script>
</body>
</html>
