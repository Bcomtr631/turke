<?php

// Veritabanı Bağlantı Bilgileri
define('DB_HOST', 'localhost');
define('DB_NAME', 'turkelinet_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Uygulama Ayarları
define('APP_NAME', 'Turkelinet.com');
define('BASE_PATH', '/turkelinet.com/public'); // Kendi kurulumunuza göre kontrol edin!
define('BASE_URL', 'http://localhost' . BASE_PATH);

// Sayfalama Ayarı
define('HABER_PER_PAGE', 10); // Kategori sayfalarında sayfa başına gösterilecek haber sayısı (Bu satır olmalı)

// Hata Raporlama Ayarı
define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// Zaman Dilimi Ayarı
date_default_timezone_set('Europe/Istanbul');

?>
