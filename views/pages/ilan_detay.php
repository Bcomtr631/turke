<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// formatTarih ve formatFiyat fonksiyonları helpers.php'den geliyor

// index.php'den extract() ile gelen $ilan değişkenini burada kullanıyoruz.
if (empty($ilan)) {
    echo "<p class='text-center text-red-600 my-10'>İlan bilgileri yüklenemedi.</p>";
    require_once __DIR__ . '/../partials/footer.php'; // Footer'ı yine de dahil et
    exit; // Script'i sonlandır
}
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">

            <article>
                <div class="mb-4 text-sm">
                    <a href="<?= BASE_PATH ?>/ilanlar" class="text-blue-600 hover:underline font-medium">
                        ← Tüm İlanlar
                    </a>
                </div>

                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-2 leading-tight">
                    <?= htmlspecialchars($ilan['baslik']) ?>
                </h1>

                <div class="text-md text-gray-600 mb-4">
                    <span class="font-medium"><?= htmlspecialchars($ilan['kategori']) ?></span>
                    <?php if ($ilan['fiyat'] !== null && $ilan['fiyat'] > 0): ?>
                        <span class="text-xl font-bold text-blue-700 ml-4"><?= formatFiyat($ilan['fiyat']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="text-sm text-gray-500 mb-6 border-b pb-3">
                    <span>Yayınlanma: <?= formatTarih($ilan['created_at'], 'd.m.Y H:i') ?></span>
                </div>


                <?php if (!empty($ilan['resim_url'])): ?>
                    <figure class="mb-6">
                        <img src="<?= htmlspecialchars($ilan['resim_url'] ?? 'https://placehold.co/800x500/cccccc/666666?text=İlan+Resmi') ?>"
                             alt="<?= htmlspecialchars($ilan['baslik']) ?>"
                             class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow">
                    </figure>
                <?php endif; ?>

                <?php if (!empty($ilan['aciklama'])): ?>
                    <div class="prose max-w-none text-gray-800 leading-relaxed mb-6 border-t pt-4">
                        <h2 class="text-xl font-semibold mb-2">Açıklama</h2>
                        <?= nl2br(htmlspecialchars($ilan['aciklama'])) // Satır sonlarını <br>'ye çevir ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($ilan['iletisim_bilgisi'])): ?>
                    <div class="border-t pt-4 space-y-2 text-gray-700">
                        <h2 class="text-xl font-semibold mb-2">İletişim</h2>
                        <p class="flex items-center">
                            <i data-lucide="phone-call" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                            <span><?= htmlspecialchars($ilan['iletisim_bilgisi']) // Doğrudan iletişim bilgisini göster ?></span>
                        </p>
                        <p class="text-xs text-gray-500 mt-2">İlan sahibiyle iletişime geçerken Turkelinet.com'dan gördüğünüzü belirtebilirsiniz.</p>
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
