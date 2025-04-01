<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// formatTarih fonksiyonu helpers.php'den geliyor

// index.php'den extract() ile gelen $etkinlikler değişkenini burada kullanıyoruz.
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3">

            <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-6 border-b-2 border-blue-200 pb-3">
                Etkinlikler
            </h1>

            <?php if (!empty($etkinlikler)): ?>
                <div class="space-y-6">
                    <?php foreach ($etkinlikler as $etkinlik): ?>
                        <?php // Etkinlik linki oluşturuldu (slug varsa) ?>
                        <?php $etkinlik_link = isset($etkinlik['slug']) ? BASE_PATH . '/etkinlik/' . htmlspecialchars($etkinlik['slug']) : '#'; ?>
                        <div class="card flex flex-col md:flex-row overflow-hidden">
                            <?php // Etkinlik resmi varsa göster ?>
                            <?php if (!empty($etkinlik['resim_url'])): ?>
                                <a href="<?= $etkinlik_link ?>" class="block md:w-1/4 flex-shrink-0 bg-gray-200">
                                    <img src="<?= htmlspecialchars($etkinlik['resim_url']) ?>"
                                         alt="<?= htmlspecialchars($etkinlik['ad']) ?>"
                                         class="w-full h-48 md:h-full object-cover">
                                </a>
                            <?php endif; ?>

                            <div class="card-content flex-1 <?php if (empty($etkinlik['resim_url'])) echo 'md:w-full'; // Resim yoksa tam genişlik ?>">
                                <h3 class="font-semibold text-xl mb-2">
                                    <a href="<?= $etkinlik_link ?>" class="hover:text-blue-700">
                                        <?= htmlspecialchars($etkinlik['ad']) ?>
                                    </a>
                                </h3>

                                <?php if (!empty($etkinlik['aciklama'])): ?>
                                    <p class="text-gray-600 text-sm mb-3 leading-relaxed">
                                        <?= nl2br(htmlspecialchars(mb_substr(strip_tags($etkinlik['aciklama']), 0, 150))) . (mb_strlen(strip_tags($etkinlik['aciklama'])) > 150 ? '...' : '') // Kısa açıklama ?>
                                    </p>
                                <?php endif; ?>

                                <div class="text-sm text-gray-500 space-y-1 mt-auto pt-2 border-t border-gray-100">
                                    <p>
                                        <i data-lucide="calendar" class="inline-block w-4 h-4 mr-1 relative -top-px"></i>
                                        <?= formatTarih($etkinlik['baslangic_tarihi'], 'd.m.Y H:i') // Tam tarih ve saat ?>
                                        <?php if (!empty($etkinlik['bitis_tarihi'])): ?>
                                            - <?= formatTarih($etkinlik['bitis_tarihi'], 'd.m.Y H:i') ?>
                                        <?php endif; ?>
                                    </p>
                                    <?php if (!empty($etkinlik['yer'])): ?>
                                        <p>
                                            <i data-lucide="map-pin" class="inline-block w-4 h-4 mr-1 relative -top-px"></i>
                                            <?= htmlspecialchars($etkinlik['yer']) ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <?php if (isset($etkinlik['slug'])): // Slug varsa detay linki göster ?>
                                    <div class="mt-3">
                                        <a href="<?= $etkinlik_link ?>" class="text-blue-600 hover:underline font-medium text-xs">Detaylar →</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center text-gray-500 my-10">Gösterilecek etkinlik bulunmamaktadır.</p>
            <?php endif; ?>

        </div> <?php require_once __DIR__ . '/../partials/sidebar.php'; // Sidebar'ı dahil et ?>

    </div> </main>

<?php require_once __DIR__ . '/../partials/footer.php'; // Footer'ı dahil et ?>
