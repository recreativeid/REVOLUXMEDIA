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
?>
<!DOCTYPE html>
<html lang="ms">
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

      <!-- Desktop Nav -->
      <nav class="desktop-nav" aria-label="Navigasi Utama">
        <a href="#hero" class="nav-link">Home</a>
        <a href="#about" class="nav-link">About</a>
        <a href="#network" class="nav-link">Our Network</a>
        <a href="#solutions" class="nav-link">Solutions</a>
        <a href="#industries" class="nav-link">Industries</a>
        <a href="#packages" class="nav-link">Packages</a>
        <a href="#contact" class="nav-link">Contact</a>
      </nav>

      <!-- Action & Hamburger -->
      <div class="header-actions">
        <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm header-enquire-btn">
          <span>ENQUIRE NOW</span>
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
    <ul class="mobile-nav-links">
      <li>
        <a href="#hero" class="mobile-nav-link">
          <span>Home</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#about" class="mobile-nav-link">
          <span>About REVO</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#how-it-works" class="mobile-nav-link">
          <span>How It Works</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#network" class="mobile-nav-link">
          <span>Our Network</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#solutions" class="mobile-nav-link">
          <span>Solutions</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#industries" class="mobile-nav-link">
          <span>Industries</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#packages" class="mobile-nav-link">
          <span>Packages</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#faq" class="mobile-nav-link">
          <span>FAQ</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
      <li>
        <a href="#contact" class="mobile-nav-link">
          <span>Contact</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </a>
      </li>
    </ul>

    <div class="mobile-nav-footer">
      <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-full-mobile">
        <span>ENQUIRE NOW VIA WHATSAPP</span>
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
          <!-- Small Label -->
          <div class="hero-badge">
            <span class="hero-badge-dot"></span>
            <span class="hero-badge-text"><?= e(BRAND_NETWORK) ?></span>
          </div>

          <!-- Main English Headline -->
          <h1 class="hero-title">
            YOUR BRAND.<br>
            <span class="text-gold-gradient">A MORE DISTINCTIVE</span> JOURNEY.
          </h1>

          <!-- Supporting Malay Marketing Headline -->
          <h2 class="hero-headline-my">
            <?= e(MALAY_HEADLINE) ?>
          </h2>

          <!-- Description -->
          <p class="hero-description">
            Perkenalkan jenama anda melalui medium pengiklanan mudah alih yang menggabungkan perjalanan premium dengan komunikasi digital. REVO membantu perniagaan meneroka pendekatan baharu untuk menyampaikan mesej jenama mereka.
          </p>

          <!-- CTAs -->
          <div class="hero-cta-group">
            <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-full-mobile">
              <span>BINCANGKAN KEMPEN ANDA</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#solutions" class="btn btn-outline btn-full-mobile">
              <span>TEROKAI CARA IA BERFUNGSI</span>
            </a>
          </div>

          <!-- Supporting Microcopy -->
          <div class="microcopy">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
            <span>Pakej dan pilihan kempen boleh dibincangkan mengikut keperluan perniagaan.</span>
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
          <h2 class="value-strip-title">Lebih Daripada Sekadar Ruang Pengiklanan.</h2>
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
            <h3 class="value-card-title">PREMIUM MOBILITY</h3>
            <p class="value-card-desc">Pengiklanan dalam persekitaran kenderaan premium Toyota Alphard & Vellfire.</p>
          </div>

          <!-- Benefit 2 -->
          <div class="value-card">
            <div class="value-card-icon" aria-hidden="true">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
              </svg>
            </div>
            <h3 class="value-card-title">DISTINCTIVE BRAND PRESENCE</h3>
            <p class="value-card-desc">Satu lagi cara tersendiri untuk memperkenalkan jenama anda kepada sasaran berimpak.</p>
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
            <h3 class="value-card-title">FLEXIBLE CAMPAIGN OPTIONS</h3>
            <p class="value-card-desc">Pilihan kempen dan format paparan yang boleh dibincangkan mengikut keperluan perniagaan.</p>
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
          <!-- Automotive Visual -->
          <div class="about-image-card">
            <img src="assets/images/alphard-interior.jpg" alt="Suasana kabin dalaman Alphard dengan paparan skrin media digital" loading="lazy">
            <div class="about-image-badge">
              <span class="about-image-badge-text">PENGALAMAN KABIN VIP ALPHARD</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#C9A45C" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
            </div>
          </div>

          <!-- Asymmetric Ivory Editorial Content Panel -->
          <div class="about-content-panel">
            <div class="section-tag">MENGENAI REVO</div>
            <h2 class="section-title">Membawa Pengiklanan Lebih Dekat Kepada Pengalaman Perjalanan.</h2>

            <p class="about-lead-text">
              REVO Premium Mobile Media Network dibangunkan dengan idea bahawa peluang memperkenalkan jenama tidak semestinya terhad kepada saluran pengiklanan konvensional.
            </p>

            <p class="about-body-text">
              Melalui konsep pengiklanan mudah alih yang memanfaatkan kenderaan premium, REVO berhasrat membantu perniagaan meneroka cara berbeza untuk menyampaikan mesej, mempromosikan produk dan membina kesedaran jenama.
            </p>

            <p class="about-body-text">
              Setiap kempen boleh dibincangkan berdasarkan objektif pemasaran, jenis kandungan dan pilihan liputan yang tersedia.
            </p>

            <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin mengenali pendekatan REVO dan membincangkan peluang kolaborasi.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
              <span>KENALI PENDEKATAN REVO</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         5. HOW IT WORKS — SIMPLIFY THE DECISION
         ======================================================================== -->
    <section class="revo-section how-it-works-section" id="how-it-works">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag">CARA KEMPEN BERFUNGSI</div>
          <h2 class="section-title">Daripada Idea Kepada Kempen, Dengan Lebih Mudah.</h2>
          <p class="section-subtitle">
            Kami memudahkan proses pelaksanaan supaya anda dapat menumpukan kepada matlamat utama jenama tanpa kerumitan teknikal.
          </p>
        </div>

        <div class="steps-container">
          <!-- Step 1 -->
          <div class="step-card">
            <div class="step-number-pill">STEP 01</div>
            <h3 class="step-title">KONGSI OBJEKTIF ANDA</h3>
            <p class="step-description">
              Beritahu kami tentang jenama, produk, sasaran pemasaran dan matlamat kempen anda melalui perbincangan ringkas.
            </p>
          </div>

          <!-- Step 2 -->
          <div class="step-card">
            <div class="step-number-pill">STEP 02</div>
            <h3 class="step-title">TEROKAI PILIHAN YANG SESUAI</h3>
            <p class="step-description">
              Bincangkan format iklan, tempoh kempen dan ketersediaan kenderaan bersama pasukan perunding REVO.
            </p>
          </div>

          <!-- Step 3 -->
          <div class="step-card">
            <div class="step-number-pill">STEP 03</div>
            <h3 class="step-title">RANCANG KEMPEN ANDA</h3>
            <p class="step-description">
              Semak cadangan kempen dan butiran yang dipersetujui sebelum pelaksanaan bermula dengan lancar.
            </p>
          </div>
        </div>

        <div style="text-align: center;">
          <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin memulakan perbincangan mengenai perancangan kempen jenama kami.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
            <span>BERMULA DENGAN PERBINCANGAN</span>
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
          <div class="section-tag">PENYELESAIAN PENGIKLANAN</div>
          <h2 class="section-title">Pilih Cara Yang Sesuai Untuk Menceritakan Jenama Anda.</h2>
          <p class="section-subtitle">
            Setiap jenama mempunyai objektif yang berbeza. Terokai format pengiklanan yang mungkin sesuai dengan mesej dan keperluan kempen anda.
          </p>
        </div>

        <div class="solutions-grid">
          <!-- Card 1 -->
          <div class="solution-card">
            <div>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <polygon points="23 7 16 12 23 17 23 7"/>
                  <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
                </svg>
              </div>
              <h3 class="solution-title">IN-CAR VIDEO ADVERTISING</h3>
              <p class="solution-desc">Paparkan video promosi melalui skrin yang tersedia di dalam kenderaan dengan paparan berdefinisi tinggi.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="video" aria-haspopup="dialog">
                <span>Ketahui lebih lanjut</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="solution-card">
            <div>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                  <circle cx="8.5" cy="8.5" r="1.5"/>
                  <polyline points="21 15 16 10 5 21"/>
                </svg>
              </div>
              <h3 class="solution-title">DIGITAL IMAGE ADVERTISING</h3>
              <p class="solution-desc">Ketengahkan produk, visual jenama dan tawaran promosi dalam format grafik beresolusi tinggi yang tajam.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="image" aria-haspopup="dialog">
                <span>Ketahui lebih lanjut</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="solution-card">
            <div>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
              </div>
              <h3 class="solution-title">BRAND AWARENESS CAMPAIGNS</h3>
              <p class="solution-desc">Terokai peluang memperkenalkan jenama melalui medium mudah alih yang memberi impak visual konsisten.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="awareness" aria-haspopup="dialog">
                <span>Ketahui lebih lanjut</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 4 -->
          <div class="solution-card">
            <div>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <rect x="3" y="3" width="7" height="7"/>
                  <rect x="14" y="3" width="7" height="7"/>
                  <rect x="14" y="14" width="7" height="7"/>
                  <rect x="3" y="14" width="7" height="7"/>
                </svg>
              </div>
              <h3 class="solution-title">QR CODE ADVERTISING</h3>
              <p class="solution-desc">Hubungkan kandungan iklan dengan laman web rasmi, katalog digital atau halaman promosi khas.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="qr" aria-haspopup="dialog">
                <span>Ketahui lebih lanjut</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 5 -->
          <div class="solution-card">
            <div>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <circle cx="12" cy="12" r="10"/>
                  <path d="M16 12l-4-4-4 4M12 16V8"/>
                </svg>
              </div>
              <h3 class="solution-title">PRODUCT & SERVICE PROMOTIONS</h3>
              <p class="solution-desc">Perkenalkan produk baharu, tawaran eksklusif dan perkhidmatan perniagaan kepada penumpang.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="promotions" aria-haspopup="dialog">
                <span>Ketahui lebih lanjut</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>

          <!-- Card 6 -->
          <div class="solution-card">
            <div>
              <div class="solution-icon-wrap" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
              </div>
              <h3 class="solution-title">CUSTOM CAMPAIGNS</h3>
              <p class="solution-desc">Bincangkan pendekatan pengiklanan tersuai berdasarkan objektif dan keperluan khusus jenama anda.</p>
            </div>
            <div class="solution-footer">
              <button type="button" class="btn-text-link" data-solution-modal="custom" aria-haspopup="dialog">
                <span>Ketahui lebih lanjut</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>
        </div>

        <p class="solution-disclaimer">
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
            <div class="section-tag">RANGKAIAN KAMI</div>
            <h2 class="section-title"><?= e($settings['fleet_headline'] ?? '50 Kenderaan. Satu Rangkaian Media.') ?></h2>
            
            <p class="section-subtitle" style="margin-bottom: var(--space-md);">
              <?= e($settings['fleet_subtext'] ?? 'REVO menyasarkan pembangunan rangkaian sehingga 50 buah Toyota Alphard dan Toyota Vellfire di sekitar Lembah Klang, dengan potensi peluang kempen berkaitan perjalanan lapangan terbang, hotel, pelancongan dan pengangkutan korporat.') ?>
            </p>

            <!-- 4 Potential Campaign Contexts -->
            <div class="network-contexts-grid">
              <div class="network-context-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <span class="network-context-name">Klang Valley</span>
              </div>
              <div class="network-context-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.8 19.2L16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.3c.4-.2.6-.6.5-1.1z"/></svg>
                <span class="network-context-name">KLIA Corridor</span>
              </div>
              <div class="network-context-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 7v14M21 7v14M6 7V4a1 1 0 011-1h10a1 1 0 011 1v3M9 11h2M9 15h2M13 11h2M13 15h2"/></svg>
                <span class="network-context-name">Hotels & Hospitality</span>
              </div>
              <div class="network-context-item">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                <span class="network-context-name">Corporate Mobility</span>
              </div>
            </div>

            <!-- Responsible presentation note -->
            <div class="network-responsible-note">
              Rangkaian 50 kenderaan merupakan sasaran fasa pembangunan berperingkat bagi memastikan kualiti penyiaran dan pengurusan kempen beroperasi dengan tahap kecemerlangan tertinggi.
            </div>

            <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin menyemak pilihan liputan kenderaan Alphard & Vellfire yang tersedia untuk kempen jenama saya.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
              <span>SEMAK PILIHAN LIPUTAN</span>
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
          <div class="section-tag">UNTUK PELBAGAI INDUSTRI</div>
          <h2 class="section-title">Adakah REVO Sesuai Untuk Jenama Anda?</h2>
          <p class="section-subtitle">
            Daripada perniagaan hospitaliti hingga jenama korporat, setiap kempen bermula dengan memahami siapa yang ingin anda jangkau.
          </p>
        </div>

        <div class="industries-grid">
          <!-- 1 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16"/></svg>
            </div>
            <span class="industry-name">Hotels & Resorts</span>
          </div>

          <!-- 2 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
            </div>
            <span class="industry-name">Tourism & Travel</span>
          </div>

          <!-- 3 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5"/></svg>
            </div>
            <span class="industry-name">Property Development</span>
          </div>

          <!-- 4 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
            </div>
            <span class="industry-name">Automotive</span>
          </div>

          <!-- 5 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
            </div>
            <span class="industry-name">Banking & Finance</span>
          </div>

          <!-- 6 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <span class="industry-name">Luxury Brands</span>
          </div>

          <!-- 7 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM6 1v3M10 1v3M14 1v3"/></svg>
            </div>
            <span class="industry-name">Food & Beverage</span>
          </div>

          <!-- 8 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
            <span class="industry-name">Technology</span>
          </div>

          <!-- 9 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            </div>
            <span class="industry-name">Corporate Companies</span>
          </div>

          <!-- 10 -->
          <div class="industry-card">
            <div class="industry-icon" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <span class="industry-name">Events & Experiences</span>
          </div>
        </div>

        <!-- Closing Banner with Soft Selling CTA -->
        <div class="industry-cta-banner">
          <div class="industry-cta-text">
            <strong>Tidak pasti sama ada perkhidmatan ini sesuai untuk perniagaan anda?</strong><br>
            Ceritakan objektif pemasaran anda kepada kami untuk meneroka potensi yang bersesuaian.
          </div>
          <a href="<?= e(getWhatsAppUrl('Salam REVO, saya ingin berbincang sama ada medium ini sesuai untuk industri perniagaan saya.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
            <span>BINCANG DENGAN REVO</span>
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
          <div class="section-tag">PILIHAN KEMPEN</div>
          <h2 class="section-title">Kita Mulakan Dengan Keperluan Jenama Anda.</h2>
          <p class="section-subtitle">
            Tidak semua perniagaan memerlukan pendekatan yang sama. Bincangkan keperluan anda untuk meneroka pilihan kempen yang bersesuaian.
          </p>
        </div>

        <div class="packages-grid">
          <?php foreach ($packages as $pkg): ?>
            <?php 
              $isGrowth = ($pkg['id'] ?? '') === 'growth'; 
              $pkgWaText = !empty($pkg['whatsapp_msg']) ? $pkg['whatsapp_msg'] : ('Salam REVO, saya ingin mengetahui lebih lanjut mengenai ' . ($pkg['name'] ?? 'Pakej Kempen'));
              $pkgWaUrl = 'https://wa.me/' . $cleanWaNum . '?text=' . rawurlencode($pkgWaText);
            ?>
            <div class="package-card <?= $isGrowth ? 'highlight' : '' ?>">
              <span class="package-code"><?= e($pkg['code'] ?? 'PACKAGE') ?></span>
              <h3 class="package-title"><?= e($pkg['name'] ?? 'Pakej Kempen') ?></h3>
              
              <?php if (!empty($pkg['tag'])): ?>
                <span class="package-tag-badge"><?= e($pkg['tag']) ?></span>
              <?php endif; ?>

              <p class="package-desc"><?= e($pkg['description'] ?? '') ?></p>

              <ul class="package-specs">
                <li class="package-spec-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
                  <span><?= e($pkg['suitable_format'] ?? '') ?></span>
                </li>
                <li class="package-spec-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
                  <span><?= e($pkg['coverage'] ?? '') ?></span>
                </li>
                <li class="package-spec-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
                  <span><?= e($pkg['period'] ?? '') ?></span>
                </li>
              </ul>

              <div class="package-price-wrap">
                <div class="package-price-label">Struktur Pelaburan:</div>
                <div class="package-price"><?= e($pkg['price'] ?? 'Contact Us for Rates') ?></div>
                <div class="package-price-sub"><?= e($pkg['price_note'] ?? 'Tertakluk kepada perbincangan objektif kempen') ?></div>
              </div>

              <a href="<?= e($pkgWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn <?= $isGrowth ? 'btn-primary' : 'btn-outline' ?> btn-full-mobile">
                <span><?= e($pkg['cta_text'] ?? 'BINCANGKAN PAKEJ') ?></span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </a>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Soft Reassurance Box -->
        <div class="soft-reassurance-box">
          <p>
            <?= e($settings['soft_reassurance'] ?? 'Masih dalam peringkat merancang? Tidak mengapa. Hubungi kami untuk memahami pilihan yang tersedia sebelum membuat keputusan.') ?>
          </p>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         10. OBJECTION-HANDLING FAQ ACCORDION
         ======================================================================== -->
    <section class="revo-section faq-section" id="faq">
      <div class="revo-container">
        <div class="section-header text-center">
          <div class="section-tag">SEBELUM ANDA BERMULA</div>
          <h2 class="section-title">Beberapa Perkara Yang Anda Mungkin Ingin Tahu.</h2>
          <p class="section-subtitle">
            Jawapan telus kepada persoalan lazim untuk membantu anda membuat penilaian awal dengan yakin.
          </p>
        </div>

        <div class="faq-container">
          <!-- FAQ 1 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span>Apakah jenis perniagaan yang sesuai?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p>REVO terbuka kepada pertanyaan daripada pelbagai industri yang ingin meneroka pengiklanan mudah alih sebagai sebahagian daripada strategi pemasaran — termasuk perhotelan, pelancongan, pembangunan hartanah, perbankan, perkhidmatan korporat dan jenama gaya hidup.</p>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span>Berapakah kos untuk memulakan kempen?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p>Kos bergantung pada skop kempen, format iklan (video atau imej), tempoh siaran dan ketersediaan slot kenderaan. Hubungi kami untuk membincangkan pilihan yang sesuai mengikut bajet dan sasaran pulangan pemasaran anda.</p>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span>Adakah saya perlu menyediakan bahan iklan sendiri?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p>Keperluan bahan kreatif boleh dibincangkan bersama pasukan REVO berdasarkan format iklan dan spesifikasi kempen. Anda boleh menggunakan aset sedia ada atau kami boleh berkongsi panduan teknikal resolusi dan saiz paparan yang optimum.</p>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span>Bagaimanakah liputan kempen ditentukan?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p>Pilihan liputan bergantung pada kenderaan dan operasi yang tersedia pada masa kempen dirancang, termasuk laluan mobiliti di sekitar Lembah Klang, koridor perhubungan KLIA, pusat komersial dan destinasi hotel utama.</p>
            </div>
          </div>

          <!-- FAQ 5 -->
          <div class="faq-item">
            <button type="button" class="faq-header" aria-expanded="false">
              <span>Bagaimanakah saya boleh mendapatkan maklumat lanjut?</span>
              <div class="faq-icon" aria-hidden="true">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </button>
            <div class="faq-body">
              <p>Hubungi kami melalui WhatsApp untuk berkongsi objektif pemasaran dan mendapatkan maklumat lanjut tanpa sebarang obligasi pembelian segera.</p>
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
          <div class="section-tag" style="justify-content: center;">MULAKAN LANGKAH PERTAMA</div>
          <h2 class="conversion-title">Setiap Jenama Bermula Dengan Satu Idea.</h2>
          <p class="conversion-subtext">
            Jika anda sedang meneroka cara baharu untuk memperkenalkan jenama, kami sedia berbincang tentang kemungkinan yang sesuai untuk perniagaan anda.
          </p>

          <div class="conversion-cta-wrap">
            <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-full-mobile">
              <span>BERBUAL DENGAN PASUKAN REVO</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#packages" class="btn btn-outline btn-full-mobile">
              <span>LIHAT PILIHAN KEMPEN</span>
            </a>
          </div>

          <div class="conversion-small-text">
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
            <div class="section-tag">HUBUNGI KAMI</div>
            <h2 class="section-title">Ceritakan Sedikit Tentang Kempen Anda.</h2>
            <p class="section-subtitle">
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
                  <div class="contact-channel-label">Saluran WhatsApp Rasmi</div>
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
                  <div class="contact-channel-label">E-mel Pertanyaan Korporat</div>
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
                  <div class="contact-channel-label">Kawasan Perkhidmatan</div>
                  <div class="contact-channel-value">Kuala Lumpur & Lembah Klang, Malaysia</div>
                </div>
              </div>

              <div style="margin-top: var(--space-xs);">
                <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-full-mobile">
                  <span>WHATSAPP REVO TERUS</span>
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
                  <label for="name">Nama Penuh <span style="color:#C9A45C;">*</span></label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="cth. Encik Razak" required>
                </div>

                <!-- Company -->
                <div class="form-group">
                  <label for="company">Nama Syarikat / Jenama <span style="color:#C9A45C;">*</span></label>
                  <input type="text" id="company" name="company" class="form-control" placeholder="cth. Zenith Holdings Sdn Bhd" required>
                </div>
              </div>

              <div class="form-grid form-grid-2" style="margin-top: var(--space-md);">
                <!-- Email -->
                <div class="form-group">
                  <label for="email">Alamat E-mel Korporat <span style="color:#C9A45C;">*</span></label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="nama@syarikat.com.my" required>
                </div>

                <!-- WhatsApp Number -->
                <div class="form-group">
                  <label for="phone">Nombor WhatsApp <span style="color:#C9A45C;">*</span></label>
                  <input type="tel" id="phone" name="phone" class="form-control" placeholder="cth. 012-3456789 atau +6011..." required>
                </div>
              </div>

              <div class="form-grid form-grid-2" style="margin-top: var(--space-md);">
                <!-- Industry -->
                <div class="form-group">
                  <label for="industry">Kategori Industri <span style="color:#C9A45C;">*</span></label>
                  <select id="industry" name="industry" class="form-control" required>
                    <option value="" disabled selected>Pilih Industri Anda</option>
                    <option value="Hotels & Resorts">Hotels & Resorts</option>
                    <option value="Tourism & Travel">Tourism & Travel</option>
                    <option value="Property Development">Property Development</option>
                    <option value="Automotive">Automotive</option>
                    <option value="Banking & Finance">Banking & Finance</option>
                    <option value="Luxury Brands">Luxury Brands</option>
                    <option value="Food & Beverage">Food & Beverage</option>
                    <option value="Technology">Technology</option>
                    <option value="Corporate Companies">Corporate Companies</option>
                    <option value="Events & Experiences">Events & Experiences</option>
                    <option value="Lain-lain">Lain-lain Kategori</option>
                  </select>
                </div>

                <!-- Estimated Budget (Optional) -->
                <div class="form-group">
                  <label for="budget">Anggaran Bajet Kempen <span class="optional">(Pilihan)</span></label>
                  <select id="budget" name="budget" class="form-control">
                    <option value="Belum ditentukan / Fleksibel">Belum ditentukan / Terbuka untuk cadangan</option>
                    <option value="Bawah RM 5,000">Di bawah RM 5,000</option>
                    <option value="RM 5,000 - RM 15,000">RM 5,000 – RM 15,000</option>
                    <option value="RM 15,000 - RM 30,000">RM 15,000 – RM 30,000</option>
                    <option value="RM 30,000 ke atas">RM 30,000 ke atas</option>
                  </select>
                </div>
              </div>

              <!-- Campaign Objectives -->
              <div class="form-group" style="margin-top: var(--space-md);">
                <label for="objectives">Objektif Kempen</label>
                <input type="text" id="objectives" name="objectives" class="form-control" placeholder="cth. Pelancaran produk baharu / Bina kesedaran jenama di KL">
              </div>

              <!-- Message -->
              <div class="form-group" style="margin-top: var(--space-md);">
                <label for="message">Mesej / Keperluan Tambahan</label>
                <textarea id="message" name="message" class="form-control" placeholder="Kongsikan sebarang perincian kempen atau pertanyaan yang ingin anda bincangkan..."></textarea>
              </div>

              <div style="margin-top: var(--space-lg); display: flex; flex-direction: column; gap: var(--space-sm);">
                <button type="submit" id="submitBtn" class="btn btn-primary btn-full-mobile">
                  <span>HANTAR PERTANYAAN</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
                <div class="microcopy" style="justify-content: center;">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                  <span>Maklumat anda dilindungi dan hanya digunakan untuk tujuan perbincangan kempen rasmi.</span>
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
  <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="floating-whatsapp" aria-label="Berbual dengan Pasukan REVO di WhatsApp">
    <span class="floating-wa-badge">Bincang Kempen di WhatsApp</span>
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
          <p style="font-size: 0.85rem; color: var(--c-silver);">
            Premium Mobile Advertising | Brand Visibility | Business Opportunities.<br>
            Menyediakan medium komunikasi digital eksklusif di dalam kenderaan Toyota Alphard & Vellfire di Malaysia.
          </p>
        </div>

        <!-- Quick Links -->
        <div>
          <div class="footer-col-title">Navigasi Utama</div>
          <ul class="footer-links-list">
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About REVO</a></li>
            <li><a href="#network">Our Network</a></li>
            <li><a href="#solutions">Advertising Solutions</a></li>
            <li><a href="#industries">Industries We Serve</a></li>
            <li><a href="#packages">Campaign Packages</a></li>
            <li><a href="#contact">Contact & Enquiry</a></li>
            <li><a href="admin/login.php" style="color: rgba(201,164,92,0.6);">Admin Portal</a></li>
          </ul>
        </div>

        <!-- Contacts -->
        <div>
          <div class="footer-col-title">Hubungi Kami</div>
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
              <strong style="color: var(--c-ivory);">Pasaran:</strong><br>
              <span>Kuala Lumpur & Lembah Klang, Malaysia</span>
            </li>
            <li style="margin-top: 6px;">
              <strong style="color: var(--c-ivory);">Domain:</strong><br>
              <span><?= e(BRAND_DOMAIN) ?></span>
            </li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <div>
          &copy; 2026 <?= e(BRAND_NAME) ?>. Hak cipta terpelihara.
        </div>
        <div style="display: flex; gap: var(--space-md);">
          <a href="#faq" class="btn-text-link" style="font-size: 0.775rem;">Soalan Lazim (FAQ)</a>
          <span style="color: var(--c-silver-dark);">|</span>
          <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn-text-link" style="font-size: 0.775rem;">Sembang WhatsApp</a>
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
        <h3 class="modal-title" id="modalTitle">Spesifikasi Format Iklan</h3>
        <button type="button" class="modal-close-btn" aria-label="Tutup Tetingkap">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>
      <div class="modal-body" id="modalBody">
        <!-- Injected via JavaScript -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline btn-sm" id="modalCloseFooter">Tutup</button>
        <a href="<?= e($defaultWaUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" id="modalWaBtn">
          <span>Bincang Format Ini di WhatsApp</span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="assets/js/main.js"></script>
</body>
</html>
