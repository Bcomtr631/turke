<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// index.php'den extract() ile gelen $rehber_giris değişkenini burada kullanıyoruz.
if (empty($rehber_giris)) {
    echo "<p class='text-center text-red-600 my-10'>Rehber girişi bulunamadı.</p>";
    require_once __DIR__ . '/../partials/footer.php';
    exit;
}

// Telefon numarasını link için temizle
$telefon_link = $rehber_giris['telefon'] ? preg_replace('/[^0-9+]/', '', $rehber_giris['telefon']) : null;

// Web sitesi linkini kontrol et/düzelt
$web_sitesi_link = $rehber_giris['web_sitesi'];
if ($web_sitesi_link && !preg_match("~^(?:f|ht)tps?://~i", $web_sitesi_link)) {
    $web_sitesi_link = "http://" . $web_sitesi_link;
}

// Harita linki oluştur (Google Maps)
$harita_link = null;
$enlem = $rehber_giris['enlem'] ?? null;
$boylam = $rehber_giris['boylam'] ?? null;
$harita_goster = is_numeric($enlem) && is_numeric($boylam); // Harita gösterilip gösterilmeyeceğini kontrol et

if ($harita_goster) {
    // Google Maps linki için formatlama (virgül yerine nokta kullanabilir)
    $enlem_nokta = str_replace(',', '.', $enlem);
    $boylam_nokta = str_replace(',', '.', $boylam);
    $harita_link = "https://www.google.com/maps?q=" . urlencode($enlem_nokta . ',' . $boylam_nokta);
} elseif (!empty($rehber_giris['adres'])) {
    $harita_link = "https://www.google.com/maps?q=" . urlencode($rehber_giris['adres'] . ', Türkeli, Sinop');
}

// Leaflet CSS'i ekleyelim (Sadece bu sayfada gerektiği için buraya ekliyoruz,
// genel bir asset yönetimi ile header'a taşınabilir)
if ($harita_goster) {
    echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>';
}
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">

            <article>
                <?php if (!empty($rehber_giris['kategori_ad']) && !empty($rehber_giris['kategori_slug'])): ?>
                    <div class="mb-2 text-sm">
                        <a href="<?= BASE_PATH ?>/rehber/<?= htmlspecialchars($rehber_giris['kategori_slug']) ?>" class="text-blue-600 hover:underline font-medium">
                            ← <?= htmlspecialchars($rehber_giris['kategori_ad']) ?> Kategorisine Geri Dön
                        </a>
                    </div>
                <?php endif; ?>

                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    <?= htmlspecialchars($rehber_giris['ad']) ?>
                </h1>

                <?php if (!empty($rehber_giris['resim_url'])): ?>
                    <figure class="mb-6">
                        <img src="<?= htmlspecialchars($rehber_giris['resim_url']) ?>"
                             alt="<?= htmlspecialchars($rehber_giris['ad']) ?>"
                             class="w-full h-auto max-h-[400px] object-cover rounded-lg shadow">
                    </figure>
                <?php endif; ?>

                <?php if (!empty($rehber_giris['aciklama'])): ?>
                    <div class="prose max-w-none text-gray-800 leading-relaxed mb-6 border-t pt-4">
                        <h2 class="text-xl font-semibold mb-2">Açıklama</h2>
                        <?= nl2br(htmlspecialchars($rehber_giris['aciklama'])) ?>
                    </div>
                <?php endif; ?>

                <div class="border-t pt-4 space-y-2 text-gray-700">
                    <h2 class="text-xl font-semibold mb-2">İletişim Bilgileri</h2>
                    <?php if (!empty($rehber_giris['adres'])): ?>
                        <p class="flex items-start">
                            <i data-lucide="map-pin" class="w-5 h-5 mr-2 mt-1 text-gray-500 flex-shrink-0"></i>
                            <span>
                                <?= htmlspecialchars($rehber_giris['adres']) ?>
                                <?php if ($harita_link): ?>
                                    <a href="<?= htmlspecialchars($harita_link) ?>" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline text-xs ml-1">[Haritada Göster]</a>
                                <?php endif; ?>
                            </span>
                        </p>
                    <?php endif; ?>
                    <?php if ($telefon_link): ?>
                        <p class="flex items-center">
                            <i data-lucide="phone" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                            <a href="tel:<?= htmlspecialchars($telefon_link) ?>" class="hover:text-blue-600"><?= htmlspecialchars($rehber_giris['telefon']) ?></a>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($rehber_giris['eposta'])): ?>
                        <p class="flex items-center">
                            <i data-lucide="mail" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                            <a href="mailto:<?= htmlspecialchars($rehber_giris['eposta']) ?>" class="text-blue-600 hover:underline"><?= htmlspecialchars($rehber_giris['eposta']) ?></a>
                        </p>
                    <?php endif; ?>
                    <?php if ($web_sitesi_link): ?>
                        <p class="flex items-center">
                            <i data-lucide="globe" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                            <a href="<?= htmlspecialchars($web_sitesi_link) ?>" target="_blank" rel="noopener nofollow" class="text-blue-600 hover:underline">
                                <?= htmlspecialchars($rehber_giris['web_sitesi']) ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if ($harita_goster): ?>
                    <div class="mt-6 border-t pt-4">
                        <h2 class="text-xl font-semibold mb-3">Konum</h2>
                        <div id="mapid" style="height: 350px; width: 100%;" class="rounded shadow z-0"></div>
                        <?php // Leaflet JS'i burada ekleyelim (footer'a taşımak daha iyi olabilir) ?>
                        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                        <script>
                            // Haritayı başlat
                            var map = L.map('mapid').setView([<?= $enlem ?>, <?= $boylam ?>], 15); // 15 zoom seviyesi

                            // Harita katmanını ekle (OpenStreetMap)
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);

                            // İşaretleyici (Marker) ekle
                            var marker = L.marker([<?= $enlem ?>, <?= $boylam ?>]).addTo(map);

                            // İşaretleyiciye popup ekle (opsiyonel)
                            marker.bindPopup("<b><?= htmlspecialchars(addslashes($rehber_giris['ad'])) ?></b>").openPopup();

                            // Harita render sorunlarını önlemek için küçük bir gecikme ile boyut kontrolü (bazen gerekebilir)
                            setTimeout(function() {
                                map.invalidateSize();
                            }, 100);
                        </script>
                    </div>
                <?php endif; ?>

            </article>

        </div> <?php
        // Sidebar'ı dahil et
        require_once __DIR__ . '/../partials/sidebar.php';
        ?>

    </div> </main>

<?php
// Footer'ı dahil et
require_once __DIR__ . '/../partials/footer.php';
?>
