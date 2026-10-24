/**
 * REVO LUX MEDIA — Internationalization (i18n) Engine
 * Language switcher: Bahasa Malaysia (ms) & Bahasa Indonesia (id)
 * Features: Instant zero-flicker client-side switching, localStorage + cookie persistence,
 * complete UI translation, modal specs updates, and form feedback localization.
 */

(function () {
  'use strict';

  const translations = {
    ms: {
      // Document Metadata
      page_title: 'REVO LUX MEDIA | In-Car Advertising Toyota Alphard & Vellfire Malaysia',
      meta_desc: 'Rangkaian media pengiklanan mudah alih premium dalam Toyota Alphard & Vellfire di Kuala Lumpur & Lembah Klang. Paparkan video & imej digital jenama anda kepada penumpang eksekutif.',
      og_desc: 'Iklankan jenama anda dalam Toyota Alphard & Vellfire di sekitar Kuala Lumpur. Hubungkan jenama dengan penumpang eksekutif melalui paparan skrin digital.',

      // Navigation
      nav_home: 'Home',
      nav_about: 'About',
      nav_advantage: 'Advantage',
      nav_touchpoints: 'Touchpoints',
      nav_solutions: 'Solutions',
      nav_network: 'Our Network',
      nav_industries: 'Industries',
      nav_packages: 'Packages',
      nav_faq: 'FAQ',
      nav_contact: 'Contact',
      nav_enquire_btn: 'ENQUIRE NOW',
      nav_enquire_mobile: 'ENQUIRE NOW VIA WHATSAPP',
      mobile_lang_title: 'PILIHAN BAHASA',

      // Hero Section
      hero_badge_text: '50 LUXURY VEHICLES • KL & KLIA',
      hero_headline_my: 'IKLANKAN JENAMA ANDA DALAM ALPHARD & VELLFIRE.',
      hero_desc: 'Rangkaian pengiklanan mudah alih premium dalam armada Toyota Alphard & Vellfire untuk menghubungkan jenama anda terus kepada audiens eksekutif di Lembah Klang dan koridor KLIA.',
      hero_cta_wa: 'BINCANGKAN KEMPEN ANDA',
      hero_cta_explore: 'TEROKAI CARA IA BERFUNGSI',
      hero_microcopy: 'Pakej dan pilihan kempen boleh dibincangkan mengikut keperluan perniagaan.',

      // Value Strip
      val_strip_title: 'Lebih Daripada Sekadar Ruang Pengiklanan.',
      val_card1_title: 'PREMIUM MOBILITY',
      val_card1_desc: 'Pengiklanan dalam persekitaran kenderaan premium Toyota Alphard & Vellfire.',
      val_card2_title: 'DISTINCTIVE BRAND PRESENCE',
      val_card2_desc: 'Satu lagi cara tersendiri untuk memperkenalkan jenama anda kepada sasaran berimpak.',
      val_card3_title: 'FLEXIBLE CAMPAIGN OPTIONS',
      val_card3_desc: 'Pilihan kempen dan format paparan yang boleh dibincangkan mengikut keperluan perniagaan.',

      // About REVO
      about_badge_text: 'PENGALAMAN KABIN VIP ALPHARD',
      about_tag: 'MENGENAI REVO',
      about_title: 'Membawa Pengiklanan Lebih Dekat Kepada Pengalaman Perjalanan.',
      about_lead: 'REVO Premium Mobile Media Network dibangunkan dengan idea bahawa peluang memperkenalkan jenama tidak semestinya terhad kepada saluran pengiklanan konvensional.',
      about_p1: 'Melalui konsep pengiklanan mudah alih yang memanfaatkan kenderaan premium, REVO berhasrat membantu perniagaan meneroka cara berbeza untuk menyampaikan mesej, mempromosikan produk dan membina kesedaran jenama.',
      about_p2: 'Setiap kempen boleh dibincangkan berdasarkan objektif pemasaran, jenis kandungan dan pilihan liputan yang tersedia.',
      about_cta: 'KENALI PENDEKATAN REVO',

      // Advantage / Better Than Billboards
      adv_tag: 'LEBIH DARIPADA BILLBOARD BIASA',
      adv_title: 'Better Than Billboards. More Than Just An Ad.',
      adv_subtitle: 'REVO membawa mesej jenama anda terus ke dalam ruang eksklusif penumpangnya — kabin Toyota Alphard & Vellfire yang tenang, selesa dan bebas daripada sebarang gangguan.',
      adv_stat_label: 'PROSPEK',
      adv_stat_sub: 'MINIMA SETIAP HARI',
      adv_stat_copy: '<strong>Pendedahan Berterusan &amp; Konsisten:</strong> Dengan gabungan 50 unit Toyota Alphard &amp; Vellfire (2020+) yang beroperasi di laluan strategik Lembah Klang, KLIA dan kawasan tumpuan korporat, kami memastikan jenama anda disaksikan oleh ratusan hingga ribuan prospek berkualiti tinggi setiap hari secara konsisten.',
      adv_stat_cta: 'SEMAK POTENSI JANGKAUAN',

      adv_bb_badge: 'Papan Iklan Tradisional',
      adv_bb_title: 'Billboard Luar Jalan (OOH)',
      adv_bb_desc: 'Paparan statik di tepi lebuh raya yang bersaing dengan pelbagai gangguan visual lalu lintas.',
      adv_bb_f1: '<strong>Masa Tontonan Singkat:</strong> Hanya dilihat 2 hingga 3 saat secara sekilas sambil memandu laju.',
      adv_bb_f2: '<strong>Audiens Umum:</strong> Tiada saringan demografi sasaran — dilihat secara rawak tanpa segmentasi tepat.',
      adv_bb_f3: '<strong>Tiada Interaksi Serta-Merta:</strong> Pemandu tidak berupaya mengimbas kod QR atau membuka tawaran ketika memandu.',

      adv_revo_badge: 'REVO In-Car Media Network',
      adv_revo_title: 'Pengiklanan Digital Kabin VIP',
      adv_revo_desc: 'Pengalaman media interaktif beresolusi tinggi di dalam kabin eksekutif yang tenang dan selesa.',
      adv_revo_f1: '<strong>45–60 Minit Captive Audience:</strong> Penumpang berada dalam suasana santai sepanjang tempoh perjalanan.',
      adv_revo_f2: "<strong>100% Focused &amp; Unskippable:</strong> Skrin digital 10–15 inci tepat pada aras mata di belakang kerusi pemandu tanpa 'ad-blocker'.",
      adv_revo_f3: '<strong>Audiens Bernilai Tinggi (HNWIs):</strong> Menemui pembuat keputusan korporat, pelabur, VIP dan pelancong mewah.',
      adv_revo_f4: '<strong>Tindakan Segera (QR Interactive):</strong> Penumpang mempunyai masa santai untuk mengimbas kod QR dan terus berhubung.',

      // How It Works / Steps
      steps_tag: 'CARA KEMPEN BERFUNGSI',
      steps_title: 'Daripada Idea Kepada Kempen, Dengan Lebih Mudah.',
      steps_subtitle: 'Kami memudahkan proses pelaksanaan supaya anda dapat menumpukan kepada matlamat utama jenama tanpa kerumitan teknikal.',
      step1_pill: 'STEP 01',
      step1_title: 'KONGSI OBJEKTIF ANDA',
      step1_desc: 'Beritahu kami tentang jenama, produk, sasaran pemasaran dan matlamat kempen anda melalui perbincangan ringkas.',
      step2_pill: 'STEP 02',
      step2_title: 'TEROKAI PILIHAN YANG SESUAI',
      step2_desc: 'Bincangkan format iklan, tempoh kempen dan ketersediaan kenderaan bersama pasukan perunding REVO.',
      step3_pill: 'STEP 03',
      step3_title: 'RANCANG KEMPEN ANDA',
      step3_desc: 'Semak cadangan kempen dan butiran yang dipersetujui sebelum pelaksanaan bermula dengan lancar.',

      // Touchpoints
      tp_tag: 'TITIK SENTUHAN AUDIENS',
      tp_title: 'The Customer Journey: From First Impression to Lasting Impact',
      tp_subtitle: 'Jenama anda menemani audiens berprofil tinggi sepanjang setiap fasa perjalanan harian mereka di Malaysia.',
      tp1_num: 'TOUCHPOINT 01',
      tp1_title: 'ARRIVAL & KLIA',
      tp1_desc: 'Sambutan eksklusif lapangan terbang KLIA & KLIA2. Menemui pelancong dan delegasi VIP sebaik tiba ke Malaysia.',
      tp2_num: 'TOUCHPOINT 02',
      tp2_title: 'HOTEL & HOSPITALITY',
      tp2_desc: 'Perjalanan ke hotel 5-bintang & suite kediaman mewah. Berhubung dengan tetamu semasa suasana santai dan istirehat.',
      tp3_num: 'TOUCHPOINT 03',
      tp3_title: 'CORPORATE & BUSINESS',
      tp3_desc: 'Urusan persidangan, mesyuarat perniagaan dan pergerakan korporat di menara komersial utama Lembah Klang.',
      tp4_num: 'TOUCHPOINT 04',
      tp4_title: 'EXECUTIVE & VIP',
      tp4_desc: 'Individu bernilai bersih tinggi (HNWIs), pembuat keputusan, pengarah syarikat dan delegasi kehormat peribadi.',
      tp5_num: 'TOUCHPOINT 05',
      tp5_title: 'TOURISTS & GLOBAL',
      tp5_desc: 'Pelawat antarabangsa yang mencari pengalaman terbaik, jenama barangan mewah, dan perkhidmatan berprestij.',
      tp6_num: 'TOUCHPOINT 06',
      tp6_title: 'FAMILY TRAVEL',
      tp6_desc: 'Perjalanan keluarga berprofil tinggi yang menikmati keselesaan ruang 7 & 8 tempat duduk Alphard & Vellfire.',
      tp_cta: 'BERMULA DENGAN PERBINCANGAN',

      // Solutions
      sol_tag: 'PENYELESAIAN PENGIKLANAN',
      sol_title: 'Pilih Cara Yang Sesuai Untuk Menceritakan Jenama Anda.',
      sol_subtitle: 'Setiap jenama mempunyai objektif yang berbeza. Terokai format pengiklanan yang mungkin sesuai dengan mesej dan keperluan kempen anda.',
      sol1_title: 'IN-CAR VIDEO ADVERTISING',
      sol1_desc: 'Slot 5s / 10s / 15s / 20s / 30s. Video ringkas berimpak tinggi yang menarik perhatian dan mengukuhkan ingatan jenama.',
      sol2_title: 'IMAGE SLIDE (STATIC DISPLAY)',
      sol2_desc: 'Ketengahkan visual jenama yang bersih, tajam dan beresolusi tinggi untuk menyampaikan mesej promosi dengan pantas.',
      sol3_title: 'BRANDED INTERACTIVE (QR/CTA)',
      sol3_desc: 'Tingkatkan interaksi terus melalui imbasan kod QR pintar ke laman web, katalog digital, atau pautan tawaran eksklusif.',
      sol4_title: 'SPLIT SCREEN (DUAL CONTENT)',
      sol4_desc: 'Paparkan dua mesej serentak — video promosi sinematik di satu sisi bersama paparan sepanduk diskaun atau QR di sisi lain.',
      sol5_title: 'FULL SCREEN IMMERSIVE',
      sol5_desc: 'Impak maksimum dengan paparan skrin penuh 1080p tanpa sempadan, memberikan pengalaman visual yang mengagumkan.',
      sol6_title: 'CONTENT ROTATION',
      sol6_desc: 'Penjadualan putaran iklan pintar mengikut rute, waktu puncak atau profil perjalanan VIP untuk memastikan mesej sentiasa segar.',
      sol_btn_specs: 'Spesifikasi Format',
      sol_disclaimer: '*Nota: Format pengiklanan bergantung pada ketersediaan peralatan kenderaan dan spesifikasi kempen yang disahkan.',

      // Network
      net_tag: 'RANGKAIAN KAMI',
      net_title: '50 Kenderaan. Satu Rangkaian Media.',
      net_subtext: 'REVO menyasarkan pembangunan rangkaian sehingga 50 buah Toyota Alphard dan Toyota Vellfire di sekitar Lembah Klang, dengan potensi peluang kempen berkaitan perjalanan lapangan terbang, hotel, pelancongan dan pengangkutan korporat.',
      net_ctx1: 'Klang Valley',
      net_ctx2: 'KLIA Corridor',
      net_ctx3: 'Hotels & Hospitality',
      net_ctx4: 'Corporate Mobility',
      net_responsible: 'Rangkaian 50 kenderaan merupakan sasaran fasa pembangunan berperingkat bagi memastikan kualiti penyiaran dan pengurusan kempen beroperasi dengan tahap kecemerlangan tertinggi.',
      net_cta: 'SEMAK PILIHAN LIPUTAN',

      // Industries
      ind_tag: 'UNTUK PELBAGAI INDUSTRI',
      ind_title: 'Adakah REVO Sesuai Untuk Jenama Anda?',
      ind_subtitle: 'Daripada perniagaan hospitaliti hingga jenama korporat, setiap kempen bermula dengan memahami siapa yang ingin anda jangkau.',
      ind_1: 'Luxury & Fashion',
      ind_2: 'Automotive',
      ind_3: 'Real Estate & Property',
      ind_4: 'Hospitality & Tourism',
      ind_5: 'Banking & Finance',
      ind_6: 'Food & Beverage',
      ind_7: 'Health & Wellness',
      ind_8: 'Technology & Telecoms',
      ind_9: 'Corporate & B2B',
      ind_10: 'Education & Training',
      ind_11: 'Government & NGO',
      ind_12: 'Entertainment & Media',
      ind_banner_text: '<strong>Tidak pasti sama ada perkhidmatan ini sesuai untuk perniagaan anda?</strong><br>Ceritakan objektif pemasaran anda kepada kami untuk meneroka potensi yang bersesuaian.',
      ind_cta: 'BINCANG DENGAN REVO',

      // Packages
      pkg_tag: 'PILIHAN KEMPEN',
      pkg_title: 'Kita Mulakan Dengan Keperluan Jenama Anda.',
      pkg_subtitle: 'Tidak semua perniagaan memerlukan pendekatan yang sama. Bincangkan keperluan anda untuk meneroka pilihan kempen yang bersesuaian.',
      pkg_price_label: 'Struktur Pelaburan:',
      pkg_reassurance: 'Masih dalam peringkat merancang? Tidak mengapa. Hubungi kami untuk memahami pilihan yang tersedia sebelum membuat keputusan.',

      pkg1_code: 'PACKAGE 01',
      pkg1_name: 'BRAND STARTER',
      pkg1_tag: 'Eksplorasi Awal',
      pkg1_desc: 'Sesuai untuk perniagaan yang baru ingin meneroka medium pengiklanan mudah alih premium.',
      pkg1_format: 'Format Iklan: Tertakluk kepada ketersediaan slot (video ringkas / paparan visual digital beresolusi tinggi)',
      pkg1_coverage: 'Liputan Kenderaan: Armada terpilih Alphard & Vellfire di kawasan tumpuan Lembah Klang',
      pkg1_period: 'Tempoh Kempen: Boleh dibincangkan mengikut keperluan perniagaan anda',
      pkg1_price: 'Hubungi Kami Untuk Kadar',
      pkg1_note: 'Fleksibel dan mesra objektif pemasaran awal',
      pkg1_cta: 'TEROKAI PAKEJ',

      pkg2_code: 'PACKAGE 02',
      pkg2_name: 'BRAND GROWTH',
      pkg2_tag: 'Pilihan Utama',
      pkg2_desc: 'Untuk jenama yang merancang pendedahan promosi yang lebih meluas dan berimpak tinggi.',
      pkg2_format: 'Format Iklan: Gabungan paparan video dinamik, imej visual jenama dan pautan kod QR',
      pkg2_coverage: 'Liputan Kenderaan: Pendedahan menyeluruh merangkumi koridor perniagaan, pusat bandar & hotel terkemuka',
      pkg2_period: 'Tempoh Kempen: Fleksibel mengikut fasa kempen pemasaran (mingguan / bulanan)',
      pkg2_price: 'Hubungi Kami Untuk Kadar',
      pkg2_note: 'Sesuai untuk kempen pelancaran dan membina kesedaran jenama',
      pkg2_cta: 'BINCANGKAN KEPERLUAN',

      pkg3_code: 'PACKAGE 03',
      pkg3_name: 'PREMIUM BRAND CAMPAIGN',
      pkg3_tag: 'Cadangan Khusus (Custom)',
      pkg3_desc: 'Untuk perniagaan yang memerlukan cadangan kempen tersuai dengan kehadiran jenama yang lebih eksklusif.',
      pkg3_format: 'Format Iklan: Perbincangan perancangan kempen penuh, visual eksklusif dan pengalaman penumpang',
      pkg3_coverage: 'Liputan Kenderaan: Liputan khas korporat, koridor perjalanan KLIA dan pergerakan eksekutif',
      pkg3_period: 'Tempoh Kempen: Berdasarkan persetujuan dan strategi pemasaran menyeluruh',
      pkg3_price: 'Hubungi Kami Untuk Kadar',
      pkg3_note: 'Pelan khusus diselaraskan dengan objektif perniagaan anda',
      pkg3_cta: 'DAPATKAN CADANGAN',

      // FAQ
      faq_tag: 'SEBELUM ANDA BERMULA',
      faq_title: 'Beberapa Perkara Yang Anda Mungkin Ingin Tahu.',
      faq_subtitle: 'Jawapan telus kepada persoalan lazim untuk membantu anda membuat penilaian awal dengan yakin.',
      faq1_q: 'Apakah jenis perniagaan yang sesuai?',
      faq1_a: 'REVO terbuka kepada pertanyaan daripada pelbagai industri yang ingin meneroka pengiklanan mudah alih sebagai sebahagian daripada strategi pemasaran — termasuk perhotelan, pelancongan, pembangunan hartanah, perbankan, perkhidmatan korporat dan jenama gaya hidup.',
      faq2_q: 'Berapakah kos untuk memulakan kempen?',
      faq2_a: 'Kos bergantung pada skop kempen, format iklan (video atau imej), tempoh siaran dan ketersediaan slot kenderaan. Hubungi kami untuk membincangkan pilihan yang sesuai mengikut bajet dan sasaran pulangan pemasaran anda.',
      faq3_q: 'Adakah saya perlu menyediakan bahan iklan sendiri?',
      faq3_a: 'Keperluan bahan kreatif boleh dibincangkan bersama pasukan REVO berdasarkan format iklan dan spesifikasi kempen. Anda boleh menggunakan aset sedia ada atau kami boleh berkongsi panduan teknikal resolusi dan saiz paparan yang optimum.',
      faq4_q: 'Bagaimanakah liputan kempen ditentukan?',
      faq4_a: 'Pilihan liputan bergantung pada kenderaan dan operasi yang tersedia pada masa kempen dirancang, termasuk laluan mobiliti di sekitar Lembah Klang, koridor perhubungan KLIA, pusat komersial dan destinasi hotel utama.',
      faq5_q: 'Bagaimanakah saya boleh mendapatkan maklumat lanjut?',
      faq5_a: 'Hubungi kami melalui WhatsApp untuk berkongsi objektif pemasaran dan mendapatkan maklumat lanjut tanpa sebarang obligasi pembelian segera.',

      // Conversion Section
      conv_tag: 'PUT IT INSIDE THE JOURNEY',
      conv_title: "Because The Best Brands Don't Just Advertise — <span class=\"text-gold-gradient\">They Travel With Their Audience.</span>",
      conv_subtext: "Bina pendedahan jenama yang eksklusif, dipercayai dan berimpak tinggi dalam perjalanan eksekutif harian di Malaysia. Let's Build Your Brand Together.",
      conv_cta_wa: 'BERBUAL DENGAN PASUKAN REVO',
      conv_cta_pkg: 'LIHAT PILIHAN KEMPEN',
      conv_small: 'Tiada keperluan untuk menyediakan pelan lengkap. Kongsikan idea anda dan kita mulakan perbincangan.',

      // Contact Section
      contact_tag: 'HUBUNGI KAMI',
      contact_title: 'Ceritakan Sedikit Tentang Kempen Anda.',
      contact_subtitle: 'Kami ingin memahami keperluan anda supaya perbincangan boleh bermula dengan lebih terarah dan bersesuaian dengan matlamat perniagaan anda.',
      contact_channel_wa: 'Saluran WhatsApp Rasmi',
      contact_channel_email: 'E-mel Pertanyaan Korporat',
      contact_channel_area: 'Kawasan Perkhidmatan',
      contact_channel_area_val: 'Kuala Lumpur & Lembah Klang, Malaysia',
      contact_btn_direct_wa: 'WHATSAPP REVO TERUS',

      // Form Elements
      form_name_label: 'Nama Penuh',
      form_name_ph: 'cth. Encik Razak',
      form_company_label: 'Nama Syarikat / Jenama',
      form_company_ph: 'cth. Zenith Holdings Sdn Bhd',
      form_email_label: 'Alamat E-mel Korporat',
      form_email_ph: 'nama@syarikat.com.my',
      form_phone_label: 'Nombor WhatsApp',
      form_phone_ph: 'cth. 012-3456789 atau +6011...',
      form_industry_label: 'Kategori Industri',
      form_industry_default: 'Pilih Industri Anda',
      form_industry_other: 'Lain-lain Kategori',
      form_budget_label: 'Anggaran Bajet Kempen',
      form_budget_opt: '(Pilihan)',
      form_budget_opt0: 'Belum ditentukan / Terbuka untuk cadangan',
      form_budget_opt1: 'Di bawah RM 5,000',
      form_budget_opt2: 'RM 5,000 – RM 15,000',
      form_budget_opt3: 'RM 15,000 – RM 30,000',
      form_budget_opt4: 'RM 30,000 ke atas',
      form_obj_label: 'Objektif Kempen',
      form_obj_ph: 'cth. Pelancaran produk baharu / Bina kesedaran jenama di KL',
      form_msg_label: 'Mesej / Keperluan Tambahan',
      form_msg_ph: 'Kongsikan sebarang perincian kempen atau pertanyaan yang ingin anda bincangkan...',
      form_submit_btn: 'HANTAR PERTANYAAN',
      form_submitting: 'Menghantar...',
      form_privacy_note: 'Maklumat anda dilindungi dan hanya digunakan untuk tujuan perbincangan kempen rasmi.',
      form_success_title: 'Permintaan Berjaya Dihantar!',
      form_success_wa_btn: 'Teruskan Berbual di WhatsApp',
      form_err_prefix: 'Ralat:',

      // Floating WA
      floating_wa_badge: 'Bincang Kempen di WhatsApp',
      floating_wa_aria: 'Berbual dengan Pasukan REVO di WhatsApp',

      // Footer
      footer_tagline: 'Premium Mobile Advertising | Brand Visibility | Business Opportunities.<br>Menyediakan medium komunikasi digital eksklusif di dalam kenderaan Toyota Alphard & Vellfire di Malaysia.',
      footer_col_nav: 'Navigasi Utama',
      footer_col_contact: 'Hubungi Kami',
      footer_market_label: 'Pasaran:',
      footer_copy: '&copy; 2026 REVO LUX MEDIA. Hak cipta terpelihara.',
      footer_faq_link: 'Soalan Lazim (FAQ)',
      footer_wa_link: 'Sembang WhatsApp',

      // Modal Dialog
      modal_main_title: 'Spesifikasi Format Iklan',
      modal_close_btn: 'Tutup',
      modal_wa_btn: 'Bincang Format Ini di WhatsApp',

      // Multimedia & Showcase
      hero_watch_btn: 'TONTON VIDEO ARMADA (10s)',
      about_card1_badge: 'Toyota Alphard VIP Cabin',
      about_card1_caption: 'Paparan skrin tepat pada aras mata penumpang eksekutif',
      about_card2_badge: 'Pengalaman Menaiki Armada (Video)',
      about_card2_caption: 'Langkah masuk VIP ke dalam Toyota Alphard REVO',
      adv_comparison_title: 'Perbandingan Visual: Mengapa In-Car Media Mengatasi Saluran Lain?',
      adv_comparison_sub: 'Tonton rakaman sebenar bagaimana audiens bertindak balas terhadap pelbagai saluran iklan berbanding suasana kabin tenang REVO.',
      adv_v1_tag: 'Papan Tanda Lebuhraya',
      adv_v1_title: 'Billboard Lebuhraya',
      adv_v1_desc: 'Kereta memecut laju. Pemandu hanya menjeling 2 saat sambil menumpukan stereng.',
      adv_v2_tag: 'Media Sosial / Skrol Telefon',
      adv_v2_title: 'Iklan Di Telefon Bimbit',
      adv_v2_desc: 'Jari menatal pantas, iklan terabai dan diskip dalam masa kurang 1 saat.',
      adv_v3_tag: 'Poster Awam & Mall',
      adv_v3_title: 'Kiosk / Poster Mall',
      adv_v3_desc: 'Kesesakan orang ramai yang lalu-lalang tanpa berhenti untuk membaca mesej.',
      adv_v4_tag: 'Pengalaman Eksklusif REVO',
      adv_v4_title: 'REVO In-Car Media',
      adv_v4_desc: '45 minit perhatian penuh tanpa sebarang gangguan dalam keselesaan kerusi VIP Alphard.',
      adv_v_watch: 'Tonton Klip Video',
      tp_photo_title: 'Visual Sebenar 6 Titik Sentuhan Penumpang VIP',
      tp_photo_sub: 'KLIA Transfer • Pusat Bandar KLCC • Hotel 5-Bintang • Pusat Beli-Belah • Pameran Korporat • Delegasi Eksekutif (Klik untuk besarkan)',
      sol_live_proof_title: 'Bukti Siaran Kempen Sebenar Di Dalam Kabin',
      sol_live_proof_desc: 'Saksikan bagaimana kempen rakan korporat dan agensi seperti PERKESO disiarkan secara dinamik di skrin resolusi tinggi Toyota Alphard REVO.',
      sol_live_proof_badge: 'SIARAN KEMPEN AKTIF',
      sol_overview_btn: 'Lihat Infografik Rangkaian Media REVO',
      pkg_rate_card_title: 'Kadar Rasmi Pakej Iklan Bulanan (Mengikut Unit & Seluruh Rangkaian)',
      pkg_rate_card_desc: 'Pilihan fleksibel bermula dari 5 saat sehingga 30 saat untuk 5 hingga 50 kenderaan, serta slot penajaan kategori eksklusif. Klik poster untuk melihat perincian penuh.',
      pkg_rate_card_btn: 'Buka Poster Kadar Rasmi (HD)',
      gallery_tag: 'GALERI MEDIA & ARMADA',
      gallery_title: 'Pustaka Visual & Bukti Siaran Eksklusif REVO',
      gallery_subtitle: 'Terokai video armada, suasana kabin VIP, ujian perbandingan impak iklan, serta infografik dan kadar rasmi REVO.',
      gallery_tab_all: 'Semua Media (13)',
      gallery_tab_fleet: 'Video Kabin & Armada (4)',
      gallery_tab_comparison: 'Video Perbandingan Iklan (5)',
      gallery_tab_posters: 'Poster & Infografik Rasmi (4)',
      gallery_play_video: 'Mainkan Video',
      gallery_zoom_photo: 'Besarkan Imej'
    },

    id: {
      // Document Metadata
      page_title: 'REVO LUX MEDIA | Iklan Mobil Toyota Alphard & Vellfire Malaysia',
      meta_desc: 'Jaringan media periklanan mobile premium di Toyota Alphard & Vellfire di Kuala Lumpur & Lembah Klang. Tampilkan video & gambar digital merek Anda kepada penumpang eksekutif.',
      og_desc: 'Iklankan merek Anda dalam Toyota Alphard & Vellfire di sekitar Kuala Lumpur. Hubungkan merek dengan penumpang eksekutif melalui layar digital.',

      // Navigation
      nav_home: 'Beranda',
      nav_about: 'Tentang Kami',
      nav_advantage: 'Keunggulan',
      nav_touchpoints: 'Titik Sentuh',
      nav_solutions: 'Solusi Iklan',
      nav_network: 'Jaringan Armada',
      nav_industries: 'Industri',
      nav_packages: 'Paket',
      nav_faq: 'FAQ',
      nav_contact: 'Kontak',
      nav_enquire_btn: 'KONSULTASI SEKARANG',
      nav_enquire_mobile: 'HUBUNGI VIA WHATSAPP',
      mobile_lang_title: 'PILIHAN BAHASA',

      // Hero Section
      hero_badge_text: '50 ARMADA MEWAH • KL & KLIA',
      hero_headline_my: 'IKLANKAN MEREK ANDA DALAM ALPHARD & VELLFIRE.',
      hero_desc: 'Jaringan periklanan mobile premium dalam armada Toyota Alphard & Vellfire untuk menghubungkan merek Anda langsung dengan audiens eksekutif di Lembah Klang dan koridor bandara KLIA.',
      hero_cta_wa: 'DISKUSIKAN KAMPANYE ANDA',
      hero_cta_explore: 'PELAJARI CARA KERJA',
      hero_microcopy: 'Paket dan opsi kampanye dapat disesuaikan dengan kebutuhan bisnis Anda.',

      // Value Strip
      val_strip_title: 'Lebih Dari Sekadar Ruang Iklan Biasa.',
      val_card1_title: 'MOBILITAS PREMIUM',
      val_card1_desc: 'Periklanan eksklusif di dalam kabin mobil mewah Toyota Alphard & Vellfire.',
      val_card2_title: 'KEHADIRAN MEREK EKSKLUSIF',
      val_card2_desc: 'Cara unik dan berkelas untuk memperkenalkan merek Anda kepada audiens berdampak tinggi.',
      val_card3_title: 'OPSI KAMPANYE FLEKSIBEL',
      val_card3_desc: 'Pilihan kampanye dan format penayangan yang dapat disesuaikan dengan kebutuhan bisnis.',

      // About REVO
      about_badge_text: 'PENGALAMAN KABIN VIP ALPHARD',
      about_tag: 'TENTANG REVO',
      about_title: 'Membawa Periklanan Lebih Dekat ke Pengalaman Perjalanan.',
      about_lead: 'REVO Premium Mobile Media Network hadir dengan gagasan bahwa peluang memperkenalkan merek tidak harus terbatas pada saluran periklanan konvensional.',
      about_p1: 'Melalui konsep periklanan mobile yang memanfaatkan armada kendaraan premium, REVO membantu bisnis mengeksplorasi cara baru dalam menyampaikan pesan, mempromosikan produk, dan membangun kesadaran merek.',
      about_p2: 'Setiap kampanye dapat didiskusikan berdasarkan tujuan pemasaran, jenis konten kreatif, serta opsi jangkauan armada yang tersedia.',
      about_cta: 'PELAJARI PENDEKATAN REVO',

      // Advantage / Better Than Billboards
      adv_tag: 'LEBIH DARI BILLBOARD BIASA',
      adv_title: 'Lebih Unggul Dari Billboard. Lebih Dari Sekadar Iklan.',
      adv_subtitle: 'REVO menghadirkan pesan merek Anda langsung ke dalam ruang eksklusif penumpangnya — kabin Toyota Alphard & Vellfire yang tenang, nyaman, dan bebas dari distraksi.',
      adv_stat_label: 'PROSPEK',
      adv_stat_sub: 'MINIMAL SETIAP HARI',
      adv_stat_copy: '<strong>Eksposur Berkelanjutan &amp; Konsisten:</strong> Dengan jaringan 50 unit Toyota Alphard &amp; Vellfire (2020+) yang beroperasi di rute strategis Lembah Klang, KLIA, dan pusat distrik bisnis korporat, kami memastikan merek Anda disaksikan oleh ratusan hingga ribuan prospek berkualitas tinggi setiap hari secara konsisten.',
      adv_stat_cta: 'CEK POTENSI JANGKAUAN',

      adv_bb_badge: 'Papan Reklame Tradisional',
      adv_bb_title: 'Billboard Luar Ruang (OOH)',
      adv_bb_desc: 'Tampilan statis di tepi jalan tol yang bersaing dengan berbagai distraksi visual lalu lintas.',
      adv_bb_f1: '<strong>Waktu Lihat Singkat:</strong> Hanya terlihat 2 hingga 3 detik sekilas saat berkendara kencang.',
      adv_bb_f2: '<strong>Audiens Terlalu Luas:</strong> Tidak ada penyaringan demografis sasaran — dilihat secara acak tanpa segmentasi tepat.',
      adv_bb_f3: '<strong>Tanpa Interaksi Langsung:</strong> Pengemudi tidak mungkin memindai kode QR atau membuka penawaran saat mengemudi.',

      adv_revo_badge: 'REVO In-Car Media Network',
      adv_revo_title: 'Periklanan Digital Kabin VIP',
      adv_revo_desc: 'Pengalaman media interaktif resolusi tinggi di dalam kabin eksekutif yang tenang dan nyaman.',
      adv_revo_f1: '<strong>45–60 Menit Captive Audience:</strong> Penumpang menikmati suasana santai sepanjang durasi perjalanan.',
      adv_revo_f2: "<strong>100% Fokus &amp; Unskippable:</strong> Layar digital 10–15 inci sejajar dengan pandangan mata tanpa 'ad-blocker'.",
      adv_revo_f3: '<strong>Audiens Bernilai Tinggi (HNWIs):</strong> Menjangkau pengambil keputusan korporat, investor, VIP, dan wisatawan premium.',
      adv_revo_f4: '<strong>Aksi Langsung (QR Interaktif):</strong> Penumpang memiliki waktu leluasa untuk memindai kode QR dan langsung terhubung.',

      // How It Works / Steps
      steps_tag: 'CARA KERJA KAMPANYE',
      steps_title: 'Dari Ide Menjadi Kampanye Nyata, Lebih Mudah.',
      steps_subtitle: 'Kami menyederhanakan proses implementasi agar Anda dapat fokus pada tujuan utama merek tanpa hambatan teknis.',
      step1_pill: 'LANGKAH 01',
      step1_title: 'BAGIKAN TUJUAN ANDA',
      step1_desc: 'Ceritakan tentang merek, produk, target pasar, dan tujuan kampanye Anda melalui diskusi singkat.',
      step2_pill: 'LANGKAH 02',
      step2_title: 'JELAJAHI OPSI YANG TEPAT',
      step2_desc: 'Diskusikan format materi iklan, durasi kampanye, dan ketersediaan armada bersama tim konsultan REVO.',
      step3_pill: 'LANGKAH 03',
      step3_title: 'LUNCURKAN KAMPANYE ANDA',
      step3_desc: 'Tinjau proposal kampanye dan detail yang disepakati sebelum eksekusi berjalan dengan mulus.',

      // Touchpoints
      tp_tag: 'TITIK SENTUH AUDIENS',
      tp_title: 'The Customer Journey: Dari Impresi Pertama Hingga Dampak Mendalam',
      tp_subtitle: 'Merek Anda menemani audiens berprofil tinggi di setiap fase mobilitas harian mereka di Malaysia.',
      tp1_num: 'TOUCHPOINT 01',
      tp1_title: 'KEDATANGAN & KLIA',
      tp1_desc: 'Penyambutan eksklusif di bandara KLIA & KLIA2. Menjangkau wisatawan dan delegasi VIP begitu tiba di Malaysia.',
      tp2_num: 'TOUCHPOINT 02',
      tp2_title: 'HOTEL & HOSPITALITY',
      tp2_desc: 'Perjalanan menuju hotel bintang 5 & residensi mewah. Terhubung dengan tamu saat suasana santai dan beristirahat.',
      tp3_num: 'TOUCHPOINT 03',
      tp3_title: 'KORPORAT & BISNIS',
      tp3_desc: 'Kunjungan konferensi, rapat bisnis, dan mobilitas eksekutif di gedung perkantoran utama Lembah Klang.',
      tp4_num: 'TOUCHPOINT 04',
      tp4_title: 'EKSEKUTIF & VIP',
      tp4_desc: 'Individu berpenghasilan tinggi (HNWIs), pengambil keputusan, direktur perusahaan, dan tamu kehormatan.',
      tp5_num: 'TOUCHPOINT 05',
      tp5_title: 'WISATAWAN GLOBAL',
      tp5_desc: 'Turis internasional yang mencari pengalaman terbaik, barang branded mewah, dan layanan bergengsi.',
      tp6_num: 'TOUCHPOINT 06',
      tp6_title: 'PERJALANAN KELUARGA',
      tp6_desc: 'Perjalanan keluarga kelas atas yang menikmati kenyamanan kabin 7 & 8 kursi Alphard & Vellfire.',
      tp_cta: 'MULAI DENGAN KONSULTASI',

      // Solutions
      sol_tag: 'SOLUSI PERIKLANAN',
      sol_title: 'Pilih Cara Terbaik Untuk Menyampaikan Cerita Merek Anda.',
      sol_subtitle: 'Setiap merek memiliki tujuan berbeda. Temukan format periklanan yang paling pas dengan pesan dan kebutuhan kampanye Anda.',
      sol1_title: 'IN-CAR VIDEO ADVERTISING',
      sol1_desc: 'Slot 5d / 10d / 15d / 20d / 30d. Video singkat berdampak tinggi yang memikat perhatian dan memperkuat ingatan merek.',
      sol2_title: 'IMAGE SLIDE (STATIC DISPLAY)',
      sol2_desc: 'Tampilkan visual merek yang bersih, tajam, dan beresolusi tinggi untuk menyampaikan pesan promosi secara instan.',
      sol3_title: 'BRANDED INTERACTIVE (QR/CTA)',
      sol3_desc: 'Tingkatkan interaksi langsung melalui pemindaian kode QR cerdas ke website, katalog digital, atau tautan penawaran eksklusif.',
      sol4_title: 'SPLIT SCREEN (DUAL CONTENT)',
      sol4_desc: 'Tampilkan dua pesan sekaligus — video promosi sinematik di satu sisi berdampingan dengan banner diskon atau kode QR di sisi lain.',
      sol5_title: 'FULL SCREEN IMMERSIVE',
      sol5_desc: 'Dampak maksimal dengan tampilan layar penuh 1080p tanpa batas, memberikan pengalaman visual yang memukau.',
      sol6_title: 'CONTENT ROTATION',
      sol6_desc: 'Penjadwalan rotasi iklan pintar berdasarkan rute, jam sibuk, atau profil perjalanan VIP agar pesan selalu segar dan relevan.',
      sol_btn_specs: 'Spesifikasi Format',
      sol_disclaimer: '*Catatan: Format periklanan bergantung pada ketersediaan perangkat armada dan spesifikasi kampanye yang disepakati.',

      // Network
      net_tag: 'JARINGAN ARMADA KAMI',
      net_title: '50 Armada Kendaraan. Satu Jaringan Media.',
      net_subtext: 'REVO mengoperasikan jaringan hingga 50 unit Toyota Alphard dan Toyota Vellfire di sekitar Lembah Klang, membuka peluang kampanye yang terhubung dengan mobilitas bandara, hotel mewah, pariwisata, dan transportasi korporat.',
      net_ctx1: 'Klang Valley',
      net_ctx2: 'Koridor Bandara KLIA',
      net_ctx3: 'Hotel & Resor Mewah',
      net_ctx4: 'Mobilitas Korporat',
      net_responsible: 'Jaringan 50 kendaraan dikelola secara terstruktur dan terukur guna memastikan kualitas penayangan dan manajemen kampanye beroperasi dengan standar keunggulan tertinggi.',
      net_cta: 'LIHAT PILIHAN JANGKAUAN',

      // Industries
      ind_tag: 'UNTUK BERBAGAI INDUSTRI',
      ind_title: 'Apakah REVO Tepat Untuk Merek Anda?',
      ind_subtitle: 'Dari sektor perhotelan hingga korporasi multinasional, setiap kampanye berawal dari memahami siapa yang ingin Anda tuju.',
      ind_1: 'Luxury & Fashion',
      ind_2: 'Otomotif',
      ind_3: 'Properti & Real Estat',
      ind_4: 'Perhotelan & Pariwisata',
      ind_5: 'Perbankan & Keuangan',
      ind_6: 'Kuliner / F&B',
      ind_7: 'Kesehatan & Kebugaran',
      ind_8: 'Teknologi & Telekomunikasi',
      ind_9: 'Korporat & B2B',
      ind_10: 'Pendidikan & Pelatihan',
      ind_11: 'Pemerintah & Organisasi',
      ind_12: 'Hiburan & Media',
      ind_banner_text: '<strong>Belum yakin apakah media ini sesuai untuk bisnis Anda?</strong><br>Ceritakan tujuan pemasaran Anda kepada kami untuk mengeksplorasi potensi yang paling efektif.',
      ind_cta: 'KONSULTASI DENGAN REVO',

      // Packages
      pkg_tag: 'PILIHAN KAMPANYE',
      pkg_title: 'Mari Mulai Dari Kebutuhan Merek Anda.',
      pkg_subtitle: 'Setiap bisnis membutuhkan pendekatan yang unik. Diskusikan rencana Anda untuk menemukan opsi kampanye yang paling cocok.',
      pkg_price_label: 'Struktur Investasi:',
      pkg_reassurance: 'Masih dalam tahap perencanaan? Tidak masalah. Hubungi kami untuk memahami berbagai pilihan yang tersedia sebelum mengambil keputusan.',

      pkg1_code: 'PAKET 01',
      pkg1_name: 'BRAND STARTER',
      pkg1_tag: 'Eksplorasi Awal',
      pkg1_desc: 'Sangat tepat untuk bisnis yang baru mulai menjajaki media periklanan mobile premium.',
      pkg1_format: 'Format Iklan: Menyesuaikan ketersediaan slot (video singkat / tampilan visual digital resolusi tinggi)',
      pkg1_coverage: 'Jangkauan Armada: Armada pilihan Alphard & Vellfire di area utama Lembah Klang',
      pkg1_period: 'Periode Kampanye: Fleksibel dan dapat disesuaikan dengan kebutuhan bisnis Anda',
      pkg1_price: 'Hubungi Kami Untuk Tarif',
      pkg1_note: 'Fleksibel dan ramah bagi target pemasaran tahap awal',
      pkg1_cta: 'PELAJARI PAKET',

      pkg2_code: 'PAKET 02',
      pkg2_name: 'BRAND GROWTH',
      pkg2_tag: 'Pilihan Utama',
      pkg2_desc: 'Bagi merek yang merencanakan eksposur promosi lebih luas dengan dampak visual maksimal.',
      pkg2_format: 'Format Iklan: Kombinasi video dinamis, materi gambar merek, dan tautan kode QR interaktif',
      pkg2_coverage: 'Jangkauan Armada: Eksposur menyeluruh di koridor bisnis, pusat kota & hotel bintang lima terkemuka',
      pkg2_period: 'Periode Kampanye: Fleksibel mengikuti fase promosi Anda (mingguan / bulanan)',
      pkg2_price: 'Hubungi Kami Untuk Tarif',
      pkg2_note: 'Ideal untuk peluncuran produk dan penguatan brand awareness',
      pkg2_cta: 'DISKUSIKAN KEBUTUHAN',

      pkg3_code: 'PAKET 03',
      pkg3_name: 'PREMIUM BRAND CAMPAIGN',
      pkg3_tag: 'Solusi Khusus (Custom)',
      pkg3_desc: 'Untuk perusahaan yang memerlukan konsep kampanye khusus dengan kehadiran merek yang lebih eksklusif.',
      pkg3_format: 'Format Iklan: Perencanaan menyeluruh, visual eksklusif terdedikasi, dan pengalaman interaktif penumpang',
      pkg3_coverage: 'Jangkauan Armada: Jalur khusus korporat, koridor bandara KLIA, dan mobilitas eksekutif VIP',
      pkg3_period: 'Periode Kampanye: Sesuai kesepakatan dan strategi pemasaran jangka menengah/panjang',
      pkg3_price: 'Hubungi Kami Untuk Tarif',
      pkg3_note: 'Rencana khusus yang diselaraskan dengan target pertumbuhan bisnis Anda',
      pkg3_cta: 'MINTA PROPOSAL',

      // FAQ
      faq_tag: 'SEBELUM ANDA MEMULAI',
      faq_title: 'Beberapa Hal Yang Mungkin Ingin Anda Ketahui.',
      faq_subtitle: 'Jawaban transparan untuk pertanyaan umum agar Anda dapat mempertimbangkan rencana promosi dengan percaya diri.',
      faq1_q: 'Jenis bisnis apa saja yang cocok?',
      faq1_a: 'REVO menyambut baik pertanyaan dari berbagai sektor industri yang ingin mengeksplorasi periklanan mobile sebagai bagian dari strategi pemasaran — termasuk perhotelan, pariwisata, pengembang properti, perbankan, layanan korporat, hingga merek gaya hidup.',
      faq2_q: 'Berapa biaya untuk memulai kampanye?',
      faq2_a: 'Biaya disesuaikan dengan cakupan kampanye, format materi iklan (video atau gambar), durasi penayangan, dan ketersediaan slot armada. Hubungi tim kami untuk mendiskusikan opsi yang paling efektif sesuai anggaran dan target ROI Anda.',
      faq3_q: 'Apakah saya harus menyiapkan materi iklan sendiri?',
      faq3_a: 'Kebutuhan materi kreatif dapat didiskusikan bersama tim REVO sesuai format iklan dan spesifikasi kampanye. Anda dapat memakai aset yang sudah ada, atau kami dapat memberikan panduan teknis resolusi dan ukuran tampilan layar yang optimal.',
      faq4_q: 'Bagaimana jangkauan kampanye ditentukan?',
      faq4_a: 'Jangkauan rute ditentukan oleh operasional armada aktif selama periode kampanye, mencakup rute mobilitas utama Lembah Klang, koridor bandara KLIA, pusat bisnis komersial, serta kawasan hotel bintang lima ternama.',
      faq5_q: 'Bagaimana cara mendapatkan informasi lebih lanjut?',
      faq5_a: 'Hubungi kami langsung melalui WhatsApp untuk membagikan tujuan pemasaran dan memperoleh informasi lengkap tanpa kewajiban pembelian langsung.',

      // Conversion Section
      conv_tag: 'PUT IT INSIDE THE JOURNEY',
      conv_title: 'Karena Merek Terbaik Tidak Hanya Beriklan — <span class="text-gold-gradient">Mereka Bepergian Bersama Audiensnya.</span>',
      conv_subtext: "Bangun eksposur merek yang eksklusif, tepercaya, dan berdampak tinggi di sepanjang perjalanan eksekutif harian di Malaysia. Let's Build Your Brand Together.",
      conv_cta_wa: 'KONSULTASI DENGAN TIM REVO',
      conv_cta_pkg: 'LIHAT PILIHAN KAMPANYE',
      conv_small: 'Tidak perlu menyusun proposal rumit terlebih dahulu. Cukup bagikan ide Anda dan mari kita mulai diskusi.',

      // Contact Section
      contact_tag: 'HUBUNGI KAMI',
      contact_title: 'Ceritakan Rencana Kampanye Anda.',
      contact_subtitle: 'Kami ingin memahami kebutuhan Anda agar diskusi awal dapat berjalan lebih terarah dan selaras dengan target bisnis Anda.',
      contact_channel_wa: 'Saluran WhatsApp Resmi',
      contact_channel_email: 'Email Pertanyaan Korporat',
      contact_channel_area: 'Wilayah Operasional',
      contact_channel_area_val: 'Kuala Lumpur & Lembah Klang, Malaysia',
      contact_btn_direct_wa: 'CHAT WHATSAPP REVO SEKARANG',

      // Form Elements
      form_name_label: 'Nama Lengkap',
      form_name_ph: 'cth. Bpk. Hendra Gunawan',
      form_company_label: 'Nama Perusahaan / Merek',
      form_company_ph: 'cth. PT Mahakarya Indonesia',
      form_email_label: 'Alamat Email Korporat',
      form_email_ph: 'nama@perusahaan.com',
      form_phone_label: 'Nomor WhatsApp',
      form_phone_ph: 'cth. 0812-3456-7890 atau +62812...',
      form_industry_label: 'Kategori Industri',
      form_industry_default: 'Pilih Kategori Industri',
      form_industry_other: 'Kategori Lainnya',
      form_budget_label: 'Perkiraan Anggaran Kampanye',
      form_budget_opt: '(Opsional)',
      form_budget_opt0: 'Belum ditentukan / Terbuka untuk rekomendasi',
      form_budget_opt1: 'Di bawah RM 5,000',
      form_budget_opt2: 'RM 5,000 – RM 15,000',
      form_budget_opt3: 'RM 15,000 – RM 30,000',
      form_budget_opt4: 'RM 30,000 ke atas',
      form_obj_label: 'Tujuan Kampanye',
      form_obj_ph: 'cth. Peluncuran produk baru / Meningkatkan brand awareness di KL',
      form_msg_label: 'Pesan / Kebutuhan Khusus',
      form_msg_ph: 'Bagikan detail rencana kampanye atau pertanyaan yang ingin Anda diskusikan...',
      form_submit_btn: 'KIRIM PERTANYAAN',
      form_submitting: 'Mengirim...',
      form_privacy_note: 'Informasi Anda terlindungi dan hanya digunakan untuk kepentingan diskusi kampanye resmi.',
      form_success_title: 'Pertanyaan Berhasil Dikirim!',
      form_success_wa_btn: 'Lanjutkan Diskusi di WhatsApp',
      form_err_prefix: 'Terjadi Kesalahan:',

      // Floating WA
      floating_wa_badge: 'Konsultasi Kampanye via WA',
      floating_wa_aria: 'Chat dengan Tim REVO di WhatsApp',

      // Footer
      footer_tagline: 'Premium Mobile Advertising | Brand Visibility | Business Opportunities.<br>Menyediakan media komunikasi digital eksklusif di dalam kabin Toyota Alphard & Vellfire di Malaysia.',
      footer_col_nav: 'Navigasi Utama',
      footer_col_contact: 'Hubungi Kami',
      footer_market_label: 'Pasar:',
      footer_copy: '&copy; 2026 REVO LUX MEDIA. Hak cipta dilindungi undang-undang.',
      footer_faq_link: 'Pertanyaan Umum (FAQ)',
      footer_wa_link: 'Chat WhatsApp',

      // Modal Dialog
      modal_main_title: 'Spesifikasi Format Iklan',
      modal_close_btn: 'Tutup',
      modal_wa_btn: 'Diskusikan Format Ini di WhatsApp',

      // Multimedia & Showcase
      hero_watch_btn: 'TONTON VIDEO ARMADA (10s)',
      about_card1_badge: 'Toyota Alphard VIP Cabin',
      about_card1_caption: 'Tampilan layar tepat setinggi mata penumpang eksekutif',
      about_card2_badge: 'Pengalaman Menaiki Armada (Video)',
      about_card2_caption: 'Langkah masuk VIP ke dalam Toyota Alphard REVO',
      adv_comparison_title: 'Perbandingan Visual: Mengapa In-Car Media Mengungguli Media Lain?',
      adv_comparison_sub: 'Tonton rekaman nyata bagaimana audiens merespons berbagai media iklan dibandingkan suasana kabin tenang REVO.',
      adv_v1_tag: 'Papan Reklame Jalan Tol',
      adv_v1_title: 'Billboard Jalan Tol',
      adv_v1_desc: 'Mobil melaju kencang. Pengemudi hanya melirik 2 detik sambil fokus menyetir.',
      adv_v2_tag: 'Media Sosial / Skrol Ponsel',
      adv_v2_title: 'Iklan di Ponsel Pintar',
      adv_v2_desc: 'Jari menggulir cepat, iklan terabaikan dan dilewati kurang dari 1 detik.',
      adv_v3_tag: 'Poster Publik & Mall',
      adv_v3_title: 'Kios / Poster Mall',
      adv_v3_desc: 'Keramaian orang berlalu-lalang tanpa berhenti untuk membaca pesan Anda.',
      adv_v4_tag: 'Pengalaman Eksklusif REVO',
      adv_v4_title: 'REVO In-Car Media',
      adv_v4_desc: '45 menit perhatian penuh tanpa gangguan dalam kenyamanan kursi VIP Alphard.',
      adv_v_watch: 'Tonton Klip Video',
      tp_photo_title: 'Visual Nyata 6 Titik Sentuh Penumpang VIP',
      tp_photo_sub: 'KLIA Transfer • Pusat Kota KLCC • Hotel Bintang-5 • Pusat Perbelanjaan • Pameran Korporat • Delegasi Eksekutif (Klik untuk perbesar)',
      sol_live_proof_title: 'Bukti Penayangan Kampanye Nyata di Dalam Kabin',
      sol_live_proof_desc: 'Saksikan bagaimana kampanye mitra korporat dan instansi seperti PERKESO ditayangkan secara dinamis di layar resolusi tinggi Toyota Alphard REVO.',
      sol_live_proof_badge: 'TAYANGAN KAMPANYE AKTIF',
      sol_overview_btn: 'Lihat Infografis Jaringan Media REVO',
      pkg_rate_card_title: 'Tarif Resmi Paket Iklan Bulanan (Per Unit & Seluruh Jaringan)',
      pkg_rate_card_desc: 'Pilihan fleksibel mulai dari 5 detik hingga 30 detik untuk 5 hingga 50 kendaraan, serta slot sponsor kategori eksklusif. Klik poster untuk melihat rincian lengkap.',
      pkg_rate_card_btn: 'Buka Poster Tarif Resmi (HD)',
      gallery_tag: 'GALERI MEDIA & ARMADA',
      gallery_title: 'Pustaka Visual & Bukti Tayangan Eksklusif REVO',
      gallery_subtitle: 'Jelajahi video armada, suasana kabin VIP, pengujian perbandingan dampak iklan, serta infografis dan tarif resmi REVO.',
      gallery_tab_all: 'Semua Media (13)',
      gallery_tab_fleet: 'Video Kabin & Armada (4)',
      gallery_tab_comparison: 'Video Perbandingan Iklan (5)',
      gallery_tab_posters: 'Poster & Infografis Resmi (4)',
      gallery_play_video: 'Putar Video',
      gallery_zoom_photo: 'Perbesar Gambar'
    }
  };

  // Modal Specifications Data by Language
  const modalSpecs = {
    ms: {
      video: {
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
      image: {
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
      awareness: {
        title: 'Brand Awareness Campaigns (Full Screen)',
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
      qr: {
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
      promotions: {
        title: 'Product & Service Promotions',
        tagline: 'Perkenalkan tawaran baharu, pakej istimewa dan perkhidmatan korporat',
        content: `
          <p><strong>Pengumuman Tepat Pada Masanya Untuk Keputusan Pemasaran:</strong></p>
          <p>Sangat ideal untuk perniagaan hospitaliti, pelancongan, pelaburan hartanah, sektor kewangan, dan produk gaya hidup mewah.</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Fleksibiliti Mesej:</strong> Kemaskini visual promosi mengikut kempen bermusim.</li>
            <li><strong>Penyesuaian Mesej:</strong> Nada komunikasi santun yang menghormati privasi dan keselesaan penumpang.</li>
          </ul>
        `,
        waText: 'Salam REVO, kami mempunyai promosi produk/perkhidmatan baharu dan ingin membincangkan slot pengiklanan.'
      },
      custom: {
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
      splitscreen: {
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
      rotation: {
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
    },

    id: {
      video: {
        title: 'In-Car Video Advertising',
        tagline: 'Penayangan video promosi melalui layar digital Alphard & Vellfire',
        content: `
          <p><strong>Paparan Visual Sinematik Dalam Perjalanan VIP:</strong></p>
          <p>Format video memungkinkan merek Anda menyampaikan narasi yang lebih dinamis dan emosional kepada penumpang eksekutif. Sepanjang perjalanan bisnis maupun liburan santai, penumpang menikmati tontonan video berdefinisi tinggi tanpa distraksi kebisingan iklan jalanan.</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Format File:</strong> MP4 (H.264 / AAC Audio).</li>
            <li><strong>Rasio Aspek:</strong> 16:9 Landscape Full HD (1080p).</li>
            <li><strong>Rekomendasi Durasi Slot:</strong> 15 detik atau 30 detik untuk setiap putaran loop.</li>
            <li><strong>Frekuensi Penayangan:</strong> Pengulangan berkala selama durasi perjalanan kendaraan aktif.</li>
            <li><strong>Audio:</strong> Dapat disesuaikan dengan kenyamanan kabin VIP (audio lembut atau teks takarir visual).</li>
          </ul>
          <p style="font-size: 0.8rem; color: #E8C98F;">*Tergantung ketersediaan spesifikasi perangkat layar pada armada kendaraan yang terkonfirmasi.</p>
        `,
        waText: 'Halo REVO, saya tertarik untuk mengetahui lebih lanjut mengenai format In-Car Video Advertising.'
      },
      image: {
        title: 'Digital Image Advertising',
        tagline: 'Tampilkan produk, visual merek dan penawaran promosi beresolusi tinggi',
        content: `
          <p><strong>Kejelasan Pesan & Eksposur Merek Yang Bersih:</strong></p>
          <p>Sangat ideal untuk memperkenalkan produk terbaru, penawaran promosi eksklusif, atau penguatan identitas merek dengan grafis berdefinisi tinggi.</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Format File:</strong> JPG / PNG berdefinisi tinggi (RGB).</li>
            <li><strong>Rasio Aspek:</strong> 1920 x 1080 px (16:9).</li>
            <li><strong>Karakteristik:</strong> Penayangan visual statis berputar (carousel showcase) dengan durasi tatap mata optimal.</li>
            <li><strong>Tips Kreatif:</strong> Desain minimalis dan elegan, berfokus pada visual produk utama serta pesan ringkas yang berkesan.</li>
          </ul>
        `,
        waText: 'Halo REVO, saya berminat dengan format Digital Image Advertising untuk promosi merek kami.'
      },
      awareness: {
        title: 'Brand Awareness Campaigns (Full Screen)',
        tagline: 'Jelajahi peluang memperkenalkan merek melalui media mobilitas premium',
        content: `
          <p><strong>Menjangkau Audiens Sasaran Dalam Suasana Relevan:</strong></p>
          <p>Iklan luar ruang konvensional sering kali tenggelam dalam kebisingan visual jalan raya. REVO menawarkan lingkungan kabin yang tenang, memastikan pesan merek Anda mendapatkan perhatian penuh dari penumpang sasaran.</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Target Audiens:</strong> Eksekutif bisnis, investor, wisatawan internasional, dan keluarga kelas atas.</li>
            <li><strong>Keunggulan:</strong> Eksposur merek yang konsisten tanpa persaingan visual yang berlebihan.</li>
            <li><strong>Pilihan Pelaksanaan:</strong> Paket bertahap disesuaikan dengan momen peluncuran atau periode kampanye pemasaran.</li>
          </ul>
        `,
        waText: 'Halo REVO, saya ingin mendiskusikan Brand Awareness Campaign melalui jaringan mobilitas Alphard Anda.'
      },
      qr: {
        title: 'QR Code Advertising',
        tagline: 'Hubungkan materi iklan langsung ke website, katalog atau penawaran instan',
        content: `
          <p><strong>Langkah Mudah Dari Layar Monitor Langsung ke Ponsel Penumpang:</strong></p>
          <p>Integrasikan visual iklan Anda dengan kode QR cerdas yang mudah dipindai oleh penumpang dari kursi kapten yang nyaman.</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Tujuan Pemindaian:</strong> Landing page khusus, toko online, tautan pesan WhatsApp, atau unduh brosur digital.</li>
            <li><strong>Pelacakan Kinerja:</strong> Kode QR dapat dilengkapi parameter pelacakan URL (UTM tags) untuk mengukur tingkat antusiasme penumpang.</li>
            <li><strong>Pengalaman Pengguna:</strong> Penumpang memiliki waktu santai selama perjalanan untuk memindai dan mengeksplorasi penawaran Anda.</li>
          </ul>
        `,
        waText: 'Halo REVO, boleh bagikan informasi tentang penerapan QR Code Advertising di dalam armada kendaraan?'
      },
      promotions: {
        title: 'Product & Service Promotions',
        tagline: 'Perkenalkan penawaran baru, paket istimewa dan layanan korporat',
        content: `
          <p><strong>Pengumuman Tepat Waktu Untuk Keputusan Bisnis:</strong></p>
          <p>Sangat pas bagi sektor perhotelan, pariwisata, investasi properti, perbankan, dan produk gaya hidup premium.</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Fleksibilitas Pesan:</strong> Pembaruan visual promosi mengikuti momentum kampanye (musim liburan, peluncuran produk baru, dsb).</li>
            <li><strong>Penyampaian Elegan:</strong> Gaya komunikasi santun yang menghormati privasi dan kenyamanan perjalanan penumpang VIP.</li>
          </ul>
        `,
        waText: 'Halo REVO, kami memiliki promosi produk/layanan baru dan ingin membicarakan slot penayangan iklan.'
      },
      custom: {
        title: 'Custom Campaigns',
        tagline: 'Diskusikan pendekatan periklanan berdasarkan tujuan dan kebutuhan khusus Anda',
        content: `
          <p><strong>Solusi Kampanye Yang Disesuaikan Sepenuhnya:</strong></p>
          <p>Apakah Anda mengadakan konferensi korporat besar, peluncuran merek internasional, atau membutuhkan mobilitas khusus delegasi VIP?</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Perencanaan Strategis:</strong> Kami mendampingi penataan konten, format penayangan, dan penjadwalan periode kampanye.</li>
            <li><strong>Jangkauan Spesifik:</strong> Pembahasan rute mobilitas khusus atau acara berskala tertentu di Malaysia.</li>
            <li><strong>Konsultasi Kemitraan:</strong> Sesi diskusi awal gratis tanpa kewajiban komitmen penjualan langsung.</li>
          </ul>
        `,
        waText: 'Halo REVO, kami membutuhkan usulan Custom Campaign khusus untuk bisnis perusahaan kami.'
      },
      splitscreen: {
        title: 'Split Screen (Dual Content)',
        tagline: 'Tampilan dua format simultan untuk penyampaian pesan yang lebih komprehensif',
        content: `
          <p><strong>Dua Pesan Dalam Satu Tampilan Layar Dinamis:</strong></p>
          <p>Format Split Screen memungkinkan pemutaran video dinamis di satu sisi (seperti video branding / demonstrasi produk) disandingkan secara serempak dengan gambar statis atau kode QR di sisi lain.</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Struktur Visual:</strong> Gabungan video bergerak dan grafis informatif statis.</li>
            <li><strong>Peluang Interaksi:</strong> Penumpang dapat menyimak video sambil memindai penawaran tanpa harus menunggu video usai.</li>
            <li><strong>Efektivitas:</strong> Sangat ampuh untuk peluncuran produk baru, registrasi acara korporat, maupun kampanye direct response.</li>
          </ul>
        `,
        waText: 'Halo REVO, saya tertarik dengan opsi Split Screen (Dual Content) untuk promosi merek kami.'
      },
      rotation: {
        title: 'Content Rotation (Smart Scheduling)',
        tagline: 'Penjadwalan rotasi pintar berdasarkan waktu sibuk, rute dan profil perjalanan',
        content: `
          <p><strong>Konten Dinamis Sesuai Konteks Mobilitas VIP:</strong></p>
          <p>Format ini memungkinkan materi kampanye Anda ditayangkan berdasarkan rotasi pintar teroptimasi — memastikan audiens selalu melihat konten yang segar dan relevan dengan waktu serta rute perjalanan.</p>
          <ul style="margin: 16px 0; padding-left: 20px; list-style: disc; color: #A9ADB4; font-size: 0.885rem; line-height: 1.7;">
            <li><strong>Variasi Materi Kreatif:</strong> Dapat memuat beberapa versi materi dalam satu kampanye guna menghindari kejenuhan audiens.</li>
            <li><strong>Penjadwalan Cerdas:</strong> Penyesuaian pesan antara mobilitas pagi hari korporat dan perjalanan santai sore/malam.</li>
            <li><strong>Laporan Transparan:</strong> Verifikasi berkala frekuensi siar untuk transparansi performa kampanye.</li>
          </ul>
        `,
        waText: 'Halo REVO, saya ingin mengetahui lebih detail seputar opsi Content Rotation (Smart Scheduling).'
      }
    }
  };

  // State Management
  const STORAGE_KEY = 'revo_lang';
  const COOKIE_KEY = 'revo_lang';
  let currentLang = 'ms';

  // Helper to read cookie
  function getCookie(name) {
    const match = document.cookie.match(new RegExp('(^|;\\s*)(' + name + ')=([^;]*)'));
    return match ? decodeURIComponent(match[3]) : null;
  }

  // Helper to set cookie
  function setCookie(name, value, days) {
    const expires = new Date(Date.now() + (days || 365) * 864e5).toUTCString();
    document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/; SameSite=Lax';
  }

  // Detect initial language
  function detectInitialLanguage() {
    // 1. URL Query Parameter: ?lang=id or ?lang=ms
    const urlParams = new URLSearchParams(window.location.search);
    const urlLang = urlParams.get('lang');
    if (urlLang && (urlLang === 'ms' || urlLang === 'id')) {
      return urlLang;
    }

    // 2. Local Storage
    try {
      const stored = localStorage.getItem(STORAGE_KEY);
      if (stored && (stored === 'ms' || stored === 'id')) {
        return stored;
      }
    } catch (e) {}

    // 3. Cookie
    const cookieVal = getCookie(COOKIE_KEY);
    if (cookieVal && (cookieVal === 'ms' || cookieVal === 'id')) {
      return cookieVal;
    }

    // 4. Default to Bahasa Malaysia
    return 'ms';
  }

  // Apply language to all DOM elements
  function applyLanguage(lang) {
    if (!translations[lang]) lang = 'ms';
    currentLang = lang;

    // Update <html lang="...">
    document.documentElement.lang = lang;

    // Update Page Title
    if (translations[lang].page_title) {
      document.title = translations[lang].page_title;
    }

    // Update Meta Description
    const metaDesc = document.querySelector('meta[name="description"]');
    if (metaDesc && translations[lang].meta_desc) {
      metaDesc.setAttribute('content', translations[lang].meta_desc);
    }

    // Update OG Description
    const ogDesc = document.querySelector('meta[property="og:description"]');
    if (ogDesc && translations[lang].og_desc) {
      ogDesc.setAttribute('content', translations[lang].og_desc);
    }

    // Update all text/html elements with data-i18n
    const translatableElements = document.querySelectorAll('[data-i18n]');
    translatableElements.forEach((el) => {
      const key = el.getAttribute('data-i18n');
      if (translations[lang][key] !== undefined) {
        // If string contains HTML tags, use innerHTML; otherwise textContent
        if (translations[lang][key].includes('<') && translations[lang][key].includes('>')) {
          el.innerHTML = translations[lang][key];
        } else {
          el.textContent = translations[lang][key];
        }
      }
    });

    // Update placeholders with data-i18n-placeholder
    const placeholderElements = document.querySelectorAll('[data-i18n-placeholder]');
    placeholderElements.forEach((el) => {
      const key = el.getAttribute('data-i18n-placeholder');
      if (translations[lang][key] !== undefined) {
        el.setAttribute('placeholder', translations[lang][key]);
      }
    });

    // Update titles / aria-labels
    const titleElements = document.querySelectorAll('[data-i18n-title]');
    titleElements.forEach((el) => {
      const key = el.getAttribute('data-i18n-title');
      if (translations[lang][key] !== undefined) {
        el.setAttribute('title', translations[lang][key]);
      }
    });

    const ariaElements = document.querySelectorAll('[data-i18n-aria]');
    ariaElements.forEach((el) => {
      const key = el.getAttribute('data-i18n-aria');
      if (translations[lang][key] !== undefined) {
        el.setAttribute('aria-label', translations[lang][key]);
      }
    });

    // Update active class on language toggle buttons
    document.querySelectorAll('.lang-toggle-btn').forEach((btn) => {
      const btnLang = btn.getAttribute('data-lang');
      if (btnLang === lang) {
        btn.classList.add('active');
        btn.setAttribute('aria-pressed', 'true');
      } else {
        btn.classList.remove('active');
        btn.setAttribute('aria-pressed', 'false');
      }
    });

    // Update active class on mobile drawer buttons
    document.querySelectorAll('.mobile-lang-drawer-btn').forEach((btn) => {
      const btnLang = btn.getAttribute('data-lang');
      if (btnLang === lang) {
        btn.classList.add('active');
      } else {
        btn.classList.remove('active');
      }
    });

    // Dispatch event so other modules (like main.js modal or forms) can sync
    window.dispatchEvent(new CustomEvent('revo:langchange', { detail: { lang: lang } }));
  }

  // Set Language function (public)
  function setLanguage(lang, persist = true) {
    if (lang !== 'ms' && lang !== 'id') return;
    if (persist) {
      try {
        localStorage.setItem(STORAGE_KEY, lang);
      } catch (e) {}
      setCookie(COOKIE_KEY, lang, 365);
    }
    applyLanguage(lang);
  }

  // Get current language
  function getLanguage() {
    return currentLang;
  }

  // Translation helper function
  function t(key, fallback = '') {
    if (translations[currentLang] && translations[currentLang][key] !== undefined) {
      return translations[currentLang][key];
    }
    if (translations['ms'] && translations['ms'][key] !== undefined) {
      return translations['ms'][key];
    }
    return fallback || key;
  }

  // Get modal specification data by key and language
  function getModalSpec(key) {
    const lang = currentLang;
    if (modalSpecs[lang] && modalSpecs[lang][key]) {
      return modalSpecs[lang][key];
    }
    return modalSpecs['ms'][key] || null;
  }

  // Bind click handlers to language switch buttons
  function bindEvents() {
    // Header toggle buttons
    document.querySelectorAll('.lang-toggle-btn').forEach((btn) => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const targetLang = btn.getAttribute('data-lang');
        setLanguage(targetLang);
      });
    });

    // Mobile drawer buttons
    document.querySelectorAll('.mobile-lang-drawer-btn').forEach((btn) => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const targetLang = btn.getAttribute('data-lang');
        setLanguage(targetLang);
      });
    });
  }

  // Initialize
  function init() {
    const initialLang = detectInitialLanguage();
    applyLanguage(initialLang);
    bindEvents();
  }

  // Run on DOMContentLoaded or immediately if already loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // Expose global API
  window.RevoI18n = {
    setLanguage: setLanguage,
    getLanguage: getLanguage,
    applyLanguage: applyLanguage,
    t: t,
    getModalSpec: getModalSpec,
    translations: translations,
    modalSpecs: modalSpecs
  };
})();

