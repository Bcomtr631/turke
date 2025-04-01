<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// formatTarih fonksiyonu helpers.php'den geliyor

// index.php'den extract() ile gelen $etkinlik değişkenini burada kullanıyoruz.
if (empty($etkinlik)) {
    echo "<p class='text-center text-red-600 my-10'>Etkinlik bilgileri yüklenemedi.</p>";
    require_once __DIR__ . '/../partials/footer.php';
    exit;
}

// Harita linki oluştur (Google Maps - sadece yer varsa)
$etkinlik_harita_link = null;
if (!empty($etkinlik['yer'])) {
    $etkinlik_harita_link = "https://www.google.com/maps?q=" . urlencode($etkinlik['yer'] . ', Türkeli, Sinop');
}

?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">

            <article>
                <div class="mb-4 text-sm">
                    <a href="<?= BASE_PATH ?>/etkinlikler" class="text-blue-600 hover:underline font-medium">
                        ← Tüm Etkinlikler
                    </a>
                </div>

                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    <?= htmlspecialchars($etkinlik['ad']) ?>
                </h1>

                <div class="text-md text-gray-600 mb-6 border-b pb-4 space-y-1">
                    <p class="flex items-center">
                        <i data-lucide="calendar-days" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                        <span>
                            <?= formatTarih($etkinlik['baslangic_tarihi'], 'd.m.Y H:i') ?>
                            <?php if (!empty($etkinlik['bitis_tarihi'])): ?>
                                - <?= formatTarih($etkinlik['bitis_tarihi'], 'd.m.Y H:i') ?>
                            <?php endif; ?>
                        </span>
                    </p>
                    <?php if (!empty($etkinlik['yer'])): ?>
                        <p class="flex items-start">
                            <i data-lucide="map-pin" class="w-5 h-5 mr-2 mt-1 text-gray-500 flex-shrink-0"></i>
                            <span>
                                <?= htmlspecialchars($etkinlik['yer']) ?>
                                <?php if ($etkinlik_harita_link): ?>
                                    <a href="<?= htmlspecialchars($etkinlik_harita_link) ?>" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline text-xs ml-1">[Haritada Göster]</a>
                                <?php endif; ?>
                            </span>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if (!empty($etkinlik['resim_url'])): ?>
                    <figure class="mb-6">
                        <img src="<?= htmlspecialchars($etkinlik['resim_url']) ?>"
                             alt="<?= htmlspecialchars($etkinlik['ad']) ?>"
                             class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow">
                    </figure>
                <?php endif; ?>

                <?php if (!empty($etkinlik['aciklama'])): ?>
                    <div class="prose max-w-none text-gray-800 leading-relaxed">
                        <h2 class="text-xl font-semibold mb-2">Etkinlik Hakkında</h2>
                        <?= nl2br(htmlspecialchars($etkinlik['aciklama'])) ?>
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
