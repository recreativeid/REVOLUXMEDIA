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
    }
  };

  // Modal Dialog Handlers
  const modalOverlay = document.querySelector('.revo-modal-overlay');
  const modalTitle = document.querySelector('#modalTitle');
  const modalBody = document.querySelector('#modalBody');
  const modalWaBtn = document.querySelector('#modalWaBtn');
  const modalCloseBtn = document.querySelector('.modal-close-btn');
  const modalCloseFooterBtn = document.querySelector('#modalCloseFooter');

  const openSolutionModal = (solutionKey) => {
    const data = solutionSpecs[solutionKey];
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
      submitBtn.disabled = true;
      submitBtn.innerHTML = `
        <svg style="animation: spin 1s linear infinite; width: 18px; height: 18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
          <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"></path>
        </svg>
        <span>Menghantar...</span>
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
            formFeedback.className = 'form-feedback success';
            formFeedback.innerHTML = `
              <strong>Permintaan Berjaya Dihantar!</strong><br>
              ${data.message}<br><br>
              <a href="${data.wa_url}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="margin-top: 8px;">
                Teruskan Berbual di WhatsApp
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
            formFeedback.className = 'form-feedback error';
            formFeedback.innerHTML = `<strong>Ralat:</strong> ${data.message || 'Sila semak maklumat yang dimasukkan dan cuba lagi.'}`;
            return;
          }
        }
        throw new Error('Static host or server error');
      } catch (err) {
        // Fallback for static environments (GitHub Pages): open WhatsApp directly with prefilled parameters
        const name = contactForm.querySelector('[name="name"]')?.value || '';
        const company = contactForm.querySelector('[name="company"]')?.value || '';
        const phone = contactForm.querySelector('[name="phone"]')?.value || '';
        const industry = contactForm.querySelector('[name="industry"]')?.value || '';
        const budget = contactForm.querySelector('[name="budget"]')?.value || '';
        const objectives = contactForm.querySelector('[name="objectives"]')?.value || '';
        const userMsg = contactForm.querySelector('[name="message"]')?.value || '';

        const lines = [
          'Salam REVO LUX MEDIA,',
          'Saya berminat membuat tempahan/pertanyaan pengiklanan Alphard & Vellfire:',
          `- Nama: ${name}`,
          `- Syarikat: ${company || '-'}`,
          `- Telefon: ${phone}`,
          `- Industri: ${industry || '-'}`,
          `- Anggaran Bajet: ${budget || '-'}`,
          `- Objektif: ${objectives || '-'}`
        ];
        if (userMsg) lines.push(`- Mesej Tambahan: ${userMsg}`);

        const fallbackWaUrl = 'https://wa.me/601111886654?text=' + encodeURIComponent(lines.join('\n'));

        formFeedback.className = 'form-feedback success';
        formFeedback.innerHTML = `
          <strong>Pertanyaan Telah Dirumuskan!</strong><br>
          Menyambungkan anda terus ke perunding media REVO di WhatsApp...<br><br>
          <a href="${fallbackWaUrl}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="margin-top: 8px;">
            Buka WhatsApp Sekarang
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
