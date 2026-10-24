/**
 * REVO LUX MEDIA — Frontend Interactions
 * Mobile-First UX, Accessible Controls, Modal Specs & AJAX Form Handling
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  // 1. Sticky Header Effect
  const header = document.querySelector('.revo-header');
  const handleScroll = () => {
    if (window.scrollY > 30) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }
  };
  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  // 2. Mobile Menu Navigation
  const hamburgerBtn = document.querySelector('.hamburger-btn');
  const mobileNavPanel = document.querySelector('.mobile-nav-panel');
  const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

  const toggleMobileMenu = (open) => {
    const shouldOpen = open !== undefined ? open : !mobileNavPanel.classList.contains('open');
    if (shouldOpen) {
      hamburgerBtn?.classList.add('active');
      mobileNavPanel?.classList.add('open');
      document.body.style.overflow = 'hidden';
      hamburgerBtn?.setAttribute('aria-expanded', 'true');
    } else {
      hamburgerBtn?.classList.remove('active');
      mobileNavPanel?.classList.remove('open');
      document.body.style.overflow = '';
      hamburgerBtn?.setAttribute('aria-expanded', 'false');
    }
  };

  hamburgerBtn?.addEventListener('click', () => toggleMobileMenu());

  mobileNavLinks.forEach(link => {
    link.addEventListener('click', () => toggleMobileMenu(false));
  });

  // Close mobile menu on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && mobileNavPanel?.classList.contains('open')) {
      toggleMobileMenu(false);
    }
  });

  // 3. FAQ Accordion
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const headerBtn = item.querySelector('.faq-header');
    const body = item.querySelector('.faq-body');

    headerBtn?.addEventListener('click', () => {
      const isActive = item.classList.contains('active');

      // Close all other FAQ items for clean minimalist accordion
      faqItems.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
          const otherBody = otherItem.querySelector('.faq-body');
          const otherBtn = otherItem.querySelector('.faq-header');
          if (otherBody) otherBody.style.maxHeight = null;
          otherBtn?.setAttribute('aria-expanded', 'false');
        }
      });

      if (isActive) {
        item.classList.remove('active');
        body.style.maxHeight = null;
        headerBtn.setAttribute('aria-expanded', 'false');
      } else {
        item.classList.add('active');
        body.style.maxHeight = body.scrollHeight + 'px';
        headerBtn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  // 4. Advertising Solutions Modal Specifications Data
  const solutionSpecs = {
    'video': {
      title: 'In-Car Video Advertising',
      tagline: 'Paparan video promosi melalui skrin digital Alphard & Vellfire',
      content: `
        <p><strong>Pendedahan Visual Sinematik Dalam Perjalanan VIP:</strong></p>
        <p>Format video membolehkan jenama anda menyampaikan naratif yang lebih dinamik kepada penumpang eksekutif. Semasa perjalanan santai atau urusan perniagaan, penumpang menikmati tontonan berkualiti tinggi tanpa gangguan iklan yang bising.</p>
        <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
          <li><strong>Format Fail:</strong> MP4 (H.264 / AAC Audio).</li>
          <li><strong>Nisbah Aspek:</strong> 16:9 Landskap Beresolusi Penuh (1080p).</li>
          <li><strong>Cadangan Tempoh Slot:</strong> 15 saat atau 30 saat bagi setiap pusingan loop.</li>
          <li><strong>Frekuensi Penyiaran:</strong> Pengulangan berkala sepanjang tempoh perjalanan kenderaan.</li>
          <li><strong>Audio:</strong> Boleh diselaraskan mengikut keselesaan suasana kabin VIP (audio halus atau kapsyen teks visual).</li>
        </ul>
        <p style="font-size: 0.8rem; color: #E8C98F;">*Tertakluk kepada ketersediaan spesifikasi peralatan paparan pada armada kenderaan yang disahkan.</p>
      `,
      waText: 'Salam REVO, saya berminat ingin mengetahui lebih lanjut tentang format In-Car Video Advertising.'
    },
    'image': {
      title: 'Digital Image Advertising',
      tagline: 'Ketengahkan produk, visual jenama dan tawaran promosi beresolusi tinggi',
      content: `
        <p><strong>Kejelasan Mesej & Pendedahan Jenama Yang Bersih:</strong></p>
        <p>Sesuai untuk memperkenalkan produk terbaharu, promosi eksklusif atau pengukuhan identiti jenama dengan grafik estetik berdefinisi tinggi.</p>
        <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
          <li><strong>Format Fail:</strong> JPG / PNG berdefinisi tinggi (RGB).</li>
          <li><strong>Nisbah Aspek:</strong> 1920 x 1080 px (16:9).</li>
          <li><strong>Kesesuaian:</strong> Paparan visual statik berputar (carousel showcase) dengan masa tatapan optimum.</li>
          <li><strong>Tip Kreatif:</strong> Reka bentuk ringkas, berfokus kepada visual produk utama dan pesanan yang mudah dihadam.</li>
        </ul>
      `,
      waText: 'Salam REVO, saya berminat dengan format Digital Image Advertising untuk kempen jenama kami.'
    },
    'awareness': {
      title: 'Brand Awareness Campaigns',
      tagline: 'Terokai peluang memperkenalkan jenama melalui medium mobiliti premium',
      content: `
        <p><strong>Menjangkau Khalifah Sasaran Dalam Persekitaran Relevan:</strong></p>
        <p>Pengiklanan luar talian konvensional sering bersaing dengan kesesakan visual jalan raya. REVO menawarkan persekitaran dalaman yang tenang, membolehkan jenama anda mendapat perhatian fokus daripada penumpang sasaran.</p>
        <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
          <li><strong>Sasaran Khalayak:</strong> Golongan eksekutif, ahli perniagaan, pelancong antarabangsa, dan keluarga berkemampuan tinggi.</li>
          <li><strong>Kelebihan:</strong> Pendedahan jenama yang konsisten tanpa persaingan visual yang berlebihan.</li>
          <li><strong>Pilihan Pelaksanaan:</strong> Pakej berfasa mengikut tarikh pelancaran atau musim pemasaran tertentu.</li>
        </ul>
      `,
      waText: 'Salam REVO, saya ingin berbincang mengenai Brand Awareness Campaign melalui rangkaian mobiliti anda.'
    },
    'qr': {
      title: 'QR Code Advertising',
      tagline: 'Hubungkan kandungan iklan dengan laman web, katalog atau tawaran segera',
      content: `
        <p><strong>Langkah Mudah Dari Paparan Skrin Terus Ke Telefon Penumpang:</strong></p>
        <p>Gabungkan visual iklan anda dengan kod QR pintar yang mudah diimbas oleh penumpang dari tempat duduk kapten.</p>
        <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
          <li><strong>Destinasi Imbasan:</strong> Halaman pendaratan (landing page), laman e-dagang, pautan WhatsApp, atau muat turun katalog digital.</li>
          <li><strong>Pengesanan Prestasi:</strong> Kod QR boleh menggunakan parameter penjejakan URL (UTM parameters) untuk mengukur keberkesanan minat penumpang.</li>
          <li><strong>Pengalaman Pengguna:</strong> Penumpang mempunyai masa lapang sepanjang perjalanan untuk mengimbas dan meneroka tawaran anda.</li>
        </ul>
      `,
      waText: 'Salam REVO, boleh kongsikan maklumat tentang pelaksanaan QR Code Advertising dalam kenderaan?'
    },
    'promotions': {
      title: 'Product & Service Promotions',
      tagline: 'Perkenalkan tawaran baharu, pakej istimewa dan perkhidmatan korporat',
      content: `
        <p><strong>Pengumuman Tepat Pada Masanya Untuk Keputusan Pemasaran:</strong></p>
        <p>Sangat ideal untuk perniagaan hospitaliti, pelancongan, pelaburan hartanah, sektor kewangan, dan produk gaya hidup mewah.</p>
        <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
          <li><strong>Fleksibiliti Mesej:</strong> Kemaskini visual promosi mengikut kempen bermusim (contohnya promosi musim cuti, pelancaran produk baharu, atau jemputan majlis eksklusif).</li>
          <li><strong>Penyesuaian Mesej:</strong> Nada komunikasi santun yang menghormati privasi dan keselesaan penumpang.</li>
        </ul>
      `,
      waText: 'Salam REVO, kami mempunyai promosi produk/perkhidmatan baharu dan ingin membincangkan slot pengiklanan.'
    },
    'custom': {
      title: 'Custom Campaigns',
      tagline: 'Bincangkan pendekatan pengiklanan berdasarkan objektif dan keperluan khusus anda',
      content: `
        <p><strong>Penyelesaian Kempen Yang Disesuaikan Sepenuhnya:</strong></p>
        <p>Adakah anda menganjurkan persidangan korporat besar, pelancaran antarabangsa, atau memerlukan liputan mobiliti khusus untuk delegasi VIP?</p>
        <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
          <li><strong>Perancangan Strategik:</strong> Kami membantu menstrukturkan kandungan, format paparan dan cadangan penyelarasan waktu kempen.</li>
          <li><strong>Liputan Bersasar:</strong> Perbincangan mengenai pengkhususan laluan mobiliti atau acara berskala tertentu.</li>
          <li><strong>Perundingan Rakan Kongsi:</strong> Sesi perbincangan awal percuma tanpa sebarang komitmen jualan paksaan.</li>
        </ul>
      `,
      waText: 'Salam REVO, saya memerlukan cadangan Custom Campaign khusus untuk perniagaan kami.'
    },
    'splitscreen': {
      title: 'Split Screen (Dual Content)',
      tagline: 'Paparan dwiformat serentak untuk impak penyampaian mesej yang lebih menyeluruh',
      content: `
        <p><strong>Dua Mesej Dalam Satu Paparan Skrin Dinamik:</strong></p>
        <p>Format Split Screen membolehkan paparan video bergerak di satu sisi (contohnya video penjenamaan / demonstrasi produk) digandingkan serentak dengan imej statik atau tawaran kod QR di sisi yang lain.</p>
        <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
          <li><strong>Struktur Visual:</strong> Gabungan video dinamik dan grafik statik serentak.</li>
          <li><strong>Peluang Interaksi:</strong> Penumpang boleh menonton video sambil mengimbas kod promosi tanpa perlu menunggu video selesai.</li>
          <li><strong>Kesesuaian:</strong> Sangat berkesan untuk pelancaran produk baharu, pendaftaran acara korporat, atau kempen jualan terus.</li>
        </ul>
      `,
      waText: 'Salam REVO, saya berminat dengan format Split Screen (Dual Content) untuk kempen jenama kami.'
    },
    'rotation': {
      title: 'Content Rotation (Smart Scheduling)',
      tagline: 'Penjadualan putaran pintar mengikut waktu puncak, laluan dan profil perjalanan',
      content: `
        <p><strong>Kandungan Dinamik Mengikut Konteks Perjalanan VIP:</strong></p>
        <p>Format ini membolehkan kempen jenama anda dipaparkan mengikut algoritma giliran yang dioptimumkan — memastikan penonton sentiasa melihat kandungan yang segar dan bersesuaian dengan waktu dan zon perjalanan.</p>
        <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
          <li><strong>Pelbagai Variasi Kreatif:</strong> Boleh memuatkan beberapa versi iklan dalam satu kempen untuk mengelakkan keletihan audiens.</li>
          <li><strong>Penjadualan Pintar:</strong> Penyesuaian mesej antara perjalanan pagi korporat dan perjalanan santai petang/malam.</li>
          <li><strong>Laporan Keterlihatan:</strong> Pengesahan kekerapan siaran secara berkala untuk ketelusan prestasi kempen.</li>
        </ul>
      `,
      waText: 'Salam REVO, saya ingin mengetahui lebih lanjut mengenai pilihan Content Rotation (Smart Scheduling).'
    }
  };

  // Modal Dialog Handlers
  const modalOverlay = document.querySelector('.revo-modal-overlay');
  const modalTitle = document.querySelector('#modalTitle');
  const modalBody = document.querySelector('#modalBody');
  const modalWaBtn = document.querySelector('#modalWaBtn');
  const modalCloseBtn = document.querySelector('.modal-close-btn');
  const modalCloseFooterBtn = document.querySelector('#modalCloseFooter');
  let activeModalKey = null;

  const openSolutionModal = (solutionKey) => {
    activeModalKey = solutionKey;
    const data = (window.RevoI18n && window.RevoI18n.getModalSpec)
      ? window.RevoI18n.getModalSpec(solutionKey)
      : (solutionSpecs[solutionKey] || null);

    if (!data || !modalOverlay) return;

    modalTitle.textContent = data.title;
    modalBody.innerHTML = `
      <div style="font-size: 0.825rem; font-weight: 700; color: #C9A45C; text-transform: uppercase; margin-bottom: 8px;">${data.tagline}</div>
      ${data.content}
    `;

    const cleanNumber = '601111886654';
    modalWaBtn.href = `https://wa.me/${cleanNumber}?text=${encodeURIComponent(data.waText)}`;

    modalOverlay.classList.add('open');
    modalOverlay.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  };

  // Re-render modal if open when language changes
  window.addEventListener('revo:langchange', () => {
    if (modalOverlay && modalOverlay.classList.contains('open') && activeModalKey) {
      openSolutionModal(activeModalKey);
    }
  });

  const closeModal = () => {
    if (!modalOverlay) return;
    modalOverlay.classList.remove('open');
    modalOverlay.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };

  document.querySelectorAll('[data-solution-modal]').forEach(trigger => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const key = trigger.getAttribute('data-solution-modal');
      openSolutionModal(key);
    });
  });

  modalCloseBtn?.addEventListener('click', closeModal);
  modalCloseFooterBtn?.addEventListener('click', closeModal);
  modalOverlay?.addEventListener('click', (e) => {
    if (e.target === modalOverlay) closeModal();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modalOverlay?.classList.contains('open')) {
      closeModal();
    }
  });

  // 5. Contact Form Submission with AJAX & Feedback
  const contactForm = document.getElementById('revoContactForm');
  const formFeedback = document.getElementById('formFeedback');
  const submitBtn = document.getElementById('submitBtn');

  if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      if (!formFeedback || !submitBtn) return;

      // Reset feedback state
      formFeedback.className = 'form-feedback';
      formFeedback.style.display = 'none';
      formFeedback.textContent = '';

      // Set Loading State
      const originalBtnText = submitBtn.innerHTML;
      const submittingText = (window.RevoI18n ? window.RevoI18n.t('form_submitting', 'Menghantar...') : 'Menghantar...');
      submitBtn.disabled = true;
      submitBtn.innerHTML = `
        <svg style="animation: spin 1s linear infinite; width: 18px; height: 18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
          <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"></path>
        </svg>
        <span>${submittingText}</span>
      `;

      try {
        const formData = new FormData(contactForm);
        const response = await fetch('submit_enquiry.php', {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          }
        });

        if (response.ok) {
          const data = await response.json();
          if (data.success) {
            const successTitle = (window.RevoI18n ? window.RevoI18n.t('form_success_title', 'Permintaan Berjaya Dihantar!') : 'Permintaan Berjaya Dihantar!');
            const waBtnText = (window.RevoI18n ? window.RevoI18n.t('form_success_wa_btn', 'Teruskan Berbual di WhatsApp') : 'Teruskan Berbual di WhatsApp');
            formFeedback.className = 'form-feedback success';
            formFeedback.innerHTML = `
              <strong>${successTitle}</strong><br>
              ${data.message}<br><br>
              <a href="${data.wa_url}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="margin-top: 8px;">
                ${waBtnText}
              </a>
            `;
            contactForm.reset();

            // Update CSRF token for next submission
            if (data.new_csrf) {
              const csrfInput = contactForm.querySelector('input[name="csrf_token"]');
              if (csrfInput) csrfInput.value = data.new_csrf;
            }

            // Optional: automatically redirect to WhatsApp after 2 seconds
            if (data.wa_url) {
              setTimeout(() => {
                window.open(data.wa_url, '_blank');
              }, 1800);
            }
            return;
          } else {
            const errPrefix = (window.RevoI18n ? window.RevoI18n.t('form_err_prefix', 'Ralat:') : 'Ralat:');
            formFeedback.className = 'form-feedback error';
            formFeedback.innerHTML = `<strong>${errPrefix}</strong> ${data.message || 'Sila semak maklumat yang dimasukkan dan cuba lagi.'}`;
            return;
          }
        }
        throw new Error('Static host or server error');
      } catch (err) {
        // Fallback for static environments (GitHub Pages): open WhatsApp directly with prefilled parameters
        const isIndonesian = (window.RevoI18n && window.RevoI18n.getLanguage() === 'id');
        const name = contactForm.querySelector('[name="name"]')?.value || '';
        const company = contactForm.querySelector('[name="company"]')?.value || '';
        const phone = contactForm.querySelector('[name="phone"]')?.value || '';
        const industry = contactForm.querySelector('[name="industry"]')?.value || '';
        const budget = contactForm.querySelector('[name="budget"]')?.value || '';
        const objectives = contactForm.querySelector('[name="objectives"]')?.value || '';
        const userMsg = contactForm.querySelector('[name="message"]')?.value || '';

        const lines = [
          isIndonesian ? 'Halo REVO LUX MEDIA,' : 'Salam REVO LUX MEDIA,',
          isIndonesian ? 'Saya berminat membuat pemesanan/pertanyaan periklanan Alphard & Vellfire:' : 'Saya berminat membuat tempahan/pertanyaan pengiklanan Alphard & Vellfire:',
          `- ${isIndonesian ? 'Nama' : 'Nama'}: ${name}`,
          `- ${isIndonesian ? 'Perusahaan' : 'Syarikat'}: ${company || '-'}`,
          `- ${isIndonesian ? 'Telepon' : 'Telefon'}: ${phone}`,
          `- ${isIndonesian ? 'Industri' : 'Industri'}: ${industry || '-'}`,
          `- ${isIndonesian ? 'Perkiraan Anggaran' : 'Anggaran Bajet'}: ${budget || '-'}`,
          `- ${isIndonesian ? 'Tujuan' : 'Objektif'}: ${objectives || '-'}`
        ];
        if (userMsg) lines.push(`- ${isIndonesian ? 'Pesan Tambahan' : 'Mesej Tambahan'}: ${userMsg}`);

        const fallbackWaUrl = 'https://wa.me/601111886654?text=' + encodeURIComponent(lines.join('\n'));

        const fallbackTitle = isIndonesian ? 'Pertanyaan Telah Dirumuskan!' : 'Pertanyaan Telah Dirumuskan!';
        const fallbackSub = isIndonesian ? 'Menyambungkan Anda langsung ke konsultan media REVO di WhatsApp...' : 'Menyambungkan anda terus ke perunding media REVO di WhatsApp...';
        const fallbackBtn = isIndonesian ? 'Buka WhatsApp Sekarang' : 'Buka WhatsApp Sekarang';

        formFeedback.className = 'form-feedback success';
        formFeedback.innerHTML = `
          <strong>${fallbackTitle}</strong><br>
          ${fallbackSub}<br><br>
          <a href="${fallbackWaUrl}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="margin-top: 8px;">
            ${fallbackBtn}
          </a>
        `;
        setTimeout(() => {
          window.open(fallbackWaUrl, '_blank');
        }, 1200);
      } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
        formFeedback.style.display = 'block';
        formFeedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }
    });
  }

  // ========================================================================
  // 6. INTERACTIVE EXPERIENCE SHOWCASE & INLINE VIDEO CONTROLLER
  // ========================================================================
  // A. Mode Tabs (Perjalanan 4 Langkah vs Infografik Rasmi)
  const expModeBtns = document.querySelectorAll('.exp-mode-btn');
  const expJourneyPanel = document.getElementById('expJourneyPanel');
  const expPostersPanel = document.getElementById('expPostersPanel');

  const switchExpMode = (mode) => {
    expModeBtns.forEach(btn => {
      btn.classList.toggle('active', btn.getAttribute('data-exp-mode') === mode);
    });
    if (mode === 'posters') {
      expJourneyPanel?.classList.remove('active');
      expPostersPanel?.classList.add('active');
      if (theaterVideo && !theaterVideo.paused) {
        theaterVideo.pause();
      }
    } else {
      expPostersPanel?.classList.remove('active');
      expJourneyPanel?.classList.add('active');
    }
  };

  expModeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const mode = btn.getAttribute('data-exp-mode') || 'journey';
      switchExpMode(mode);
    });
  });

  // B. Cinema Theater Console & Step Cards
  const theaterVideo = document.getElementById('theaterVideo');
  const theaterScreenBox = document.getElementById('theaterScreenBox');
  const theaterPlayOverlay = document.getElementById('theaterPlayOverlay');
  const theaterStepBadge = document.getElementById('theaterStepBadge');
  const theaterTitle = document.getElementById('theaterTitle');
  const theaterMetric = document.getElementById('theaterMetric');
  const stepCards = document.querySelectorAll('.exp-step-card');

  const playTheaterVideo = () => {
    if (!theaterVideo) return;
    theaterVideo.controls = true;
    const playPromise = theaterVideo.play();
    if (playPromise !== undefined) {
      playPromise.then(() => {
        theaterPlayOverlay?.classList.add('playing');
      }).catch(() => {
        theaterVideo.controls = true;
      });
    }
  };

  const selectStep = (card, autoPlay = false) => {
    if (!card) return;
    stepCards.forEach(c => c.classList.remove('active'));
    card.classList.add('active');

    const videoSrc = card.getAttribute('data-video');
    const badgeKey = card.getAttribute('data-badge-key');
    const titleKey = card.getAttribute('data-title-key');
    const metricKey = card.getAttribute('data-metric-key');

    if (theaterVideo && videoSrc) {
      theaterVideo.pause();
      theaterVideo.controls = false;
      theaterVideo.src = videoSrc + '#t=1';
      theaterVideo.load();
      theaterPlayOverlay?.classList.remove('playing');
    }

    if (theaterStepBadge && badgeKey) {
      theaterStepBadge.setAttribute('data-i18n', badgeKey);
      theaterStepBadge.textContent = window.RevoI18n ? window.RevoI18n.t(badgeKey) : (card.querySelector('.exp-step-nav-tag')?.textContent || '');
    }
    if (theaterTitle && titleKey) {
      theaterTitle.setAttribute('data-i18n', titleKey);
      theaterTitle.textContent = window.RevoI18n ? window.RevoI18n.t(titleKey) : (card.querySelector('.exp-step-card-title')?.textContent || '');
    }
    if (theaterMetric && metricKey) {
      theaterMetric.setAttribute('data-i18n', metricKey);
      theaterMetric.textContent = window.RevoI18n ? window.RevoI18n.t(metricKey) : (card.querySelector('.exp-metric-pill')?.textContent || '');
    }

    if (autoPlay) {
      playTheaterVideo();
    }
  };

  theaterPlayOverlay?.addEventListener('click', (e) => {
    e.stopPropagation();
    playTheaterVideo();
  });

  theaterVideo?.addEventListener('play', () => {
    theaterPlayOverlay?.classList.add('playing');
    theaterVideo.controls = true;
  });

  theaterVideo?.addEventListener('pause', () => {
    if (theaterVideo.ended) {
      theaterPlayOverlay?.classList.remove('playing');
      theaterVideo.controls = false;
    }
  });

  theaterVideo?.addEventListener('ended', () => {
    theaterPlayOverlay?.classList.remove('playing');
    theaterVideo.controls = false;
  });

  stepCards.forEach(card => {
    card.addEventListener('click', () => {
      selectStep(card, false);
    });
  });

  // Re-sync active step translations on language switch
  window.addEventListener('revo:langchange', () => {
    const activeCard = document.querySelector('.exp-step-card.active');
    if (activeCard) {
      const badgeKey = activeCard.getAttribute('data-badge-key');
      const titleKey = activeCard.getAttribute('data-title-key');
      const metricKey = activeCard.getAttribute('data-metric-key');
      if (theaterStepBadge && badgeKey && window.RevoI18n) {
        theaterStepBadge.textContent = window.RevoI18n.t(badgeKey);
      }
      if (theaterTitle && titleKey && window.RevoI18n) {
        theaterTitle.textContent = window.RevoI18n.t(titleKey);
      }
      if (theaterMetric && metricKey && window.RevoI18n) {
        theaterMetric.textContent = window.RevoI18n.t(metricKey);
      }
    }
  });

  // C. Hero Video Watch Button (Plays inline directly in experience section)
  const heroWatchBtn = document.getElementById('heroWatchVideoBtn');
  heroWatchBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    const expSection = document.getElementById('experience');
    if (expSection) {
      expSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
      switchExpMode('journey');
      const firstStep = document.querySelector('.exp-step-card[data-step="1"]');
      if (firstStep) {
        selectStep(firstStep, true);
      }
    }
  });

  // D. Solutions Tablet Live Play (Plays Directly Inline inside tablet frame)
  const solutionsPlayBtn = document.getElementById('solutionsPlayBtn');
  const solutionsTabletFrame = document.getElementById('solutionsTabletFrame');
  const solutionsTabletVideo = document.getElementById('solutionsTabletVideo');
  const solutionsTabletOverlay = document.getElementById('solutionsTabletOverlay');

  const toggleSolutionsVideo = () => {
    if (!solutionsTabletVideo) return;
    if (solutionsTabletVideo.paused) {
      solutionsTabletVideo.controls = true;
      const playPromise = solutionsTabletVideo.play();
      if (playPromise !== undefined) {
        playPromise.then(() => {
          solutionsTabletOverlay?.classList.add('playing');
        }).catch(() => {
          solutionsTabletVideo.muted = true;
          solutionsTabletVideo.play();
          solutionsTabletOverlay?.classList.add('playing');
        });
      }
    } else {
      solutionsTabletVideo.pause();
      solutionsTabletOverlay?.classList.remove('playing');
    }
  };

  solutionsPlayBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    toggleSolutionsVideo();
  });

  solutionsTabletFrame?.addEventListener('click', (e) => {
    if (e.target !== solutionsTabletVideo || !solutionsTabletVideo.controls) {
      toggleSolutionsVideo();
    }
  });

  solutionsTabletVideo?.addEventListener('play', () => {
    solutionsTabletOverlay?.classList.add('playing');
  });

  solutionsTabletVideo?.addEventListener('pause', () => {
    if (solutionsTabletVideo.ended) {
      solutionsTabletOverlay?.classList.remove('playing');
    }
  });

  const solutionsViewInfographicBtn = document.getElementById('solutionsViewInfographicBtn');
  solutionsViewInfographicBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    const expSection = document.getElementById('experience');
    if (expSection) {
      expSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
      switchExpMode('posters');
    }
  });

  // E. Image Lightbox (Used exclusively for zooming HD Rate Cards & infographics, ZERO video popups)
  const lightboxModal = document.getElementById('mediaLightboxModal');
  const lightboxTitle = document.getElementById('lightboxTitle');
  const lightboxBody = document.getElementById('lightboxBody');
  const lightboxDesc = document.getElementById('lightboxDesc');
  const lightboxCloseBtn = document.getElementById('lightboxCloseBtn');

  const openImageLightbox = (src, title, desc) => {
    if (!lightboxModal || !lightboxBody) return;
    lightboxTitle.textContent = title || 'Visual Dokumen REVO';
    lightboxDesc.textContent = desc || '';
    lightboxBody.innerHTML = `
      <img src="${src}" alt="${title || 'Dokumen REVO'}" style="max-width:100%; max-height:calc(90vh - 120px); object-fit:contain; border-radius:8px;">
    `;
    lightboxModal.classList.add('active');
    lightboxModal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  };

  const closeLightbox = () => {
    if (!lightboxModal) return;
    lightboxModal.classList.remove('active');
    lightboxModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    if (lightboxBody) lightboxBody.innerHTML = '';
  };

  document.addEventListener('click', (e) => {
    const trigger = e.target.closest('[data-lightbox-image]');
    if (trigger) {
      e.preventDefault();
      const imgSrc = trigger.getAttribute('data-lightbox-image');
      const title = trigger.getAttribute('data-lightbox-title') || trigger.getAttribute('title') || '';
      const desc = trigger.getAttribute('data-lightbox-desc') || '';
      if (imgSrc) {
        openImageLightbox(imgSrc, title, desc);
      }
    }
  });

  lightboxCloseBtn?.addEventListener('click', closeLightbox);
  lightboxModal?.addEventListener('click', (e) => {
    if (e.target === lightboxModal) closeLightbox();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && lightboxModal?.classList.contains('active')) {
      closeLightbox();
    }
  });

  // Smooth inline scroll helper for buttons
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId && targetId !== '#') {
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          e.preventDefault();
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    });
  });
});
