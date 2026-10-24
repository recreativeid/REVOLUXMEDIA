<?php
/**
 * REVO LUX MEDIA — REVO PREMIUM MOBILE MEDIA NETWORK
 * Primary Corporate Landing Page | Mobile-First Architecture
 * Market: Malaysia (Kuala Lumpur & Klang Valley)
 * PHP 8.2+ Modern Architecture & CVE-2024-4577 Hardened
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/security.php';
require_once __DIR__ . '/includes/data_manager.php';

// Send security headers (CSP, nosniff, frame-ancestors, etc.)
sendSecurityHeaders();

// Initialize data and fetch active packages & settings
RevoDataManager::initializeDefaults();
$packages = RevoDataManager::getPackages();
$settings = RevoDataManager::getSettings();
$csrfToken = generateCsrfToken();
$formLoadedTime = time();

// Current active phone and WhatsApp settings
$displayPhone = $settings['phone'] ?? DEFAULT_PHONE;
$cleanWaNum = $settings['whatsapp'] ?? DEFAULT_WHATSAPP_NUM;
$displayEmail = $settings['email'] ?? DEFAULT_EMAIL;
$defaultWaUrl = 'https://wa.me/' . $cleanWaNum . '?text=' . rawurlencode(DEFAULT_WA_MESSAGE);

// Language detection from cookie or query param (default: ms)
$currentLang = $_GET['lang'] ?? $_COOKIE['revo_lang'] ?? 'ms';
if (!in_array($currentLang, ['ms', 'id'], true)) {
    $currentLang = 'ms';
}
?>
<!DOCTYPE html>
<html lang="<?= e($currentLang) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <title>REVO LUX MEDIA | In-Car Advertising Toyota Alphard & Vellfire Malaysia</title>
  <meta name="description" content="Rangkaian media pengiklanan mudah alih premium dalam Toyota Alphard & Vellfire di Kuala Lumpur & Lembah Klang. Paparkan video & imej digital jenama anda kepada penumpang eksekutif.">
  <meta name="keywords" content="In-car advertising Malaysia, Alphard Vellfire advertising Kuala Lumpur, mobile media network, digital in-car screens, luxury automotive branding KL, corporate mobile ads">
  <meta name="author" content="REVO LUX MEDIA">
  <meta name="robots" content="index, follow">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://<?= e(BRAND_DOMAIN) ?>/">
  <meta property="og:title" content="REVO LUX MEDIA — Premium Mobile Media Network">
  <meta property="og:description" content="Iklankan jenama anda dalam Toyota Alphard & Vellfire di sekitar Kuala Lumpur. Hubungkan jenama dengan penumpang eksekutif melalui paparan skrin digital.">
  <meta property="og:image" content="<?= e(BASE_URL) ?>/assets/images/hero-kl.jpg">

  <!-- Favicon / Touch Icon -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%23050608'/><path d='M30 25h26a14 14 0 010 28H44v22H30V25zm14 16h11a3 3 0 000-6H44v6z' fill='%23C9A45C'/><circle cx='68' cy='68' r='7' fill='%23E8C98F'/></svg>">
  <link rel="canonical" href="https://<?= e(BRAND_DOMAIN) ?>/">

  <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- ========================================================================
       1. STICKY HEADER & NAVIGATION
       ======================================================================== -->
  <header class="revo-header" id="siteHeader">
    <div class="revo-container header-inner">
      <!-- Brand Wordmark -->
      <a href="#hero" class="brand-link" aria-label="REVO LUX MEDIA Beranda">
        <div class="brand-emblem" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
            <polyline points="2 17 12 22 22 17"></polyline>
            <polyline points="2 12 12 17 22 12"></polyline>
          </svg>
        </div>
        <div class="brand-text">
          <span class="brand-name">REVO <span>LUX</span></span>
          <span class="brand-tagline-sub">Mobile Media Network</span>
        </div>
      </a>

      <!-- Desktop Nav (6 Core Essential Items) -->
      <nav class="desktop-nav" aria-label="Navigasi Utama">
        <a href="#hero" class="nav-link" data-i18n="nav_home">Home</a>
        <a href="#about" class="nav-link" data-i18n="nav_about">About</a>
        <a href="#advantage" class="nav-link" data-i18n="nav_advantage">Advantage</a>
        <a href="#solutions" class="nav-link" data-i18n="nav_solutions">Solutions</a>
        <a href="#packages" class="nav-link" data-i18n="nav_packages">Packages</a>
        <a href="#contact" class="nav-link" data-i18n="nav_contact">Contact</a>
      </nav>

      <!-- Action & Hamburger -->
      <div class="header-actions">
        <!-- Language Switcher Pill (Malaysia & Indonesia) -->
        <div class="revo-lang-switcher" id="revoLangSwitcher" role="group" aria-label="Pilih Bahasa / Language Selector">
          <button type="button" class="lang-toggle-btn <?= $currentLang === 'ms' ? 'active' : '' ?>" data-lang="ms" aria-label="Tukar ke Bahasa Malaysia" title="Bahasa Malaysia" <?= $currentLang === 'ms' ? 'aria-pressed="true"' : 'aria-pressed="false"' ?>>
            <svg class="lang-flag-svg" viewBox="0 0 640 480" width="17" height="12" aria-hidden="true">
              <rect width="640" height="480" fill="#cc0001"/>
              <path d="M0,34.286h640M0,102.857h640M0,171.429h640M0,240h640M0,308.571h640M0,377.143h640M0,445.714h640" stroke="#fff" stroke-width="34.286"/>
              <rect width="320" height="274.286" fill="#010066"/>
              <circle cx="160" cy="137.143" r="82.286" fill="#fc0"/>
              <circle cx="180" cy="137.143" r="72" fill="#010066"/>
              <polygon points="215,137 195,147 205,127 185,137 200,119 178,131 190,110 172,127 178,104 167,125 164,102 161,125 150,104 156,127 138,110 150,131 128,119 143,137 123,127 133,147 113,137 133,157 123,177 143,167 128,185 150,173 138,194 156,177 150,200 161,179 164,202 167,179 178,200 172,177 190,194 178,173 200,185 185,167 205,177 195,157" fill="#fc0"/>
            </svg>
            <span class="lang-toggle-text">MY</span>
          </button>
          <button type="button" class="lang-toggle-btn <?= $currentLang === 'id' ? 'active' : '' ?>" data-lang="id" aria-label="Ganti ke Bahasa Indonesia" title="Bahasa Indonesia" <?= $currentLang === 'id' ? 'aria-pressed="true"' : 'aria-pressed="false"' ?>>
            <svg class="lang-flag-svg" viewBox="0 0 640 480" width="17" height="12" aria-hidden="true">
              <rect width="640" height="240" fill="#e70011"/>
              <rect y="240" width="640" height="240" fill="#ffffff"/>
            </svg>
            <span class="lang-toggle-text">ID</span>
          </button>
        </div>

        <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm header-enquire-btn">
          <span data-i18n="nav_enquire_btn">ENQUIRE NOW</span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <button type="button" class="hamburger-btn" aria-label="Buka Menu Navigasi" aria-expanded="false" aria-controls="mobileNavPanel">
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile Slide Navigation Drawer -->
  <div class="mobile-nav-panel" id="mobileNavPanel" aria-label="Menu Mudah Alih">
    <!-- Mobile Drawer Language Selector -->
    <div class="mobile-lang-drawer-card">
      <div class="mobile-lang-drawer-title">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1 4-10z"/></svg>
        <span data-i18n="mobile_lang_title">PILIHAN BAHASA</span>
      </div>
      <div class="mobile-lang-drawer-grid">
        <button type="button" class="mobile-lang-drawer-btn <?= $currentLang === 'ms' ? 'active' : '' ?>" data-lang="ms">
          <svg class="lang-flag-svg" viewBox="0 0 640 480" width="18" height="13" aria-hidden="true">
            <rect width="640" height="480" fill="#cc0001"/>
            <path d="M0,34.286h640M0,102.857h640M0,171.429h640M0,240h640M0,308.571h640M0,377.143h640M0,445.714h640" stroke="#fff" stroke-width="34.286"/>
            <rect width="320" height="274.286" fill="#010066"/>
            <circle cx="160" cy="137.143" r="82.286" fill="#fc0"/>
            <circle cx="180" cy="137.143" r="72" fill="#010066"/>
            <polygon points="215,137 195,147 205,127 185,137 200,119 178,131 190,110 172,127 178,104 167,125 164,102 161,125 150,104 156,127 138,110 150,131 128,119 143,137 123,127 133,147 113,137 133,157 123,177 143,167 128,185 150,173 138,194 156,177 150,200 161,179 164,202 167,179 178,200 172,177 190,194 178,173 200,185 185,167 205,177 195,157" fill="#fc0"/>
          </svg>
          <span>Malaysia</span>
          <span class="lang-check-icon">✓</span>
        </button>
        <button type="button" class="mobile-lang-drawer-btn <?= $currentLang === 'id' ? 'active' : '' ?>" data-lang="id">
          <svg class="lang-flag-svg" viewBox="0 0 640 480" width="18" height="13" aria-hidden="true">
            <rect width="640" height="240" fill="#e70011"/>
            <rect y="240" width="640" height="240" fill="#ffffff"/>
          </svg>
          <span>Indonesia</span>
          <span class="lang-check-icon">✓</span>
        </button>
      </div>
    </div>

    <ul class="mobile-nav-links">
      <li>
        <a href="#hero" class="mobile-nav-link">
          <span data-i18n="nav_home">Home</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#about" class="mobile-nav-link">
          <span data-i18n="nav_about">About REVO</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#advantage" class="mobile-nav-link">
          <span data-i18n="nav_advantage">Advantage</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#solutions" class="mobile-nav-link">
          <span data-i18n="nav_solutions">Solutions</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#packages" class="mobile-nav-link">
          <span data-i18n="nav_packages">Packages</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#contact" class="mobile-nav-link">
          <span data-i18n="nav_contact">Contact</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
    </ul>

    <div class="mobile-nav-footer">
      <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-full-mobile">
        <span data-i18n="nav_enquire_mobile">ENQUIRE NOW VIA WHATSAPP</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
      <div class="mobile-contact-pill">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
        <span><?= e($displayPhone) ?></span>
      </div>
    </div>
  </div>

  <main id="mainContent">

    <!-- ========================================================================
         2. CINEMATIC HERO SECTION
         ======================================================================== -->
    <section class="hero-section" id="hero">
      <div class="hero-background-wrapper" aria-hidden="true">
        <!-- Responsive Automotive Imagery: Mobile Portrait Crop & Desktop Landscape -->
        <img src="assets/images/hero-mobile.jpg" alt="Toyota Alphard VIP di Kuala Lumpur" class="hero-bg-img hero-bg-mobile" loading="eager" fetchpriority="high">
        <img src="assets/images/hero-kl.jpg" alt="Toyota Alphard & Vellfire di Kuala Lumpur" class="hero-bg-img hero-bg-desktop" loading="eager" fetchpriority="high">
        <div class="hero-overlay"></div>
        <div class="hero-radial-glow"></div>
      </div>

      <div class="revo-container">
        <div class="hero-content">
          <!-- Clean Minimal Badge -->
          <div class="hero-badge">
            <span class="hero-badge-dot"></span>
            <span class="hero-badge-text" data-i18n="hero_badge_text">50 LUXURY VEHICLES &bull; KL &amp; KLIA</span>
          </div>

          <!-- Main English Headline -->
          <h1 class="hero-title">
            THE MEDIA NETWORK<br>
            <span class="text-gold-gradient">INSIDE THE</span> JOURNEY.
          </h1>

          <!-- Supporting Malay Marketing Headline -->
          <h2 class="hero-headline-my" data-i18n="hero_headline_my">
            <?= e(MALAY_HEADLINE) ?>
          </h2>

          <!-- Description (Clean & Punchy) -->
          <p class="hero-description" data-i18n="hero_desc">
            Rangkaian pengiklanan mudah alih premium dalam armada Toyota Alphard &amp; Vellfire untuk menghubungkan jenama anda terus kepada audiens eksekutif di Lembah Klang dan koridor KLIA.
          </p>

          <!-- CTAs -->
          <div class="hero-cta-group">
            <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-full-mobile">
              <span data-i18n="hero_cta_wa">BINCANGKAN KEMPEN ANDA</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#solutions" class="btn btn-outline btn-full-mobile">
              <span data-i18n="hero_cta_explore">TEROKAI CARA IA BERFUNGSI</span>
            </a>
            <button type="button" class="hero-video-pill" id="heroWatchVideoBtn">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              <span data-i18n="hero_watch_btn">TONTON VIDEO ARMADA (10s)</span>
            </button>
          </div>

          <!-- Supporting Microcopy -->
          <div class="microcopy">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
            <span data-i18n="hero_microcopy">Pakej dan pilihan kempen boleh dibincangkan mengikut keperluan perniagaan.</span>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         3. VALUE PROPOSITION STRIP
         ======================================================================== -->
    <section class="value-strip" id="value-strip">
      <div class="revo-container">
        <div class="value-strip-header">
          <h2 class="value-strip-title" data-i18n="val_strip_title">Lebih Daripada Sekadar Ruang Pengiklanan.</h2>
        </div>

        <div class="value-grid">
          <!-- Benefit 1 -->
          <div class="value-card">
            <div class="value-card-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M5 17h14v-5l-2-5H7l-2 5v5z"/>
                <circle cx="7.5" cy="17.5" r="2.5"/>
                <circle cx="16.5" cy="17.5" r="2.5"/>
              </svg>
            </div>
            <h3 class="value-card-title" data-i18n="val_card1_title">PREMIUM MOBILITY</h3>
            <p class="value-card-desc" data-i18n="val_card1_desc">Pengiklanan dalam persekitaran kenderaan premium Toyota Alphard & Vellfire.</p>
          </div>

          <!-- Benefit 2 -->
          <div class="value-card">
            <div class="value-card-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
              </svg>
            </div>
            <h3 class="value-card-title" data-i18n="val_card2_title">DISTINCTIVE BRAND PRESENCE</h3>
            <p class="value-card-desc" data-i18n="val_card2_desc">Satu lagi cara tersendiri untuk memperkenalkan jenama anda kepada sasaran berimpak.</p>
          </div>

          <!-- Benefit 3 -->
          <div class="value-card">
            <div class="value-card-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                <line x1="3" y1="9" x2="21" y2="9"/>
                <line x1="9" y1="21" x2="9" y2="9"/>
              </svg>
            </div>
            <h3 class="value-card-title" data-i18n="val_card3_title">FLEXIBLE CAMPAIGN OPTIONS</h3>
            <p class="value-card-desc" data-i18n="val_card3_desc">Pilihan kempen dan format paparan yang boleh dibincangkan mengikut keperluan perniagaan.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         4. ABOUT REVO — STORYTELLING
         ======================================================================== -->
    <section class="revo-section about-section" id="about">
      <div class="revo-container">
        <div class="about-grid">
          <!-- Automotive Visual (Single Editorial Media Card) -->
          <div class="about-image-card" data-lightbox-image="assets/images/revo-in-cabin-passenger.jpg" data-lightbox-title="Toyota Alphard VIP Cabin" data-lightbox-desc="Paparan skrin 1080p tepat pada aras mata penumpang eksekutif di kabin VIP REVO." style="cursor: pointer;">
            <span class="media-card-badge" data-i18n="about_card1_badge">Toyota Alphard VIP Cabin</span>
            <img src="assets/images/revo-in-cabin-passenger.jpg" alt="Penumpang eksekutif di kabin VIP Alphard menghadap skrin iklan REVO" loading="lazy">
            <div class="media-caption-bar" data-i18n="about_card1_caption">Paparan skrin tepat pada aras mata penumpang eksekutif</div>
          </div>

          <!-- Asymmetric Ivory Editorial Content Panel -->
          <div class="about-content-panel">
            <div class="section-tag" data-i18n="about_tag">MENGENAI REVO</div>
            <h2 class="section-title" data-i18n="about_title">Membawa Pengiklanan Lebih Dekat Kepada Pengalaman Perjalanan.</h2>

            <p class="about-lead-text" data-i18n="about_lead">
              REVO Premium Mobile Media Network dibangunkan dengan idea bahawa peluang memperkenalkan jenama tidak semestinya terhad kepada saluran pengiklanan konvensional.
            </p>

            <p class="about-body-text" data-i18n="about_p1">
              Melalui konsep pengiklanan mudah alih yang memanfaatkan kenderaan premium, REVO berhasrat membantu perniagaan meneroka cara berbeza untuk menyampaikan mesej, mempromosikan produk dan membina kesedaran jenama.
            </p>

            <p class="about-body-text" data-i18n="about_p2">
              Setiap kempen boleh dibincangkan berdasarkan objektif pemasaran, jenis kandungan dan pilihan liputan yang tersedia.
            </p>

            <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin mengenali pendekatan REVO dan membincangkan peluang kolaborasi.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
              <span data-i18n="about_cta">KENALI PENDEKATAN REVO</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         4B. BETTER THAN BILLBOARDS — VALUE PROPOSITION & 500+ PROSPECTS (FROM PDF)
         ======================================================================== -->
    <section class="revo-section" id="advantage" style="background: radial-gradient(ellipse at top, rgba(24, 30, 38, 0.7) 0%, rgba(5, 6, 8, 0.98) 100%);">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag" data-i18n="adv_tag">LEBIH DARIPADA BILLBOARD BIASA</div>
          <h2 class="section-title" data-i18n="adv_title">Better Than Billboards. More Than Just An Ad.</h2>
          <p class="section-subtitle" data-i18n="adv_subtitle">
            REVO membawa mesej jenama anda terus ke dalam ruang eksklusif penumpangnya — kabin Toyota Alphard &amp; Vellfire yang tenang, selesa dan bebas daripada sebarang gangguan.
          </p>
        </div>

        <!-- 500 Direct Prospects Daily Metric Banner (PDF Page 8 & 15) -->
        <div class="prospects-banner">
          <div class="prospects-stat-box">
            <span class="prospects-number">500</span>
            <span class="prospects-plus">+</span>
            <div class="prospects-label">
              <span data-i18n="adv_stat_label">PROSPEK</span>
              <span data-i18n="adv_stat_sub">MINIMA SETIAP HARI</span>
            </div>
          </div>
          <div class="prospects-copy" data-i18n="adv_stat_copy">
            <strong>Pendedahan Berterusan &amp; Konsisten:</strong> Dengan gabungan 50 unit Toyota Alphard &amp; Vellfire (2020+) yang beroperasi di laluan strategik Lembah Klang, KLIA dan kawasan tumpuan korporat, kami memastikan jenama anda disaksikan oleh ratusan hingga ribuan prospek berkualiti tinggi setiap hari secara konsisten.
          </div>
          <div style="flex-shrink: 0;">
            <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin mengetahui bagaimana rangkaian 50 kenderaan REVO boleh menjangkau 500+ prospek harian untuk jenama saya.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
              <span data-i18n="adv_stat_cta">SEMAK POTENSI JANGKAUAN</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>
        </div>

        <!-- 2-Column Comparative Analysis -->
        <div class="comparison-grid">
          <!-- Traditional Billboard -->
          <div class="comparison-card billboard">
            <span class="comparison-card-badge" data-i18n="adv_bb_badge">Papan Iklan Tradisional</span>
            <h3 class="comparison-card-title" data-i18n="adv_bb_title">Billboard Luar Jalan (OOH)</h3>
            <p class="comparison-card-desc" data-i18n="adv_bb_desc">Paparan statik di tepi lebuh raya yang bersaing dengan pelbagai gangguan visual lalu lintas.</p>
            <ul class="comparison-features">
              <li class="comparison-feature-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                <span data-i18n="adv_bb_f1"><strong>Masa Tontonan Singkat:</strong> Hanya dilihat 2 hingga 3 saat secara sekilas sambil memandu laju.</span>
              </li>
              <li class="comparison-feature-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                <span data-i18n="adv_bb_f2"><strong>Audiens Umum:</strong> Tiada saringan demografi sasaran — dilihat secara rawak tanpa segmentasi tepat.</span>
              </li>
              <li class="comparison-feature-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                <span data-i18n="adv_bb_f3"><strong>Tiada Interaksi Serta-Merta:</strong> Pemandu tidak berupaya mengimbas kod QR atau membuka tawaran ketika memandu.</span>
              </li>
            </ul>
          </div>

          <!-- REVO In-Car Media -->
          <div class="comparison-card revo">
            <span class="comparison-card-badge" data-i18n="adv_revo_badge">REVO In-Car Media Network</span>
            <h3 class="comparison-card-title" data-i18n="adv_revo_title">Pengiklanan Digital Kabin VIP</h3>
            <p class="comparison-card-desc" data-i18n="adv_revo_desc">Pengalaman media interaktif beresolusi tinggi di dalam kabin eksekutif yang tenang dan selesa.</p>
            <ul class="comparison-features">
              <li class="comparison-feature-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span data-i18n="adv_revo_f1"><strong>45–60 Minit Captive Audience:</strong> Penumpang berada dalam suasana santai sepanjang tempoh perjalanan.</span>
              </li>
              <li class="comparison-feature-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span data-i18n="adv_revo_f2"><strong>100% Focused &amp; Unskippable:</strong> Skrin digital 10–15 inci tepat pada aras mata di belakang kerusi pemandu tanpa 'ad-blocker'.</span>
              </li>
              <li class="comparison-feature-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span data-i18n="adv_revo_f3"><strong>Audiens Bernilai Tinggi (HNWIs):</strong> Menemui pembuat keputusan korporat, pelabur, VIP dan pelancong mewah.</span>
              </li>
              <li class="comparison-feature-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span data-i18n="adv_revo_f4"><strong>Tindakan Segera (QR Interactive):</strong> Penumpang mempunyai masa santai untuk mengimbas kod QR dan terus berhubung.</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         5. HOW IT WORKS & THE CUSTOMER JOURNEY (FROM PDF PAGE 8 & 12)
         ======================================================================== -->
    <section class="revo-section how-it-works-section" id="how-it-works">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag" data-i18n="steps_tag">CARA KEMPEN BERFUNGSI</div>
          <h2 class="section-title" data-i18n="steps_title">Daripada Idea Kepada Kempen, Dengan Lebih Mudah.</h2>
          <p class="section-subtitle" data-i18n="steps_subtitle">
            Kami memudahkan proses pelaksanaan supaya anda dapat menumpukan kepada matlamat utama jenama tanpa kerumitan teknikal.
          </p>
        </div>

        <div class="steps-container">
          <!-- Step 1 -->
          <div class="step-card">
            <div class="step-number-pill" data-i18n="step1_pill">STEP 01</div>
            <h3 class="step-title" data-i18n="step1_title">KONGSI OBJEKTIF ANDA</h3>
            <p class="step-description" data-i18n="step1_desc">
              Beritahu kami tentang jenama, produk, sasaran pemasaran dan matlamat kempen anda melalui perbincangan ringkas.
            </p>
          </div>

          <!-- Step 2 -->
          <div class="step-card">
            <div class="step-number-pill" data-i18n="step2_pill">STEP 02</div>
            <h3 class="step-title" data-i18n="step2_title">TEROKAI PILIHAN YANG SESUAI</h3>
            <p class="step-description" data-i18n="step2_desc">
              Bincangkan format iklan, tempoh kempen dan ketersediaan kenderaan bersama pasukan perunding REVO.
            </p>
          </div>

          <!-- Step 3 -->
          <div class="step-card">
            <div class="step-number-pill" data-i18n="step3_pill">STEP 03</div>
            <h3 class="step-title" data-i18n="step3_title">RANCANG KEMPEN ANDA</h3>
            <p class="step-description" data-i18n="step3_desc">
              Semak cadangan kempen dan butiran yang dipersetujui sebelum pelaksanaan bermula dengan lancar.
            </p>
          </div>
        </div>

        <!-- Customer Journey Touchpoints Grid (from PDF Page 8 & 12) -->
        <div style="margin-top: var(--space-3xl); margin-bottom: var(--space-2xl);">
          <div class="section-header text-center" style="margin-bottom: var(--space-lg);">
            <div class="section-tag" data-i18n="tp_tag">TITIK SENTUHAN AUDIENS</div>
            <h3 data-i18n="tp_title" style="font-family: var(--font-heading); font-size: 1.65rem; font-weight: 700; color: var(--c-white); margin-bottom: 8px;">
              The Customer Journey: From First Impression to Lasting Impact
            </h3>
            <p class="section-subtitle" data-i18n="tp_subtitle">
              Jenama anda menemani audiens berprofil tinggi sepanjang setiap fasa perjalanan harian mereka di Malaysia.
            </p>
          </div>

          <div class="touchpoints-grid">
            <div class="touchpoint-card">
              <span class="touchpoint-num" data-i18n="tp1_num">TOUCHPOINT 01</span>
              <div class="touchpoint-header-wrap">
                <div class="touchpoint-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.8 19.2L16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.3c.4-.2.6-.6.5-1.1z"/></svg>
                </div>
                <h4 class="touchpoint-title" data-i18n="tp1_title">ARRIVAL &amp; KLIA</h4>
              </div>
              <p class="touchpoint-desc" data-i18n="tp1_desc">Sambutan eksklusif lapangan terbang KLIA &amp; KLIA2. Menemui pelancong dan delegasi VIP sebaik tiba ke Malaysia.</p>
            </div>

            <div class="touchpoint-card">
              <span class="touchpoint-num" data-i18n="tp2_num">TOUCHPOINT 02</span>
              <div class="touchpoint-header-wrap">
                <div class="touchpoint-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 7v14M21 7v14M6 7V4a1 1 0 011-1h10a1 1 0 011 1v3M9 11h2M9 15h2M13 11h2M13 15h2"/></svg>
                </div>
                <h4 class="touchpoint-title" data-i18n="tp2_title">HOTEL &amp; HOSPITALITY</h4>
              </div>
              <p class="touchpoint-desc" data-i18n="tp2_desc">Perjalanan ke hotel 5-bintang &amp; suite kediaman mewah. Berhubung dengan tetamu semasa suasana santai dan istirehat.</p>
            </div>

            <div class="touchpoint-card">
              <span class="touchpoint-num" data-i18n="tp3_num">TOUCHPOINT 03</span>
              <div class="touchpoint-header-wrap">
                <div class="touchpoint-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                </div>
                <h4 class="touchpoint-title" data-i18n="tp3_title">CORPORATE &amp; BUSINESS</h4>
              </div>
              <p class="touchpoint-desc" data-i18n="tp3_desc">Urusan persidangan, mesyuarat perniagaan dan pergerakan korporat di menara komersial utama Lembah Klang.</p>
            </div>

            <div class="touchpoint-card">
              <span class="touchpoint-num" data-i18n="tp4_num">TOUCHPOINT 04</span>
              <div class="touchpoint-header-wrap">
                <div class="touchpoint-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h4 class="touchpoint-title" data-i18n="tp4_title">EXECUTIVE &amp; VIP</h4>
              </div>
              <p class="touchpoint-desc" data-i18n="tp4_desc">Individu bernilai bersih tinggi (HNWIs), pembuat keputusan, pengarah syarikat dan delegasi kehormat peribadi.</p>
            </div>

            <div class="touchpoint-card">
              <span class="touchpoint-num" data-i18n="tp5_num">TOUCHPOINT 05</span>
              <div class="touchpoint-header-wrap">
                <div class="touchpoint-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                </div>
                <h4 class="touchpoint-title" data-i18n="tp5_title">TOURISTS &amp; GLOBAL</h4>
              </div>
              <p class="touchpoint-desc" data-i18n="tp5_desc">Pelawat antarabangsa yang mencari pengalaman terbaik, jenama barangan mewah, dan perkhidmatan berprestij.</p>
            </div>

            <div class="touchpoint-card">
              <span class="touchpoint-num" data-i18n="tp6_num">TOUCHPOINT 06</span>
              <div class="touchpoint-header-wrap">
                <div class="touchpoint-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h4 class="touchpoint-title" data-i18n="tp6_title">FAMILY TRAVEL</h4>
              </div>
              <p class="touchpoint-desc" data-i18n="tp6_desc">Perjalanan keluarga berprofil tinggi yang menikmati keselesaan ruang 7 &amp; 8 tempat duduk Alphard &amp; Vellfire.</p>
            </div>
          </div>
        </div>

        <div style="text-align: center;">
          <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin memulakan perbincangan mengenai perancangan kempen jenama kami.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
            <span data-i18n="tp_cta">BERMULA DENGAN PERBINCANGAN</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         6. ADVERTISING SOLUTIONS (6 INTERACTIVE CARDS)
         ======================================================================== -->
    <section class="revo-section" id="solutions">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag" data-i18n="sol_tag">PENYELESAIAN PENGIKLANAN</div>
          <h2 class="section-title" data-i18n="sol_title">Pilih Cara Yang Sesuai Untuk Menceritakan Jenama Anda.</h2>
          <p class="section-subtitle" data-i18n="sol_subtitle">
            Setiap jenama mempunyai objektif yang berbeza. Terokai format pengiklanan yang mungkin sesuai dengan mesej dan keperluan kempen anda.
          </p>
        </div>

        <!-- Live In-Cabin Campaign Proof (PERKESO Live Footage) -->
        <div class="solutions-showcase-box">
          <div>
            <div class="section-tag" data-i18n="sol_live_proof_badge">SIARAN KEMPEN AKTIF</div>
            <h3 style="font-family: var(--font-heading); font-size: 1.5rem; font-weight: 700; color: var(--c-white); margin-bottom: 10px;" data-i18n="sol_live_proof_title">
              Bukti Siaran Kempen Sebenar Di Dalam Kabin
            </h3>
            <p style="font-size: 0.885rem; color: var(--c-silver); line-height: 1.6; margin-bottom: var(--space-md);" data-i18n="sol_live_proof_desc">
              Saksikan bagaimana kempen rakan korporat dan agensi seperti PERKESO disiarkan secara dinamik di skrin resolusi tinggi Toyota Alphard REVO.
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: var(--space-sm);">
              <button type="button" class="btn btn-primary btn-sm" id="solutionsPlayBtn">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                <span>PUTAR LANGSUNG DI TABLET</span>
              </button>
              <button type="button" class="btn btn-outline btn-sm" id="solutionsViewInfographicBtn">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <span data-i18n="sol_overview_btn">Lihat Infografik Rangkaian Media REVO</span>
              </button>
            </div>
          </div>

          <!-- Tablet Mockup with Live Video (Plays Directly Inline) -->
          <div class="tablet-mockup-frame" id="solutionsTabletFrame" style="cursor: pointer;">
            <span class="live-badge-glow">LIVE IN-CAR</span>
            <video id="solutionsTabletVideo" src="assets/videos/revo-live-campaign-perkeso.mp4#t=1" muted loop playsinline preload="metadata"></video>
            <div class="media-play-overlay" id="solutionsTabletOverlay">
              <div class="play-circle-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </div>
            </div>
          </div>
        </div>

        <div class="solutions-grid">
          <!-- Card 1: Video -->
          <div class="solution-card">
            <div>
              <span class="format-pill-tag">MP4 / HD &bull; PLAYBACK LOOP</span>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <polygon points="23 7 16 12 23 17 23 7"/>
                  <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
                </svg>
              </div>
              <h3 class="solution-title" data-i18n="sol1_title">IN-CAR VIDEO ADVERTISING</h3>
              <p class="solution-desc" data-i18n="sol1_desc">Slot 5s / 10s / 15s / 20s / 30s. Video ringkas berimpak tinggi yang menarik perhatian dan mengukuhkan ingatan jenama.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="video" aria-haspopup="dialog">
                <span data-i18n="sol_btn_specs">Spesifikasi Format</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 2: Image Slide -->
          <div class="solution-card">
            <div>
              <span class="format-pill-tag">JPG / PNG &bull; SLIDE SHOW</span>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                  <circle cx="8.5" cy="8.5" r="1.5"/>
                  <polyline points="21 15 16 10 5 21"/>
                </svg>
              </div>
              <h3 class="solution-title" data-i18n="sol2_title">IMAGE SLIDE (STATIC DISPLAY)</h3>
              <p class="solution-desc" data-i18n="sol2_desc">Ketengahkan visual jenama yang bersih, tajam dan beresolusi tinggi untuk menyampaikan mesej promosi dengan pantas.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="image" aria-haspopup="dialog">
                <span data-i18n="sol_btn_specs">Spesifikasi Format</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 3: Branded Interactive QR -->
          <div class="solution-card">
            <div>
              <span class="format-pill-tag">QR CODE &bull; TRACKABLE CTA</span>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <rect x="3" y="3" width="7" height="7"/>
                  <rect x="14" y="3" width="7" height="7"/>
                  <rect x="14" y="14" width="7" height="7"/>
                  <rect x="3" y="14" width="7" height="7"/>
                </svg>
              </div>
              <h3 class="solution-title" data-i18n="sol3_title">BRANDED INTERACTIVE (QR/CTA)</h3>
              <p class="solution-desc" data-i18n="sol3_desc">Tingkatkan interaksi terus melalui imbasan kod QR pintar ke laman web, katalog digital, atau pautan tawaran eksklusif.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="qr" aria-haspopup="dialog">
                <span data-i18n="sol_btn_specs">Spesifikasi Format</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 4: Split Screen Dual Content -->
          <div class="solution-card">
            <div>
              <span class="format-pill-tag">DUAL FORMAT &bull; MORE REACH</span>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <rect x="2" y="3" width="20" height="18" rx="2"/>
                  <line x1="12" y1="3" x2="12" y2="21"/>
                </svg>
              </div>
              <h3 class="solution-title" data-i18n="sol4_title">SPLIT SCREEN (DUAL CONTENT)</h3>
              <p class="solution-desc" data-i18n="sol4_desc">Paparkan dua mesej serentak — video promosi sinematik di satu sisi bersama paparan sepanduk diskaun atau QR di sisi lain.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="splitscreen" aria-haspopup="dialog">
                <span data-i18n="sol_btn_specs">Spesifikasi Format</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 5: Full Screen Immersive -->
          <div class="solution-card">
            <div>
              <span class="format-pill-tag">FULL HD &bull; CINEMATIC EXPERIENCE</span>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"/>
                </svg>
              </div>
              <h3 class="solution-title" data-i18n="sol5_title">FULL SCREEN IMMERSIVE</h3>
              <p class="solution-desc" data-i18n="sol5_desc">Impak maksimum dengan paparan skrin penuh 1080p tanpa sempadan, memberikan pengalaman visual yang mengagumkan.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="awareness" aria-haspopup="dialog">
                <span data-i18n="sol_btn_specs">Spesifikasi Format</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 6: Content Rotation -->
          <div class="solution-card">
            <div>
              <span class="format-pill-tag">SMART SCHEDULING &bull; MULTI-BRAND</span>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/>
                </svg>
              </div>
              <h3 class="solution-title" data-i18n="sol6_title">CONTENT ROTATION</h3>
              <p class="solution-desc" data-i18n="sol6_desc">Penjadualan putaran iklan pintar mengikut rute, waktu puncak atau profil perjalanan VIP untuk memastikan mesej sentiasa segar.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="rotation" aria-haspopup="dialog">
                <span data-i18n="sol_btn_specs">Spesifikasi Format</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>
        </div>

        <p class="solution-disclaimer" data-i18n="sol_disclaimer">
          *Nota: Format pengiklanan bergantung pada ketersediaan peralatan kenderaan dan spesifikasi kempen yang disahkan.
        </p>
      </div>
    </section>

    <!-- ========================================================================
         7. OUR NETWORK — PRESENT SCALE RESPONSIBLY
         ======================================================================== -->
    <section class="revo-section network-section" id="network">
      <div class="revo-container">
        <div class="network-grid">
          <!-- Content Box -->
          <div>
            <div class="section-tag" data-i18n="net_tag">RANGKAIAN KAMI</div>
            <h2 class="section-title" data-i18n="net_title"><?= e($settings['fleet_headline'] ?? '50 Kenderaan. Satu Rangkaian Media.') ?></h2>
            
            <p class="section-subtitle" data-i18n="net_subtext" style="margin-bottom: var(--space-md);">
              <?= e($settings['fleet_subtext'] ?? 'REVO menyasarkan pembangunan rangkaian sehingga 50 buah Toyota Alphard dan Toyota Vellfire di sekitar Lembah Klang, dengan potensi peluang kempen berkaitan perjalanan lapangan terbang, hotel, pelancongan dan pengangkutan korporat.') ?>
            </p>

            <!-- 4 Potential Campaign Contexts -->
            <div class="network-contexts-grid">
              <div class="network-context-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <span class="network-context-name" data-i18n="net_ctx1">Klang Valley</span>
              </div>
              <div class="network-context-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.8 19.2L16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.3c.4-.2.6-.6.5-1.1z"/></svg>
                <span class="network-context-name" data-i18n="net_ctx2">KLIA Corridor</span>
              </div>
              <div class="network-context-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 7v14M21 7v14M6 7V4a1 1 0 011-1h10a1 1 0 011 1v3M9 11h2M9 15h2M13 11h2M13 15h2"/></svg>
                <span class="network-context-name" data-i18n="net_ctx3">Hotels & Hospitality</span>
              </div>
              <div class="network-context-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                <span class="network-context-name" data-i18n="net_ctx4">Corporate Mobility</span>
              </div>
            </div>

            <!-- Responsible presentation note -->
            <div class="network-responsible-note" data-i18n="net_responsible">
              Rangkaian 50 kenderaan merupakan sasaran fasa pembangunan berperingkat bagi memastikan kualiti penyiaran dan pengurusan kempen beroperasi dengan tahap kecemerlangan tertinggi.
            </div>

            <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin menyemak pilihan liputan kenderaan Alphard & Vellfire yang tersedia untuk kempen jenama saya.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
              <span data-i18n="net_cta">SEMAK PILIHAN LIPUTAN</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>

          <!-- Image Box -->
          <div class="network-image-box">
            <img src="assets/images/fleet-klia.jpg" alt="Armada Toyota Alphard & Vellfire di lebuhraya moden Kuala Lumpur" loading="lazy">
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         8. INDUSTRIES WE SERVE
         ======================================================================== -->
    <section class="revo-section industries-section" id="industries">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag" data-i18n="ind_tag">UNTUK PELBAGAI INDUSTRI</div>
          <h2 class="section-title" data-i18n="ind_title">Adakah REVO Sesuai Untuk Jenama Anda?</h2>
          <p class="section-subtitle" data-i18n="ind_subtitle">
            Daripada perniagaan hospitaliti hingga jenama korporat, setiap kempen bermula dengan memahami siapa yang ingin anda jangkau.
          </p>
        </div>

        <div class="industries-grid">
          <!-- 1. Luxury & Fashion -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_1">Luxury &amp; Fashion</span>
          </div>

          <!-- 2. Automotive -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_2">Automotive</span>
          </div>

          <!-- 3. Real Estate & Property -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_3">Real Estate &amp; Property</span>
          </div>

          <!-- 4. Hospitality & Tourism -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_4">Hospitality &amp; Tourism</span>
          </div>

          <!-- 5. Banking & Finance -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_5">Banking &amp; Finance</span>
          </div>

          <!-- 6. Food & Beverage -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM6 1v3M10 1v3M14 1v3"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_6">Food &amp; Beverage</span>
          </div>

          <!-- 7. Health & Wellness -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_7">Health &amp; Wellness</span>
          </div>

          <!-- 8. Technology & Telecoms -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_8">Technology &amp; Telecoms</span>
          </div>

          <!-- 9. Corporate & B2B -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_9">Corporate &amp; B2B</span>
          </div>

          <!-- 10. Education & Academics -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_10">Education &amp; Training</span>
          </div>

          <!-- 11. Government & Social Campaigns -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 10h16M2 10l10-7 10 7M4 10v10h16V10M9 20v-6h6v6"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_11">Government &amp; NGO</span>
          </div>

          <!-- 12. Entertainment & Media -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <span class="industry-name" data-i18n="ind_12">Entertainment &amp; Media</span>
          </div>
        </div>

        <!-- Closing Banner with Soft Selling CTA -->
        <div class="industry-cta-banner">
          <div class="industry-cta-text" data-i18n="ind_banner_text">
            <strong>Tidak pasti sama ada perkhidmatan ini sesuai untuk perniagaan anda?</strong><br>
            Ceritakan objektif pemasaran anda kepada kami untuk meneroka potensi yang bersesuaian.
          </div>
          <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin berbincang sama ada medium ini sesuai untuk industri perniagaan saya.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
            <span data-i18n="ind_cta">BINCANG DENGAN REVO</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         9. ADVERTISING PACKAGES — SOFT-SELLING (EDITABLE VIA ADMIN)
         ======================================================================== -->
    <section class="revo-section packages-section" id="packages">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag" data-i18n="pkg_tag">PILIHAN KEMPEN</div>
          <h2 class="section-title" data-i18n="pkg_title">Kita Mulakan Dengan Keperluan Jenama Anda.</h2>
          <p class="section-subtitle" data-i18n="pkg_subtitle">
            Tidak semua perniagaan memerlukan pendekatan yang sama. Bincangkan keperluan anda untuk meneroka pilihan kempen yang bersesuaian.
          </p>
        </div>

        <div class="packages-grid">
          <?php foreach ($packages as $pkg): ?>
            <?php 
              $isGrowth = ($pkg['id'] ?? '') === 'growth'; 
              $pkgId = $pkg['id'] ?? 'starter';
              $pkgIndex = ($pkgId === 'starter') ? '1' : (($pkgId === 'growth') ? '2' : '3');
              $pkgWaText = !empty($pkg['whatsapp_msg']) ? $pkg['whatsapp_msg'] : ('Salam REVO, saya ingin mengetahui lebih lanjut mengenai ' . ($pkg['name'] ?? 'Pakej Kempen'));
              $pkgWaUrl = 'https://wa.me/' . $cleanWaNum . '?text=' . rawurlencode($pkgWaText);
            ?>
            <div class="package-card <?= $isGrowth ? 'highlight' : '' ?>">
              <span class="package-code" data-i18n="pkg<?= $pkgIndex ?>_code"><?= e($pkg['code'] ?? 'PACKAGE') ?></span>
              <h3 class="package-title" data-i18n="pkg<?= $pkgIndex ?>_name"><?= e($pkg['name'] ?? 'Pakej Kempen') ?></h3>
              
              <?php if (!empty($pkg['tag'])): ?>
                <span class="package-tag-badge" data-i18n="pkg<?= $pkgIndex ?>_tag"><?= e($pkg['tag']) ?></span>
              <?php endif; ?>

              <p class="package-desc" data-i18n="pkg<?= $pkgIndex ?>_desc"><?= e($pkg['description'] ?? '') ?></p>

              <ul class="package-specs">
                <li class="package-spec-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
                  <span data-i18n="pkg<?= $pkgIndex ?>_format"><?= e($pkg['suitable_format'] ?? '') ?></span>
                </li>
                <li class="package-spec-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
                  <span data-i18n="pkg<?= $pkgIndex ?>_coverage"><?= e($pkg['coverage'] ?? '') ?></span>
                </li>
                <li class="package-spec-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
                  <span data-i18n="pkg<?= $pkgIndex ?>_period"><?= e($pkg['period'] ?? '') ?></span>
                </li>
              </ul>

              <div class="package-price-wrap">
                <div class="package-price-label" data-i18n="pkg_price_label">Struktur Pelaburan:</div>
                <div class="package-price" data-i18n="pkg<?= $pkgIndex ?>_price"><?= e($pkg['price'] ?? 'Contact Us for Rates') ?></div>
                <div class="package-price-sub" data-i18n="pkg<?= $pkgIndex ?>_note"><?= e($pkg['price_note'] ?? 'Tertakluk kepada perbincangan objektif kempen') ?></div>
              </div>

              <a href="<?= e($pkgWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn <?= $isGrowth ? 'btn-primary' : 'btn-outline' ?> btn-full-mobile">
                <span data-i18n="pkg<?= $pkgIndex ?>_cta"><?= e($pkg['cta_text'] ?? 'BINCANGKAN PAKEJ') ?></span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </a>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Official Visual Rate Card Banner Box -->
        <div class="rate-card-banner-box">
          <div class="rate-card-preview-thumb" data-lightbox-image="assets/images/revo-official-rate-card.jpg" data-lightbox-title="Kadar Rasmi Pakej Iklan REVO (Bulanan &amp; Rangkaian)" data-lightbox-desc="Kadar rasmi slot 5s, 10s, 15s, 20s, 30s untuk 5-50 unit Alphard &amp; Vellfire.">
            <img src="assets/images/revo-official-rate-card.jpg" alt="Poster Kadar Rasmi Pakej Iklan REVO" loading="lazy">
            <div class="media-play-overlay">
              <div class="play-circle-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
              </div>
            </div>
          </div>
          <div>
            <div class="section-tag" data-i18n="pkg_tag">KADAR TRANSPARAN</div>
            <h3 style="font-family: var(--font-heading); font-size: 1.45rem; font-weight: 700; color: var(--c-white); margin-bottom: 8px;" data-i18n="pkg_rate_card_title">
              Kadar Rasmi Pakej Iklan Bulanan (Mengikut Unit &amp; Seluruh Rangkaian)
            </h3>
            <p style="font-size: 0.85rem; color: var(--c-silver); line-height: 1.6; margin-bottom: var(--space-md);" data-i18n="pkg_rate_card_desc">
              Pilihan fleksibel bermula dari 5 saat sehingga 30 saat untuk 5 hingga 50 kenderaan, serta slot penajaan kategori eksklusif. Klik poster untuk melihat perincian penuh.
            </p>
            <button type="button" class="btn btn-primary btn-sm" data-lightbox-image="assets/images/revo-official-rate-card.jpg" data-lightbox-title="Kadar Rasmi Pakej Iklan REVO (Bulanan &amp; Rangkaian)">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
              <span data-i18n="pkg_rate_card_btn">Buka Poster Kadar Rasmi (HD)</span>
            </button>
          </div>
        </div>

        <!-- Soft Reassurance Box -->
        <div class="soft-reassurance-box">
          <p data-i18n="pkg_reassurance">
            <?= e($settings['soft_reassurance'] ?? 'Masih dalam peringkat merancang? Tidak mengapa. Hubungi kami untuk memahami pilihan yang tersedia sebelum membuat keputusan.') ?>
          </p>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         9B. REVO INTERACTIVE EXPERIENCE SHOWCASE (STEP-BY-STEP NARRATIVE)
         ======================================================================== -->
    <section class="revo-section experience-section" id="experience">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag" data-i18n="exp_tag">PENGALAMAN MENYELURUH</div>
          <h2 class="section-title" data-i18n="exp_title">Jelajah Pengalaman REVO: Langkah Demi Langkah</h2>
          <p class="section-subtitle" data-i18n="exp_subtitle">
            Ketahui bagaimana rangkaian media mobiliti kami membawa mesej jenama anda dari lebuh raya terus ke ruang privat penumpang eksekutif.
          </p>
        </div>

        <!-- Mode Toggle Tabs (Perjalanan 4 Langkah vs Infografik Rasmi) -->
        <div class="experience-mode-tabs">
          <button type="button" class="exp-mode-btn active" data-exp-mode="journey">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            <span data-i18n="exp_tab_journey">Perjalanan Visual 4 Langkah (Video Interaktif)</span>
          </button>
          <button type="button" class="exp-mode-btn" data-exp-mode="posters">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            <span data-i18n="exp_tab_posters">Infografik & Panduan Rasmi (3 Dokumen)</span>
          </button>
        </div>

        <!-- Panel 1: Step-by-Step Interactive Video Journey -->
        <div class="experience-panel active" id="expJourneyPanel">
          <div class="experience-showcase-grid">
            <!-- Left Column: Cinema Theater Display (Inline Playable Video) -->
            <div class="theater-console-wrap">
              <div class="theater-console-bar">
                <span class="theater-step-badge" id="theaterStepBadge" data-i18n="exp_step1_badge">LANGKAH 01 • ARMADA DI JALAN RAYA</span>
                <div class="theater-live-indicator">
                  <span class="theater-dot-pulse"></span>
                  <span data-i18n="exp_now_playing">MAIN TERUS (INLINE)</span>
                </div>
              </div>

              <div class="theater-screen-box" id="theaterScreenBox">
                <video id="theaterVideo" src="assets/videos/revo-fleet-cinematic.mp4#t=1" playsinline preload="metadata"></video>
                <div class="theater-play-overlay" id="theaterPlayOverlay">
                  <div class="theater-play-btn" aria-label="Putar Video Langsung">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                  </div>
                  <span class="theater-play-text" data-i18n="exp_play_hint">Klik untuk mainkan video terus di sini</span>
                </div>
              </div>

              <div class="theater-caption-bar">
                <h4 class="theater-caption-title" id="theaterTitle" data-i18n="exp_step1_title">50 Kenderaan Mewah di Arteri Utama Lembah Klang & KLIA</h4>
                <div class="theater-caption-metric" id="theaterMetric" data-i18n="exp_step1_metric">50 Kenderaan Premium • Koridor KLIA & Lembah Klang</div>
              </div>
            </div>

            <!-- Right Column: Step-by-Step Story Cards (Langkah 01 - 04) -->
            <div class="experience-steps-list">
              <!-- Step 1 Card -->
              <div class="exp-step-card active" data-step="1" data-video="assets/videos/revo-fleet-cinematic.mp4" data-badge-key="exp_step1_badge" data-title-key="exp_step1_title" data-metric-key="exp_step1_metric">
                <div class="exp-step-header">
                  <span class="exp-step-number">01</span>
                  <div class="exp-step-title-wrap">
                    <span class="exp-step-nav-tag" data-i18n="exp_step1_nav">01. Armada di Jalan Raya</span>
                    <h3 class="exp-step-card-title" data-i18n="exp_step1_title">50 Kenderaan Mewah di Arteri Utama Lembah Klang & KLIA</h3>
                  </div>
                </div>
                <p class="exp-step-card-desc" data-i18n="exp_step1_desc">
                  Kenderaan Toyota Alphard & Vellfire bergerak aktif melayani laluan korporat dan pelancongan bernilai tinggi. Jenama anda hadir dengan megah di jalan raya moden Kuala Lumpur.
                </p>
                <div class="exp-step-footer">
                  <span class="exp-metric-pill" data-i18n="exp_step1_metric">50 Kenderaan Premium • Koridor KLIA & Lembah Klang</span>
                  <span class="exp-step-action">Pilih Langkah <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </div>
              </div>

              <!-- Step 2 Card -->
              <div class="exp-step-card" data-step="2" data-video="assets/videos/revo-cabin-experience.mp4" data-badge-key="exp_step2_badge" data-title-key="exp_step2_title" data-metric-key="exp_step2_metric">
                <div class="exp-step-header">
                  <span class="exp-step-number">02</span>
                  <div class="exp-step-title-wrap">
                    <span class="exp-step-nav-tag" data-i18n="exp_step2_nav">02. Kabin VIP 45 Minit</span>
                    <h3 class="exp-step-card-title" data-i18n="exp_step2_title">45 Minit Tontonan Santai Tanpa Sebarang Gangguan</h3>
                  </div>
                </div>
                <p class="exp-step-card-desc" data-i18n="exp_step2_desc">
                  Di dalam kabin Alphard yang sunyi dan berhawa dingin, skrin digital tepat setinggi aras mata penumpang eksekutif. Tiada tombol skip iklan dan tiada gangguan visual luaran.
                </p>
                <div class="exp-step-footer">
                  <span class="exp-metric-pill" data-i18n="exp_step2_metric">100% Focused Attention • Executive HNWIs</span>
                  <span class="exp-step-action">Pilih Langkah <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </div>
              </div>

              <!-- Step 3 Card -->
              <div class="exp-step-card" data-step="3" data-video="assets/videos/revo-live-campaign-perkeso.mp4" data-badge-key="exp_step3_badge" data-title-key="exp_step3_title" data-metric-key="exp_step3_metric">
                <div class="exp-step-header">
                  <span class="exp-step-number">03</span>
                  <div class="exp-step-title-wrap">
                    <span class="exp-step-nav-tag" data-i18n="exp_step3_nav">03. Bukti Siaran Kempen</span>
                    <h3 class="exp-step-card-title" data-i18n="exp_step3_title">Kempen Nyata Di Skrin: Dari Jenama Hingga Agensi Kebangsaan</h3>
                  </div>
                </div>
                <p class="exp-step-card-desc" data-i18n="exp_step3_desc">
                  Saksikan bukti pelaksanaan kempen sebenar seperti PERKESO disiarkan dengan visual berkualiti tinggi sepanjang perjalanan penumpang VIP.
                </p>
                <div class="exp-step-footer">
                  <span class="exp-metric-pill" data-i18n="exp_step3_metric">Live Broadcast Proof • Kualiti Tajam 1080p</span>
                  <span class="exp-step-action">Pilih Langkah <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </div>
              </div>

              <!-- Step 4 Card -->
              <div class="exp-step-card" data-step="4" data-video="assets/videos/revo-vs-billboard.mp4" data-badge-key="exp_step4_badge" data-title-key="exp_step4_title" data-metric-key="exp_step4_metric">
                <div class="exp-step-header">
                  <span class="exp-step-number">04</span>
                  <div class="exp-step-title-wrap">
                    <span class="exp-step-nav-tag" data-i18n="exp_step4_nav">04. Impak vs Media Biasa</span>
                    <h3 class="exp-step-card-title" data-i18n="exp_step4_title">Mengapa In-Car Media Mengatasi Billboard & Skrol Telefon</h3>
                  </div>
                </div>
                <p class="exp-step-card-desc" data-i18n="exp_step4_desc">
                  Billboard lebuh raya hanya dilihat 2 saat ketika memandu laju; iklan telefon diskrol dalam sekelip mata. REVO memberikan 45 minit perhatian penuh dengan kuasa interaksi kod QR segera.
                </p>
                <div class="exp-step-footer">
                  <span class="exp-metric-pill" data-i18n="exp_step4_metric">45 Minit vs 2 Saat • Daya Ingatan Tinggi</span>
                  <span class="exp-step-action">Pilih Langkah <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Panel 2: Contextual Infographics & Guides (3 Structured Cards) -->
        <div class="experience-panel" id="expPostersPanel">
          <div class="posters-narrative-grid">
            <!-- Doc 1: Rate Card -->
            <div class="poster-narrative-card">
              <div class="poster-media-preview">
                <img src="assets/images/revo-official-rate-card.jpg" alt="Poster Kadar Rasmi Pakej Iklan REVO" loading="lazy">
              </div>
              <div class="poster-content-body">
                <span class="poster-topic-badge" data-i18n="exp_doc1_tag">STRUKTUR PELABURAN</span>
                <h3 class="poster-content-title" data-i18n="exp_doc1_title">Kadar Rasmi Pakej Iklan Bulanan</h3>
                <p class="poster-content-desc" data-i18n="exp_doc1_desc">
                  Pilihan fleksibel slot masa 5s hingga 30s untuk 5 hingga 50 kenderaan Alphard & Vellfire dengan struktur pelaburan telus.
                </p>
                <ul class="poster-points-list">
                  <li data-i18n="exp_doc1_p1">Pakej Mengikut Unit: Bermula RM600 hingga RM3,000 sebulan.</li>
                  <li data-i18n="exp_doc1_p2">Pakej Seluruh Rangkaian: Liputan 50 kenderaan (RM4k–RM10k).</li>
                  <li data-i18n="exp_doc1_p3">Penajaan Kategori Eksklusif tersedia untuk sektor utama.</li>
                </ul>
              </div>
            </div>

            <!-- Doc 2: Touchpoints -->
            <div class="poster-narrative-card">
              <div class="poster-media-preview">
                <img src="assets/images/revo-touchpoints-grid.jpg" alt="Ekosistem 6 Titik Sentuhan Penumpang VIP" loading="lazy">
              </div>
              <div class="poster-content-body">
                <span class="poster-topic-badge" data-i18n="exp_doc2_tag">LALUAN STRATEGIK</span>
                <h3 class="poster-content-title" data-i18n="exp_doc2_title">6 Titik Sentuhan Penumpang VIP</h3>
                <p class="poster-content-desc" data-i18n="exp_doc2_desc">
                  Menemani perjalanan sasaran eksekutif di koridor paling strategik Malaysia dari lapangan terbang hingga pusat bandar.
                </p>
                <ul class="poster-points-list">
                  <li data-i18n="exp_doc2_p1">Sambutan Ketibaan KLIA & KLIA2 untuk delegasi kehormat.</li>
                  <li data-i18n="exp_doc2_p2">Hab Hotel 5-Bintang, Suite Mewah & Pusat Bandar KLCC.</li>
                  <li data-i18n="exp_doc2_p3">Pusat Konvensyen, Pameran Korporat & Pusat Beli-Belah Utama.</li>
                </ul>
              </div>
            </div>

            <!-- Doc 3: Overview -->
            <div class="poster-narrative-card">
              <div class="poster-media-preview">
                <img src="assets/images/revo-poster-overview.jpg" alt="Ringkasan Rangkaian Media REVO" loading="lazy">
              </div>
              <div class="poster-content-body">
                <span class="poster-topic-badge" data-i18n="exp_doc3_tag">RINGKASAN MEDIA</span>
                <h3 class="poster-content-title" data-i18n="exp_doc3_title">Ringkasan Rangkaian Media REVO</h3>
                <p class="poster-content-desc" data-i18n="exp_doc3_desc">
                  Pendedahan jenama berprofil tinggi di hadapan ribuan pengguna berpendapatan premium setiap bulan.
                </p>
                <ul class="poster-points-list">
                  <li data-i18n="exp_doc3_p1">Sasaran Minima 500 Prospek terus setiap hari secara konsisten.</li>
                  <li data-i18n="exp_doc3_p2">Audiens disaring: Eksekutif C-Suite, Pelabur & Pelancong Mewah.</li>
                  <li data-i18n="exp_doc3_p3">Format fleksibel: Video, Imej Slaid, Split Screen & QR Interaktif.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="revo-section faq-section" id="faq">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag" data-i18n="faq_tag">SEBELUM ANDA BERMULA</div>
          <h2 class="section-title" data-i18n="faq_title">Beberapa Perkara Yang Anda Mungkin Ingin Tahu.</h2>
          <p class="section-subtitle" data-i18n="faq_subtitle">
            Jawapan telus kepada persoalan lazim untuk membantu anda membuat penilaian awal dengan yakin.
          </p>
        </div>

        <div class="faq-container">
          <!-- FAQ 1 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span data-i18n="faq1_q">Apakah jenis perniagaan yang sesuai?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p data-i18n="faq1_a">REVO terbuka kepada pertanyaan daripada pelbagai industri yang ingin meneroka pengiklanan mudah alih sebagai sebahagian daripada strategi pemasaran — termasuk perhotelan, pelancongan, pembangunan hartanah, perbankan, perkhidmatan korporat dan jenama gaya hidup.</p>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span data-i18n="faq2_q">Berapakah kos untuk memulakan kempen?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p data-i18n="faq2_a">Kos bergantung pada skop kempen, format iklan (video atau imej), tempoh siaran dan ketersediaan slot kenderaan. Hubungi kami untuk membincangkan pilihan yang sesuai mengikut bajet dan sasaran pulangan pemasaran anda.</p>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span data-i18n="faq3_q">Adakah saya perlu menyediakan bahan iklan sendiri?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p data-i18n="faq3_a">Keperluan bahan kreatif boleh dibincangkan bersama pasukan REVO berdasarkan format iklan dan spesifikasi kempen. Anda boleh menggunakan aset sedia ada atau kami boleh berkongsi panduan teknikal resolusi dan saiz paparan yang optimum.</p>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span data-i18n="faq4_q">Bagaimanakah liputan kempen ditentukan?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p data-i18n="faq4_a">Pilihan liputan bergantung pada kenderaan dan operasi yang tersedia pada masa kempen dirancang, termasuk laluan mobiliti di sekitar Lembah Klang, koridor perhubungan KLIA, pusat komersial dan destinasi hotel utama.</p>
            </div>
          </div>

          <!-- FAQ 5 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span data-i18n="faq5_q">Bagaimanakah saya boleh mendapatkan maklumat lanjut?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p data-i18n="faq5_a">Hubungi kami melalui WhatsApp untuk berkongsi objektif pemasaran dan mendapatkan maklumat lanjut tanpa sebarang obligasi pembelian segera.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         11. CONVERSION SECTION — LOW-PRESSURE CTA
         ======================================================================== -->
    <section class="conversion-section" id="conversion">
      <div class="conversion-bg" aria-hidden="true">
        <img src="assets/images/alphard-interior.jpg" alt="In-car screen Alphard interior" loading="lazy">
      </div>
      <div class="conversion-overlay" aria-hidden="true"></div>

      <div class="revo-container">
        <div class="conversion-content">
          <div class="section-tag" data-i18n="conv_tag" style="justify-content: center;">PUT IT INSIDE THE JOURNEY</div>
          <h2 class="conversion-title" data-i18n="conv_title">Because The Best Brands Don't Just Advertise &mdash; <span class="text-gold-gradient">They Travel With Their Audience.</span></h2>
          <p class="conversion-subtext" data-i18n="conv_subtext">
            Bina pendedahan jenama yang eksklusif, dipercayai dan berimpak tinggi dalam perjalanan eksekutif harian di Malaysia. Let's Build Your Brand Together.
          </p>

          <div class="conversion-cta-wrap">
            <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-full-mobile">
              <span data-i18n="conv_cta_wa">BERBUAL DENGAN PASUKAN REVO</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#packages" class="btn btn-outline btn-full-mobile">
              <span data-i18n="conv_cta_pkg">LIHAT PILIHAN KEMPEN</span>
            </a>
          </div>

          <div class="conversion-small-text" data-i18n="conv_small">
            Tiada keperluan untuk menyediakan pelan lengkap. Kongsikan idea anda dan kita mulakan perbincangan.
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         12. CONTACT FORM — MINIMAL FRICTION (BACKEND VALIDATED)
         ======================================================================== -->
    <section class="revo-section contact-section" id="contact">
      <div class="revo-container">
        <div class="contact-layout">
          <!-- Information & Direct WhatsApp -->
          <div class="contact-info-col">
            <div class="section-tag" data-i18n="contact_tag">HUBUNGI KAMI</div>
            <h2 class="section-title" data-i18n="contact_title">Ceritakan Sedikit Tentang Kempen Anda.</h2>
            <p class="section-subtitle" data-i18n="contact_subtitle">
              Kami ingin memahami keperluan anda supaya perbincangan boleh bermula dengan lebih terarah dan bersesuaian dengan matlamat perniagaan anda.
            </p>

            <div class="contact-card-box">
              <div class="contact-channel-item">
                <div class="contact-channel-icon" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/>
                  </svg>
                </div>
                <div>
                  <div class="contact-channel-label" data-i18n="contact_channel_wa">Saluran WhatsApp Rasmi</div>
                  <div class="contact-channel-value"><?= e($displayPhone) ?></div>
                </div>
              </div>

              <div class="contact-channel-item">
                <div class="contact-channel-icon" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                  </svg>
                </div>
                <div>
                  <div class="contact-channel-label" data-i18n="contact_channel_email">E-mel Pertanyaan Korporat</div>
                  <div class="contact-channel-value"><?= e($displayEmail) ?></div>
                </div>
              </div>

              <div class="contact-channel-item">
                <div class="contact-channel-icon" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 2a14.5 14.5 0 000 20 14.5 14.5 0 000-20"/>
                    <path d="M2 12h20"/>
                  </svg>
                </div>
                <div>
                  <div class="contact-channel-label" data-i18n="contact_channel_area">Kawasan Perkhidmatan</div>
                  <div class="contact-channel-value" data-i18n="contact_channel_area_val">Kuala Lumpur & Lembah Klang, Malaysia</div>
                </div>
              </div>

              <div style="margin-top: var(--space-xs);">
                <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-full-mobile">
                  <span data-i18n="contact_btn_direct_wa">WHATSAPP REVO TERUS</span>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
              </div>
            </div>
          </div>

          <!-- Contact Form Box -->
          <div class="contact-form-wrap">
            <!-- Flash Message from Session if redirect occurred -->
            <?php if (!empty($_SESSION['flash_success'])): ?>
              <div class="form-feedback success" style="display:block;">
                <?= e($_SESSION['flash_success']); unset($_SESSION['flash_success']); ?>
              </div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['flash_error'])): ?>
              <div class="form-feedback error" style="display:block;">
                <?= e($_SESSION['flash_error']); unset($_SESSION['flash_error']); ?>
              </div>
            <?php endif; ?>

            <div id="formFeedback" class="form-feedback" role="alert"></div>

            <form id="revoContactForm" action="submit_enquiry.php" method="POST" novalidate>
              <!-- CSRF Token -->
              <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
              <input type="hidden" name="form_loaded_at" value="<?= $formLoadedTime ?>">

              <!-- Honeypot Anti-Spam Field -->
              <div class="revo-hp-field" aria-hidden="true">
                <label for="revo_hp">Leave this empty</label>
                <input type="text" id="revo_hp" name="revo_hp" tabindex="-1" autocomplete="off">
              </div>

              <div class="form-grid form-grid-2">
                <!-- Name -->
                <div class="form-group">
                  <label for="name"><span data-i18n="form_name_label">Nama Penuh</span> <span style="color:#C9A45C;">*</span></label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="cth. Encik Razak" data-i18n-placeholder="form_name_ph" required>
                </div>

                <!-- Company -->
                <div class="form-group">
                  <label for="company"><span data-i18n="form_company_label">Nama Syarikat / Jenama</span> <span style="color:#C9A45C;">*</span></label>
                  <input type="text" id="company" name="company" class="form-control" placeholder="cth. Zenith Holdings Sdn Bhd" data-i18n-placeholder="form_company_ph" required>
                </div>
              </div>

              <div class="form-grid form-grid-2" style="margin-top: var(--space-md);">
                <!-- Email -->
                <div class="form-group">
                  <label for="email"><span data-i18n="form_email_label">Alamat E-mel Korporat</span> <span style="color:#C9A45C;">*</span></label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="nama@syarikat.com.my" data-i18n-placeholder="form_email_ph" required>
                </div>

                <!-- WhatsApp Number -->
                <div class="form-group">
                  <label for="phone"><span data-i18n="form_phone_label">Nombor WhatsApp</span> <span style="color:#C9A45C;">*</span></label>
                  <input type="tel" id="phone" name="phone" class="form-control" placeholder="cth. 012-3456789 atau +6011..." data-i18n-placeholder="form_phone_ph" required>
                </div>
              </div>

              <div class="form-grid form-grid-2" style="margin-top: var(--space-md);">
                <!-- Industry -->
                <div class="form-group">
                  <label for="industry"><span data-i18n="form_industry_label">Kategori Industri</span> <span style="color:#C9A45C;">*</span></label>
                  <select id="industry" name="industry" class="form-control" required>
                    <option value="" disabled selected data-i18n="form_industry_default">Pilih Industri Anda</option>
                    <option value="Hotels & Resorts" data-i18n="ind_4">Hotels & Resorts</option>
                    <option value="Tourism & Travel">Tourism & Travel</option>
                    <option value="Property Development" data-i18n="ind_3">Property Development</option>
                    <option value="Automotive" data-i18n="ind_2">Automotive</option>
                    <option value="Banking & Finance" data-i18n="ind_5">Banking & Finance</option>
                    <option value="Luxury Brands" data-i18n="ind_1">Luxury Brands</option>
                    <option value="Food & Beverage" data-i18n="ind_6">Food & Beverage</option>
                    <option value="Technology" data-i18n="ind_8">Technology</option>
                    <option value="Corporate Companies" data-i18n="ind_9">Corporate Companies</option>
                    <option value="Events & Experiences" data-i18n="ind_12">Events & Experiences</option>
                    <option value="Lain-lain" data-i18n="form_industry_other">Lain-lain Kategori</option>
                  </select>
                </div>

                <!-- Estimated Budget (Optional) -->
                <div class="form-group">
                  <label for="budget"><span data-i18n="form_budget_label">Anggaran Bajet Kempen</span> <span class="optional" data-i18n="form_budget_opt">(Pilihan)</span></label>
                  <select id="budget" name="budget" class="form-control">
                    <option value="Belum ditentukan / Fleksibel" data-i18n="form_budget_opt0">Belum ditentukan / Terbuka untuk cadangan</option>
                    <option value="Bawah RM 5,000" data-i18n="form_budget_opt1">Di bawah RM 5,000</option>
                    <option value="RM 5,000 - RM 15,000" data-i18n="form_budget_opt2">RM 5,000 – RM 15,000</option>
                    <option value="RM 15,000 - RM 30,000" data-i18n="form_budget_opt3">RM 15,000 – RM 30,000</option>
                    <option value="RM 30,000 ke atas" data-i18n="form_budget_opt4">RM 30,000 ke atas</option>
                  </select>
                </div>
              </div>

              <!-- Campaign Objectives -->
              <div class="form-group" style="margin-top: var(--space-md);">
                <label for="objectives" data-i18n="form_obj_label">Objektif Kempen</label>
                <input type="text" id="objectives" name="objectives" class="form-control" placeholder="cth. Pelancaran produk baharu / Bina kesedaran jenama di KL" data-i18n-placeholder="form_obj_ph">
              </div>

              <!-- Message -->
              <div class="form-group" style="margin-top: var(--space-md);">
                <label for="message" data-i18n="form_msg_label">Mesej / Keperluan Tambahan</label>
                <textarea id="message" name="message" class="form-control" placeholder="Kongsikan sebarang perincian kempen atau pertanyaan yang ingin anda bincangkan..." data-i18n-placeholder="form_msg_ph"></textarea>
              </div>

              <div style="margin-top: var(--space-lg); display: flex; flex-direction: column; gap: var(--space-sm);">
                <button type="submit" id="submitBtn" class="btn btn-primary btn-full-mobile">
                  <span data-i18n="form_submit_btn">HANTAR PERTANYAAN</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
                <div class="microcopy" style="justify-content: center;">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                  <span data-i18n="form_privacy_note">Maklumat anda dilindungi dan hanya digunakan untuk tujuan perbincangan kempen rasmi.</span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- ========================================================================
       13. FLOATING WHATSAPP BUTTON (SAFE FROM BOTTOM EDGE)
       ======================================================================== -->
  <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="floating-whatsapp" aria-label="Berbual dengan Pasukan REVO di WhatsApp" data-i18n-aria="floating_wa_aria">
    <span class="floating-wa-badge" data-i18n="floating_wa_badge">Bincang Kempen di WhatsApp</span>
    <div class="floating-wa-btn" aria-hidden="true">
      <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
      </svg>
    </div>
  </a>

  <!-- ========================================================================
       14. FOOTER
       ======================================================================== -->
  <footer class="revo-footer">
    <div class="revo-container">
      <div class="footer-top-grid">
        <!-- Brand Info -->
        <div class="footer-brand-info">
          <div class="brand-link" style="margin-bottom: var(--space-xs);">
            <div class="brand-emblem" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                <polyline points="2 17 12 22 22 17"></polyline>
                <polyline points="2 12 12 17 22 12"></polyline>
              </svg>
            </div>
            <div class="brand-text">
              <span class="brand-name">REVO <span>LUX</span></span>
              <span class="brand-tagline-sub">Mobile Media Network</span>
            </div>
          </div>
          <div class="footer-tagline-main">“<?= e(PRIMARY_TAGLINE) ?>”</div>
          <p style="font-size: 0.85rem; color: var(--c-silver);" data-i18n="footer_tagline">
            Premium Mobile Advertising | Brand Visibility | Business Opportunities.<br>
            Menyediakan medium komunikasi digital eksklusif di dalam kenderaan Toyota Alphard & Vellfire di Malaysia.
          </p>
        </div>

        <!-- Quick Links -->
        <div>
          <div class="footer-col-title" data-i18n="footer_col_nav">Navigasi Utama</div>
          <ul class="footer-links-list">
            <li><a href="#hero" data-i18n="nav_home">Home</a></li>
            <li><a href="#about" data-i18n="nav_about">About REVO</a></li>
            <li><a href="#network" data-i18n="nav_network">Our Network</a></li>
            <li><a href="#solutions" data-i18n="nav_solutions">Advertising Solutions</a></li>
            <li><a href="#industries" data-i18n="nav_industries">Industries We Serve</a></li>
            <li><a href="#packages" data-i18n="nav_packages">Campaign Packages</a></li>
            <li><a href="#contact" data-i18n="nav_contact">Contact & Enquiry</a></li>
            <li><a href="admin/login.php" style="color: rgba(201,164,92,0.6);">Admin Portal</a></li>
          </ul>
        </div>

        <!-- Contacts -->
        <div>
          <div class="footer-col-title" data-i18n="footer_col_contact">Hubungi Kami</div>
          <ul class="footer-links-list">
            <li>
              <strong style="color: var(--c-ivory);">WhatsApp:</strong><br>
              <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer"><?= e($displayPhone) ?></a>
            </li>
            <li style="margin-top: 6px;">
              <strong style="color: var(--c-ivory);">E-mel:</strong><br>
              <a href="mailto:<?= e($displayEmail) ?>"><?= e($displayEmail) ?></a>
            </li>
            <li style="margin-top: 6px;">
              <strong style="color: var(--c-ivory);" data-i18n="footer_market_label">Pasaran:</strong><br>
              <span data-i18n="contact_channel_area_val">Kuala Lumpur & Lembah Klang, Malaysia</span>
            </li>
            <li style="margin-top: 6px;">
              <strong style="color: var(--c-ivory);">Domain:</strong><br>
              <span><?= e(BRAND_DOMAIN) ?></span>
            </li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <div data-i18n="footer_copy">
          &copy; 2026 <?= e(BRAND_NAME) ?>. Hak cipta terpelihara.
        </div>
        <div style="display: flex; gap: var(--space-md);">
          <a href="#faq" class="btn-text-link" style="font-size: 0.775rem;" data-i18n="footer_faq_link">Soalan Lazim (FAQ)</a>
          <span style="color: var(--c-silver-dark);">|</span>
          <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn-text-link" style="font-size: 0.775rem;" data-i18n="footer_wa_link">Sembang WhatsApp</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- ========================================================================
       15. INTERACTIVE SOLUTIONS MODAL DIALOG
       ======================================================================== -->
  <div class="revo-modal-overlay" id="solutionModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="revo-modal-container">
      <div class="modal-header">
        <h3 class="modal-title" id="modalTitle" data-i18n="modal_main_title">Spesifikasi Format Iklan</h3>
        <button type="button" class="modal-close-btn" aria-label="Tutup Tetingkap">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>
      <div class="modal-body" id="modalBody">
        <!-- Injected via JavaScript -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline btn-sm" id="modalCloseFooter" data-i18n="modal_close_btn">Tutup</button>
        <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" id="modalWaBtn">
          <span data-i18n="modal_wa_btn">Bincang Format Ini di WhatsApp</span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
  </div>

  <!-- ========================================================================
       16. MULTIMEDIA LIGHTBOX MODAL (VIDEO & IMAGE FULLSCREEN)
       ======================================================================== -->
  <div class="revo-lightbox" id="mediaLightboxModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="lightboxTitle">
    <div class="revo-lightbox-dialog">
      <div class="revo-lightbox-header">
        <h3 class="revo-lightbox-title" id="lightboxTitle">Media REVO</h3>
        <button type="button" class="revo-lightbox-close" id="lightboxCloseBtn" aria-label="Tutup">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>
      <div class="revo-lightbox-body" id="lightboxBody">
        <!-- Injected via JavaScript -->
      </div>
      <div class="revo-lightbox-footer">
        <span class="revo-lightbox-desc" id="lightboxDesc"></span>
        <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
          <span>Bincang Kempen di WhatsApp</span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
  </div>

  <!-- JavaScript: i18n Language Engine & Main Interactions -->
  <script src="assets/js/i18n.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
