<?php
/**
 * REVO LUX MEDIA - Data Management Module
 * Handles atomic read/write for packages, enquiries, admin credentials, and settings.
 */

declare(strict_types=1);

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    http_response_code(403);
    exit('Direct access not permitted');
}

class RevoDataManager {
    private static function getFilePath(string $filename): string {
        if (!is_dir(DATA_PATH)) {
            @mkdir(DATA_PATH, 0750, true);
        }
        return DATA_PATH . DIRECTORY_SEPARATOR . $filename;
    }

    private static function readJson(string $filename, $default = []) {
        $path = self::getFilePath($filename);
        if (!file_exists($path)) {
            return $default;
        }

        $fp = @fopen($path, 'r');
        if (!$fp) {
            return $default;
        }

        flock($fp, LOCK_SH);
        $contents = stream_get_contents($fp);
        flock($fp, LOCK_UN);
        fclose($fp);

        if (empty($contents)) {
            return $default;
        }

        $decoded = json_decode($contents, true);
        return is_array($decoded) ? $decoded : $default;
    }

    private static function writeJson(string $filename, $data): bool {
        $path = self::getFilePath($filename);
        $tempPath = $path . '.tmp.' . bin2hex(random_bytes(6));

        $fp = @fopen($tempPath, 'w');
        if (!$fp) {
            return false;
        }

        flock($fp, LOCK_EX);
        fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        fflush($fp);
        flock($fp, LOCK_UN);
        fclose($fp);

        return rename($tempPath, $path);
    }

    /**
     * Initialize Default Data if not present
     */
    public static function initializeDefaults(): void {
        // 1. Initialize Packages
        $packagesPath = self::getFilePath('packages.json');
        if (!file_exists($packagesPath)) {
            $defaultPackages = [
                [
                    'id' => 'starter',
                    'code' => 'PACKAGE 01',
                    'name' => 'BRAND STARTER',
                    'tag' => 'Eksplorasi Awal',
                    'description' => 'Sesuai untuk perniagaan yang baru ingin meneroka medium pengiklanan mudah alih premium.',
                    'suitable_format' => 'Format Iklan: Tertakluk kepada ketersediaan slot (video ringkas / paparan visual digital beresolusi tinggi)',
                    'coverage' => 'Liputan Kenderaan: Armada terpilih Alphard & Vellfire di kawasan tumpuan Lembah Klang',
                    'period' => 'Tempoh Kempen: Boleh dibincangkan mengikut keperluan perniagaan anda',
                    'price' => 'Hubungi Kami Untuk Kadar',
                    'price_note' => 'Fleksibel dan mesra objektif pemasaran awal',
                    'cta_text' => 'TEROKAI PAKEJ',
                    'whatsapp_msg' => 'Salam REVO, saya ingin mengetahui maklumat lanjut mengenai Pakej 01 - Brand Starter.'
                ],
                [
                    'id' => 'growth',
                    'code' => 'PACKAGE 02',
                    'name' => 'BRAND GROWTH',
                    'tag' => 'Pilihan Utama',
                    'description' => 'Untuk jenama yang merancang pendedahan promosi yang lebih meluas dan berimpak tinggi.',
                    'suitable_format' => 'Format Iklan: Gabungan paparan video dinamik, imej visual jenama dan pautan kod QR',
                    'coverage' => 'Liputan Kenderaan: Pendedahan menyeluruh merangkumi koridor perniagaan, pusat bandar & hotel terkemuka',
                    'period' => 'Tempoh Kempen: Fleksibel mengikut fasa kempen pemasaran (mingguan / bulanan)',
                    'price' => 'Hubungi Kami Untuk Kadar',
                    'price_note' => 'Sesuai untuk kempen pelancaran dan membina kesedaran jenama',
                    'cta_text' => 'BINCANGKAN KEPERLUAN',
                    'whatsapp_msg' => 'Salam REVO, saya ingin berbincang mengenai Pakej 02 - Brand Growth untuk jenama kami.'
                ],
                [
                    'id' => 'premium',
                    'code' => 'PACKAGE 03',
                    'name' => 'PREMIUM BRAND CAMPAIGN',
                    'tag' => 'Cadangan Khusus (Custom)',
                    'description' => 'Untuk perniagaan yang memerlukan cadangan kempen tersuai dengan kehadiran jenama yang lebih eksklusif.',
                    'suitable_format' => 'Format Iklan: Perbincangan perancangan kempen penuh, visual eksklusif dan pengalaman penumpang',
                    'coverage' => 'Liputan Kenderaan: Liputan khas korporat, koridor perjalanan KLIA dan pergerakan eksekutif',
                    'period' => 'Tempoh Kempen: Berdasarkan persetujuan dan strategi pemasaran menyeluruh',
                    'price' => 'Hubungi Kami Untuk Kadar',
                    'price_note' => 'Pelan khusus diselaraskan dengan objektif perniagaan anda',
                    'cta_text' => 'DAPATKAN CADANGAN',
                    'whatsapp_msg' => 'Salam REVO, kami ingin membincangkan cadangan Pakej 03 - Premium Brand Campaign tersuai.'
                ]
            ];
            self::writeJson('packages.json', $defaultPackages);
        }

        // 2. Initialize Settings
        $settingsPath = self::getFilePath('settings.json');
        if (!file_exists($settingsPath)) {
            $defaultSettings = [
                'phone' => DEFAULT_PHONE,
                'whatsapp' => DEFAULT_WHATSAPP_NUM,
                'email' => DEFAULT_EMAIL,
                'target_fleet' => TARGET_FLEET_COUNT,
                'fleet_headline' => '50 Kenderaan. Satu Rangkaian Media.',
                'fleet_subtext' => 'REVO menyasarkan pembangunan rangkaian sehingga 50 buah Toyota Alphard dan Toyota Vellfire di sekitar Lembah Klang, dengan potensi peluang kempen berkaitan perjalanan lapangan terbang, hotel, pelancongan dan pengangkutan korporat.',
                'soft_reassurance' => 'Masih dalam peringkat merancang? Tidak mengapa. Hubungi kami untuk memahami pilihan yang tersedia sebelum membuat keputusan.'
            ];
            self::writeJson('settings.json', $defaultSettings);
        }

        // 3. Initialize Admin User
        $adminPath = self::getFilePath('admin.json');
        if (!file_exists($adminPath)) {
            $defaultAdmin = [
                'username' => 'admin',
                'password_hash' => password_hash('RevoAdmin@2026!', PASSWORD_BCRYPT),
                'name' => 'Revo Administrator',
                'last_login' => null
            ];
            self::writeJson('admin.json', $defaultAdmin);
        }

        // 4. Initialize Enquiries
        $enquiriesPath = self::getFilePath('enquiries.json');
        if (!file_exists($enquiriesPath)) {
            self::writeJson('enquiries.json', []);
        }
    }

    /**
     * Package Methods
     */
    public static function getPackages(): array {
        self::initializeDefaults();
        return self::readJson('packages.json', []);
    }

    public static function savePackages(array $packages): bool {
        return self::writeJson('packages.json', $packages);
    }

    /**
     * Settings Methods
     */
    public static function getSettings(): array {
        self::initializeDefaults();
        return self::readJson('settings.json', []);
    }

    public static function saveSettings(array $settings): bool {
        return self::writeJson('settings.json', $settings);
    }

    /**
     * Enquiries Methods
     */
    public static function getEnquiries(): array {
        self::initializeDefaults();
        return self::readJson('enquiries.json', []);
    }

    public static function addEnquiry(array $enquiry): bool {
        $enquiries = self::getEnquiries();
        $enquiry['id'] = 'REQ-' . date('Ymd') . '-' . substr(bin2hex(random_bytes(4)), 0, 5);
        $enquiry['created_at'] = date('Y-m-d H:i:s');
        $enquiry['status'] = 'Baru (New)';
        
        // Add to the top of list
        array_unshift($enquiries, $enquiry);
        return self::writeJson('enquiries.json', $enquiries);
    }

    public static function updateEnquiryStatus(string $id, string $newStatus): bool {
        $enquiries = self::getEnquiries();
        $updated = false;
        foreach ($enquiries as &$item) {
            if ($item['id'] === $id) {
                $item['status'] = $newStatus;
                $updated = true;
                break;
            }
        }
        if ($updated) {
            return self::writeJson('enquiries.json', $enquiries);
        }
        return false;
    }

    public static function deleteEnquiry(string $id): bool {
        $enquiries = self::getEnquiries();
        $filtered = array_values(array_filter($enquiries, function($item) use ($id) {
            return $item['id'] !== $id;
        }));
        return self::writeJson('enquiries.json', $filtered);
    }

    /**
     * Admin Authentication Methods
     */
    public static function verifyAdmin(string $username, string $password): bool {
        self::initializeDefaults();
        $admin = self::readJson('admin.json', []);
        if (empty($admin) || empty($admin['username']) || empty($admin['password_hash'])) {
            return false;
        }

        if (hash_equals($admin['username'], $username) && password_verify($password, $admin['password_hash'])) {
            $admin['last_login'] = date('Y-m-d H:i:s');
            self::writeJson('admin.json', $admin);
            return true;
        }
        return false;
    }

    public static function updateAdminPassword(string $newPassword): bool {
        $admin = self::readJson('admin.json', []);
        $admin['password_hash'] = password_hash($newPassword, PASSWORD_BCRYPT);
        return self::writeJson('admin.json', $admin);
    }
}
