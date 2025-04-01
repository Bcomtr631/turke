<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// formatTarih ve formatFiyat fonksiyonları helpers.php'den geliyor

// index.php'den extract() ile gelen $ilanlar değişkenini burada kullanıyoruz.
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3">

            <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-6 border-b-2 border-blue-200 pb-3">
                İlanlar
            </h1>

            <div class="mb-6 p-4 bg-gray-100 rounded-lg flex flex-wrap gap-4 items-center">
                <span class="font-medium text-gray-700">Filtrele:</span>
                <select class="p-2 border border-gray-300 rounded-md text-sm">
                    <option>Tüm Kategoriler</option>
                    <option>Emlak</option>
                    <option>Vasıta</option>
                    <option>İkinci El</option>
                    <option>İş İlanları</option>
                </select>
                <input type="text" placeholder="Anahtar kelime..." class="p-2 border border-gray-300 rounded-md text-sm flex-grow">
                <button class="p-2 bg-blue-600 text-white rounded-md text-sm hover:bg-blue-700">Ara</button>
            </div>


            <?php if (!empty($ilanlar)): ?>
                <div class="space-y-5">
                    <?php foreach ($ilanlar as $ilan): ?>
                        <?php // İlan linki oluşturuldu (/ilan/id) ?>
                        <?php $ilan_link = BASE_PATH . '/ilan/' . $ilan['id']; ?>
                        <div class="card flex flex-col sm:flex-row overflow-hidden">
                            <?php if (!empty($ilan['resim_url'])): ?>
                                <a href="<?= $ilan_link ?>" class="block sm:w-1/4 flex-shrink-0 bg-gray-200">
                                    <img src="<?= htmlspecialchars($ilan['resim_url'] ?? 'https://placehold.co/300x200/cccccc/666666?text=İlan') ?>"
                                         alt="<?= htmlspecialchars($ilan['baslik']) ?>"
                                         class="w-full h-40 sm:h-full object-cover">
                                </a>
                            <?php endif; ?>

                            <div class="card-content flex-1 <?php if (empty($ilan['resim_url'])) echo 'sm:w-full'; ?>">
                                <div class="mb-2">
                                    <span class="text-xs font-medium bg-gray-200 text-gray-700 px-2 py-0.5 rounded">
                                        <?= htmlspecialchars($ilan['kategori']) // İlan kategorisi ?>
                                    </span>
                                </div>
                                <h3 class="font-semibold text-lg mb-1">
                                    <a href="<?= $ilan_link ?>" class="hover:text-blue-700">
                                        <?= htmlspecialchars($ilan['baslik']) // İlan başlığı ?>
                                    </a>
                                </h3>
                                <?php if (!empty($ilan['aciklama'])): ?>
                                    <p class="text-gray-600 text-sm mb-3 leading-relaxed">
                                        <?= htmlspecialchars(mb_substr(strip_tags($ilan['aciklama']), 0, 100)) . (mb_strlen(strip_tags($ilan['aciklama'])) > 100 ? '...' : '') // Kısa açıklama ?>
                                    </p>
                                <?php endif; ?>
                                <div class="flex flex-wrap justify-between items-center text-sm mt-auto pt-2 border-t border-gray-100">
                                    <span class="text-gray-500 text-xs">
                                        <i data-lucide="calendar-days" class="inline-block w-3 h-3 mr-1 relative -top-px"></i>
                                        <?= formatTarih($ilan['created_at'], 'd.m.Y') // Yayınlanma tarihi ?>
                                    </span>
                                    <?php if ($ilan['fiyat'] !== null && $ilan['fiyat'] > 0): ?>
                                        <span class="font-semibold text-blue-600">
                                            <?= formatFiyat($ilan['fiyat']) // Fiyat (formatlı) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="mt-2">
                                    <a href="<?= $ilan_link ?>" class="text-blue-600 hover:underline font-medium text-xs">Detayları Gör →</a> <?php // Detay linki ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php // TODO: Sayfalama (Pagination) eklenebilir ?>
            <?php else: ?>
                <p class="text-center text-gray-500 my-10">Gösterilecek ilan bulunmamaktadır.</p>
            <?php endif; ?>

        </div> <?php require_once __DIR__ . '/../partials/sidebar.php'; // Sidebar'ı dahil et ?>

    </div> </main>

<?php require_once __DIR__ . '/../partials/footer.php'; // Footer'ı dahil et ?>
