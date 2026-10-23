# REVO LUX MEDIA 🚗✨

> **Your Brand. Our Journey.**  
> The Media Network Inside The Journey — Premium Mobile Media Network di Malaysia (Toyota Alphard & Vellfire Fleet).

---

## 🌟 Overview

**REVO LUX MEDIA** adalah platform periklanan media bergerak premium yang menargetkan penumpang eksekutif dan VIP di dalam armada Toyota Alphard & Vellfire di Kuala Lumpur, Selangor, dan rute penghubung KLIA/KLIA2.

Platform ini dilengkapi landing page modern dengan estetika luxury dark mode, kalkulator interaktif estimasi jangkauan iklan, form inquiry cepat terintegrasi WhatsApp, dan dashboard admin untuk mengelola leads dan paket iklan.

---

## 🚀 Fitur Utama

- **Modern & Responsive UI**: Desain bertaraf internasional dengan visual gelap mewah (*luxury dark theme*), animasi halus, dan *glassmorphism*.
- **Interactive Campaign Calculator**: Simulasi langsung jumlah armada, durasi kampanye, estimasi impresi bulanan, dan estimasi investasi.
- **Direct Enquiry & WhatsApp Integration**: Form pemesanan dengan verifikasi aman (CSRF protection, sanitization) serta tautan otomatis ke WhatsApp resmi.
- **Admin Management Panel**: Dashboard admin ringan untuk mengelola paket iklan, status *enquiry*, dan konfigurasi kontak tanpa ketergantungan database SQL berat.
- **Secure File-based Storage**: Data disimpan secara terstruktur dalam format JSON dengan proteksi direct-access melalui `.htaccess`.

---

## 📁 Struktur Direktori

```
REVOLUXMEDIA/
├── admin/                     # Dashboard & otentikasi admin
│   ├── index.php              # Dashboard pengelolaan enquiry & paket
│   ├── login.php              # Halaman login admin
│   └── logout.php             # Script logout aman
├── assets/                    # Aset statis website
│   ├── css/
│   │   └── style.css          # Desain CSS modern & responsive
│   ├── js/
│   │   └── main.js           # Interaktivitas UI & kalkulator
│   └── images/                # Foto armada & interior premium
├── data/                      # Penyimpanan data JSON & logs
│   ├── .htaccess              # Perlindungan akses langsung file data
│   ├── admin.json             # Kredensial akun admin (hashed)
│   ├── enquiries.json         # Log leads / pemesanan masuk
│   ├── packages.json          # Konfigurasi paket iklan
│   └── settings.json          # Pengaturan umum website
├── includes/                  # Modul PHP pendukung
│   ├── config.php             # Konfigurasi umum, konstanta & zona waktu
│   ├── data_manager.php       # Handler penyimpanan & pemanggilan JSON
│   └── security.php           # Sanitasi input, proteksi CSRF, session guard
├── index.php                  # Halaman utama landing page
├── submit_enquiry.php         # Endpoint pemrosesan form inquiry
├── .gitignore                 # Konfigurasi pengabaian file Git
└── README.md                  # Dokumentasi proyek
```

---

## 💻 Kebutuhan Sistem & Instalasi

1. **Web Server**: Apache / Nginx (XAMPP / Laragon / WampServer)
2. **PHP**: Versi 7.4+ atau 8.x (direkomendasikan PHP 8.2+)
3. **Modul PHP**: `json`, `session`, `openssl`

### Menjalankan di Lokal (XAMPP):
1. Salin folder ini ke dalam direktori `c:/xampp/htdocs/REVOLUXMEDIA`.
2. Nyalakan service **Apache** di XAMPP Control Panel.
3. Buka browser dan akses:
   - Landing Page: `http://localhost/REVOLUXMEDIA/`
   - Admin Panel: `http://localhost/REVOLUXMEDIA/admin/`

---

## 🔒 Keamanan

- **CSRF Token Validation**: Mencegah serangan pemalsuan request lintas situs pada setiap form submission.
- **Direct Access Prevention**: File konfigurasi dan data dilindungi oleh blokade `.htaccess` dan script inspection.
- **XSS Sanitization**: Semua input pengguna disanitasi secara ketat sebelum diproses atau ditampilkan.
- **Secure Session Headers**: Pengaturan cookie session dengan atribut `HttpOnly`, `SameSite=Lax`, dan `Strict Mode`.

---

## 📄 Lisensi & Hak Cipta

&copy; 2026 REVO LUX MEDIA. Hak Cipta Dilindungi Undang-Undang.
