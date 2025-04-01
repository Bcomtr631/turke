<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// formatTarih() fonksiyon tanımı buradan kaldırıldı.
// Artık index.php'de dahil edilen helpers.php'den geliyor.

// Haber verisini kontrol et
if (empty($haber)) {
    echo "<p class='text-center text-red-600 my-10'>Haber bilgileri yüklenemedi.</p>";
    require_once __DIR__ . '/../partials/footer.php';
    exit;
}
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">

            <article>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    <?= htmlspecialchars($haber['baslik']) ?>
                </h1>

                <div class="text-sm text-gray-500 mb-6 border-b pb-3">
                    <?php if (!empty($haber['kategori_ad']) && !empty($haber['kategori_slug'])): ?>
                        <a href="<?= BASE_PATH ?>/kategori/<?= htmlspecialchars($haber['kategori_slug']) ?>" class="text-blue-600 hover:underline font-medium">
                            <?= htmlspecialchars($haber['kategori_ad']) ?>
                        </a>
                        <span class="mx-2">|</span>
                    <?php endif; ?>
                    <span>Yayınlanma: <?= formatTarih($haber['yayinlanma_tarihi'], 'd.m.Y H:i') // Fonksiyon çağrısı ?></span>
                </div>

                <?php if (!empty($haber['resim_url'])): ?>
                    <figure class="mb-6">
                        <img src="<?= htmlspecialchars($haber['resim_url']) ?>"
                             alt="<?= htmlspecialchars($haber['resim_alt_metni'] ?? $haber['baslik']) ?>"
                             class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow">
                    </figure>
                <?php endif; ?>

                <div class="prose max-w-none text-gray-800 leading-relaxed">
                    <?php echo $haber['icerik']; // İçerik HTML olabilir, güvenlik kontrolü kayıtta yapılmalı ?>
                </div>

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
