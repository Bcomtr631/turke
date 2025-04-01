<?php

// Uygulama Rotaları Tanımlaması

if (!defined('APP_NAME')) { define('APP_NAME', 'Turkelinet.com'); }

return [
    // Statik Sayfalar
    '/' => [ 'view' => 'home', 'title' => APP_NAME . ' - Ana Sayfa', 'action' => 'home' ],
    'hakkimizda' => [ 'view' => 'hakkimizda', 'title' => 'Hakkımızda - ' . APP_NAME, 'action' => 'static_page' ],
    'iletisim' => [ 'view' => 'iletisim', 'title' => 'İletişim - ' . APP_NAME, 'action' => 'static_page' ],
    'kunye' => [ 'view' => 'kunye', 'title' => 'Künye - ' . APP_NAME, 'action' => 'static_page' ],
    'gizlilik-politikasi' => [ 'view' => 'gizlilik_politikasi', 'title' => 'Gizlilik Politikası - ' . APP_NAME, 'action' => 'static_page' ],
    'kullanim-sartlari' => [ 'view' => 'kullanim_sartlari', 'title' => 'Kullanım Şartları - ' . APP_NAME, 'action' => 'static_page' ],

    // Dinamik Sayfalar (Haberler)
    'haber/{slug}' => [ 'view' => 'news_detail', 'title' => 'Haber Detayı - ' . APP_NAME, 'action' => 'haber_detay' ],
    'kategori/{slug}' => [ 'view' => 'category_news', 'title' => 'Kategori Haberleri - ' . APP_NAME, 'action' => 'haber_kategori' ],

    // Dinamik Sayfalar (Rehber)
    'rehber' => [ 'view' => 'guide_index', 'title' => 'Türkeli Rehberi - ' . APP_NAME, 'action' => 'rehber_index' ],
    'rehber/{kategori_slug}' => [ 'view' => 'guide_category', 'title' => 'Rehber Kategorisi - ' . APP_NAME, 'action' => 'rehber_kategori' ],
    'rehber/{kategori_slug}/{giris_slug}' => [ 'view' => 'guide_entry_detail', 'title' => 'Rehber Detayı - ' . APP_NAME, 'action' => 'rehber_detay' ],

    // Dinamik Sayfalar (Etkinlikler)
    'etkinlikler' => [ 'view' => 'etkinlikler', 'title' => 'Etkinlikler - ' . APP_NAME, 'action' => 'etkinlikler_index' ],
    'etkinlik/{slug}' => [ 'view' => 'etkinlik_detay', 'title' => 'Etkinlik Detayı - ' . APP_NAME, 'action' => 'etkinlik_detay' ],

    // Dinamik Sayfalar (İlanlar)
    'ilanlar' => [
        'view' => 'ilanlar',
        'title' => 'İlanlar - ' . APP_NAME,
        'action' => 'ilanlar_index'
    ],
    'ilan/{ilan_id}' => [ // <<<=== YENİ İLAN DETAY ROTASI (ID ile)
        'view' => 'ilan_detay',
        'title' => 'İlan Detayı - ' . APP_NAME, // Başlık action içinde güncellenecek
        'action' => 'ilan_detay'
    ],

    // Diğer dinamik rotalar buraya eklenebilir...
    // 'forum' => [...],

    // 404 Rotası
    // '404' => ['view' => '404', 'title' => 'Sayfa Bulunamadı', 'action' => 'not_found']

];

?>
'/' => [ 'view' => 'home', 'title' => APP_NAME . ' - Ana Sayfa', 'action' => 'home' ],