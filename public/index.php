<?php

// Temel dosyaları dahil et
require_once '../config/config.php'; // HABER_PER_PAGE artık buradan geliyor
require_once '../src/Core/Database.php';
require_once '../src/Lib/helpers.php'; // Yardımcı fonksiyonlar
$routes = require_once '../config/routes.php';
use App\Core\Database;

// Veritabanı bağlantısını al
try {
    $dbInstance = Database::getInstance();
    $db = $dbInstance->getConnection();
} catch (PDOException $e) {
    // Gerçek bir uygulamada loglama yapılmalı
    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        die("Veritabanı bağlantısı kurulamadı: " . $e->getMessage());
    } else {
        die("Sistemde bir hata oluştu. Lütfen daha sonra tekrar deneyin.");
    }
}

// --- Genel Veriler (Tüm sayfalarda gerekebilir) ---
$sql_kategoriler = "SELECT ad, slug FROM kategoriler ORDER BY ad ASC"; $stmt_kategoriler = $dbInstance->query($sql_kategoriler); $kategoriler = $stmt_kategoriler ? $stmt_kategoriler->fetchAll() : [];
$sql_rehber_kategorileri = "SELECT ad, slug, ikon, renk FROM rehber_kategorileri ORDER BY sira ASC, ad ASC"; $stmt_rehber_kategorileri = $dbInstance->query($sql_rehber_kategorileri); $rehber_kategorileri_all = $stmt_rehber_kategorileri ? $stmt_rehber_kategorileri->fetchAll() : [];
$sql_sidebar_haberler = "SELECT h.baslik, h.slug, k.ad as kategori_ad FROM haberler h LEFT JOIN kategoriler k ON h.kategori_id = k.id WHERE h.durum = 1 ORDER BY h.yayinlanma_tarihi DESC LIMIT 5"; $stmt_sidebar_haberler = $dbInstance->query($sql_sidebar_haberler); $sidebar_son_haberler = $stmt_sidebar_haberler ? $stmt_sidebar_haberler->fetchAll() : [];
$sql_sidebar_etkinlikler = "SELECT ad, slug, baslangic_tarihi, yer FROM etkinlikler WHERE durum = 1 AND baslangic_tarihi >= CURDATE() ORDER BY baslangic_tarihi ASC LIMIT 3"; $stmt_sidebar_etkinlikler = $dbInstance->query($sql_sidebar_etkinlikler); $sidebar_etkinlikler = $stmt_sidebar_etkinlikler ? $stmt_sidebar_etkinlikler->fetchAll() : [];
$sql_sidebar_ilanlar = "SELECT id, baslik, kategori, fiyat FROM ilanlar WHERE durum = 1 ORDER BY created_at DESC LIMIT 3"; $stmt_sidebar_ilanlar = $dbInstance->query($sql_sidebar_ilanlar); $sidebar_ilanlar = $stmt_sidebar_ilanlar ? $stmt_sidebar_ilanlar->fetchAll() : [];

// --- Yönlendirme (Routing) Mantığı ---
$request_uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); $route_path = '/'; if (defined('BASE_PATH') && BASE_PATH !== '/' && strpos($request_uri_path, BASE_PATH) === 0) { $route_path = substr($request_uri_path, strlen(BASE_PATH)); } elseif (defined('BASE_PATH') && BASE_PATH === '/') { $route_path = $request_uri_path; } if (empty($route_path)) { $route_path = '/'; } if ($route_path !== '/') { $route_path = trim($route_path, '/'); }
$uri_parts = ($route_path === '/' || $route_path === '') ? ['home'] : explode('/', $route_path);
$controller = $uri_parts[0] ?: 'home'; $param1 = $uri_parts[1] ?? null; $param2 = $uri_parts[2] ?? null;

// Yönlendirme (Routing) Mantığı - Düzeltilmiş versiyon
$matched_route = null;
$params = [];

foreach ($routes as $pattern => $route_info) {
    // Özel parametreleri (id gibi) değiştir
    $pattern_regex = str_replace('/', '\/', $pattern);
    $pattern_regex = preg_replace('/\{([a-zA-Z_]+id)\}/', '(?<$1>\d+)', $pattern_regex);
    $pattern_regex = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?<$1>[a-zA-Z0-9-]+)', $pattern_regex);

    // Regex desenini oluştur
    $pattern_regex = '#^' . $pattern_regex . '$#';

    if (preg_match($pattern_regex, $route_path, $matches)) {
        $matched_route = $route_info;

        // Parametreleri al
        foreach ($matches as $key => $value) {
            if (is_string($key)) {
                $params[$key] = $value;
            }
        }
        break;
    }
}
$pageTitle = $matched_route['title'] ?? APP_NAME; $metaDescription = $matched_route['meta_description'] ?? 'Türkeli haber, rehber ve yaşam portalı.'; $view_to_load = $matched_route['view']; $action = $matched_route['action'] ?? 'static_page';
$view_data = [ 'kategoriler' => $kategoriler, 'rehber_kategorileri' => $rehber_kategorileri_all, 'sidebar_son_haberler' => $sidebar_son_haberler, 'sidebar_etkinlikler' => $sidebar_etkinlikler, 'sidebar_ilanlar' => $sidebar_ilanlar, 'params' => $params ];

// --- Action'a Göre Özel Veri Çekme ve Ayarları Güncelleme ---
try {
    switch ($action) {
        case 'home':
            // Manşet haberini çek (en son eklenen ve manşete çıkarılan)
            $sql_manset = "SELECT h.*, k.ad as kategori_ad 
                   FROM haberler h 
                   LEFT JOIN kategoriler k ON h.kategori_id = k.id 
                   WHERE h.durum = 1 AND h.manset = 1 
                   ORDER BY h.yayinlanma_tarihi DESC 
                   LIMIT 1";
            $stmt_manset = $dbInstance->query($sql_manset);
            $manset_haber = $stmt_manset ? $stmt_manset->fetch() : null;

            // İkincil manşetler (son 3 haber)
            $sql_ikincil_manset = "SELECT h.*, k.ad as kategori_ad 
                           FROM haberler h 
                           LEFT JOIN kategoriler k ON h.kategori_id = k.id 
                           WHERE h.durum = 1 
                           ORDER BY h.yayinlanma_tarihi DESC 
                           LIMIT 3";
            $stmt_ikincil_manset = $dbInstance->query($sql_ikincil_manset);
            $ikincil_mansetler = $stmt_ikincil_manset ? $stmt_ikincil_manset->fetchAll() : [];

            // Türkeli haberleri (kategoriye göre)
            $sql_turkeli = "SELECT h.*, k.ad as kategori_ad 
                    FROM haberler h 
                    LEFT JOIN kategoriler k ON h.kategori_id = k.id 
                    WHERE h.durum = 1 AND k.slug = 'turkeli-ozel' 
                    ORDER BY h.yayinlanma_tarihi DESC 
                    LIMIT 6";
            $stmt_turkeli = $dbInstance->query($sql_turkeli);
            $turkeli_haberleri = $stmt_turkeli ? $stmt_turkeli->fetchAll() : [];

            // Gençlik haberleri
            $sql_genclik = "SELECT h.*, k.ad as kategori_ad 
                    FROM haberler h 
                    LEFT JOIN kategoriler k ON h.kategori_id = k.id 
                    WHERE h.durum = 1 AND k.slug = 'genclik' 
                    ORDER BY h.yayinlanma_tarihi DESC 
                    LIMIT 3";
            $stmt_genclik = $dbInstance->query($sql_genclik);
            $genclik_haberleri = $stmt_genclik ? $stmt_genclik->fetchAll() : [];

            // Ekonomi haberleri
            $sql_ekonomi = "SELECT h.*, k.ad as kategori_ad 
                    FROM haberler h 
                    LEFT JOIN kategoriler k ON h.kategori_id = k.id 
                    WHERE h.durum = 1 AND k.slug = 'ekonomi' 
                    ORDER BY h.yayinlanma_tarihi DESC 
                    LIMIT 4";
            $stmt_ekonomi = $dbInstance->query($sql_ekonomi);
            $ekonomi_haberleri = $stmt_ekonomi ? $stmt_ekonomi->fetchAll() : [];

            // View verilerini güncelle
            $view_data['manset_haber'] = $manset_haber;
            $view_data['ikincil_mansetler'] = $ikincil_mansetler;
            $view_data['turkeli_haberleri'] = $turkeli_haberleri;
            $view_data['genclik_haberleri'] = $genclik_haberleri;
            $view_data['ekonomi_haberleri'] = $ekonomi_haberleri;
            break;

        case 'rehber_index': /* ... */ break;
        case 'rehber_kategori': /* ... */ break;
        case 'rehber_detay': /* ... */ break;
        case 'etkinlikler_index': /* ... */ break;
        case 'etkinlik_detay': /* ... */ break;
        case 'ilanlar_index': /* ... */ break;
        case 'ilan_detay': /* ... */ break;
        case 'static_page': break;
        case 'not_found': default: if ($action !== 'not_found') { error_log("Bilinmeyen action: " . $action); } throw new Exception("Sayfa bulunamadı.", 404); break;
    }
    // Not: Yukarıdaki case bloklarının içindeki tam kodlar önceki yanıtlarda mevcuttur.
} catch (Exception $e) { /* ... Hata yakalama bloğu ... */ }

// --- View Yükleme ---
$view_path = "../views/pages/{$view_to_load}.php";
if (file_exists($view_path)) { extract($view_data); $_pageTitle = $pageTitle; $_metaDescription = $metaDescription; require_once $view_path; } else { http_response_code(500); echo "Kritik Hata: Gösterilecek sayfa şablonu bulunamadı ('{$view_path}')."; }


?>
