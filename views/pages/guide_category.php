<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// Tarih formatlama fonksiyonu
if (!function_exists('formatTarih')) {
    function formatTarih($tarihStr, $format = 'd.m.Y') { // Varsayılan format eklendi
        try {
            $tarih = new DateTime($tarihStr);
            return $tarih->format($format);
        } catch (Exception $e) {
            return $tarihStr; // Hata olursa orijinal string'i döndür
        }
    }
}

// Kategori verisini kontrol et (index.php'den $rehber_kategori olarak gelir)
if (empty($rehber_kategori)) {
    echo "<p class='text-center text-red-600 my-10'>Kategori bilgileri yüklenemedi.</p>";
    require_once __DIR__ . '/../partials/footer.php'; // Footer'ı yine de dahil et
    exit; // Script'i sonlandır
}
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3">

            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 pb-3 border-b">
                <i data-lucide="<?= htmlspecialchars($rehber_kategori['ikon'] ?? 'help-circle') ?>" class="inline-block w-7 h-7 mr-2 align-middle"></i>
                <?= htmlspecialchars($rehber_kategori['ad']) ?> - Türkeli Rehberi
            </h1>

            <?php if (!empty($rehber_girisleri)): ?>
                <div class="space-y-5">
                    <?php foreach ($rehber_girisleri as $giris): ?>
                        <div class="card flex flex-col sm:flex-row">
                            <?php
                            // Detay sayfası linki
                            $detay_link = BASE_PATH . '/rehber/' . htmlspecialchars($rehber_kategori['slug']) . '/' . htmlspecialchars($giris['slug']);
                            ?>
                            <?php // Giriş resmi varsa göster ?>
                            <?php if (!empty($giris['resim_url'])): ?>
                                <a href="<?= $detay_link ?>" class="block sm:w-1/4 flex-shrink-0"> <img src="<?= htmlspecialchars($giris['resim_url'] ?? 'https://placehold.co/300x200/cccccc/666666?text=Mekan') ?>"
                                                                                                        alt="<?= htmlspecialchars($giris['ad']) ?>"
                                                                                                        class="w-full h-40 sm:h-full object-cover rounded-t-lg sm:rounded-l-lg sm:rounded-t-none">
                                </a>
                            <?php endif; ?>

                            <div class="card-content flex-1">
                                <h3 class="font-semibold text-xl mb-2">
                                    <a href="<?= $detay_link ?>" class="hover:text-blue-700"> <?= htmlspecialchars($giris['ad']) ?>
                                    </a>
                                </h3>
                                <?php if (!empty($giris['aciklama'])): ?>
                                    <p class="text-gray-600 text-sm mb-3 leading-relaxed">
                                        <?php // Kısa açıklama gösterilebilir, tamamı detayda ?>
                                        <?= htmlspecialchars(mb_substr(strip_tags($giris['aciklama']), 0, 120)) . (mb_strlen(strip_tags($giris['aciklama'])) > 120 ? '...' : '') ?>
                                    </p>
                                <?php endif; ?>
                                <div class="text-sm text-gray-700 space-y-1 mt-auto">
                                    <?php if (!empty($giris['adres'])): ?>
                                        <p><i data-lucide="map-pin" class="inline-block w-4 h-4 mr-1 text-gray-500"></i> <?= htmlspecialchars($giris['adres']) ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($giris['telefon'])): ?>
                                        <p><i data-lucide="phone" class="inline-block w-4 h-4 mr-1 text-gray-500"></i> <?= htmlspecialchars($giris['telefon']) ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($giris['web_sitesi'])): ?>
                                        <p><i data-lucide="globe" class="inline-block w-4 h-4 mr-1 text-gray-500"></i>
                                            <?php
                                            // Web sitesi linkini kontrol et/düzelt
                                            $web_sitesi_link_cat = $giris['web_sitesi'];
                                            if ($web_sitesi_link_cat && !preg_match("~^(?:f|ht)tps?://~i", $web_sitesi_link_cat)) {
                                                $web_sitesi_link_cat = "http://" . $web_sitesi_link_cat;
                                            }
                                            ?>
                                            <a href="<?= htmlspecialchars($web_sitesi_link_cat) ?>" target="_blank" rel="noopener nofollow" class="text-blue-600 hover:underline">
                                                Web Sitesi
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                    <div class="pt-2">
                                        <a href="<?= $detay_link ?>" class="text-blue-600 hover:underline font-medium text-xs"> Detayları Gör →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center text-gray-500 my-10">Bu kategoride henüz kayıtlı yer bulunmamaktadır.</p>
            <?php endif; ?>

        </div> <?php
        // Sidebar'ı dahil et
        require_once __DIR__ . '/../partials/sidebar.php';
        ?>

    </div> </main>

<?php
// Footer'ı dahil et
require_once __DIR__ . '/../partials/footer.php';
?>
