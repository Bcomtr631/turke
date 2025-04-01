<?php
// index.php'de dahil edilen helpers.php'deki fonksiyonlar burada kullanılacak
// formatTarih() ve formatFiyat() tanımları burada YOKTUR.

// index.php'den extract() ile gelen değişkenleri burada kullanıyoruz:
// $sidebar_son_haberler, $sidebar_etkinlikler, $sidebar_ilanlar
?>
<aside class="w-full lg:w-1/3">

    <section id="son-haberler" class="mb-6 bg-white p-4 rounded-lg shadow-sm">
        <h3 class="sidebar-title border-b pb-2 mb-3">Son Haberler</h3>
        <?php if (!empty($sidebar_son_haberler)): ?>
            <div class="space-y-2">
                <?php foreach ($sidebar_son_haberler as $haber): ?>
                    <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="news-list-item group">
                        <h5 class="group-hover:text-blue-600 text-sm font-medium leading-tight"><?= htmlspecialchars($haber['baslik']) ?></h5>
                        <?php if (!empty($haber['kategori_ad'])): ?>
                            <span class="text-xs text-gray-500"><?= htmlspecialchars(strtoupper($haber['kategori_ad'])) ?></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-gray-500">Gösterilecek haber bulunamadı.</p>
        <?php endif; ?>
    </section>

    <section id="reklam-1" class="mb-6">
        <div class="bg-gray-200 h-48 flex items-center justify-center rounded-lg text-gray-500">
            Reklam Alanı (300x250)
        </div>
    </section>

    <section id="etkinlikler" class="mb-6 bg-white p-4 rounded-lg shadow-sm">
        <h3 class="sidebar-title border-b pb-2 mb-3">Yaklaşan Etkinlikler</h3>
        <?php if (!empty($sidebar_etkinlikler)): ?>
            <div class="space-y-3">
                <?php foreach ($sidebar_etkinlikler as $etkinlik): ?>
                    <?php // Etkinlik linki (slug varsa detay sayfasına gider) ?>
                    <a href="<?= isset($etkinlik['slug']) ? BASE_PATH . '/etkinlik/' . htmlspecialchars($etkinlik['slug']) : '#' ?>" class="news-list-item group">
                        <h5 class="group-hover:text-blue-600 text-sm font-medium leading-tight mb-1"><?= htmlspecialchars($etkinlik['ad']) ?></h5>
                        <span class="text-xs text-gray-500 block">
                            <i data-lucide="calendar-days" class="inline-block w-3 h-3 mr-1 relative -top-[1px]"></i>
                            <?= formatTarih($etkinlik['baslangic_tarihi'], 'd.m.Y H:i') // Fonksiyon helpers.php'den gelir ?>
                        </span>
                        <?php if (!empty($etkinlik['yer'])): ?>
                            <span class="text-xs text-gray-500 block">
                                <i data-lucide="map-pin" class="inline-block w-3 h-3 mr-1 relative -top-[1px]"></i>
                                <?= htmlspecialchars($etkinlik['yer']) ?>
                            </span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="mt-4">
                <a href="<?= BASE_PATH ?>/etkinlikler" class="text-xs text-blue-600 hover:underline font-medium">Tüm Etkinlikler &rarr;</a>
            </div>
        <?php else: ?>
            <p class="text-sm text-gray-500">Yaklaşan etkinlik bulunmamaktadır.</p>
        <?php endif; ?>
    </section>

    <section id="ilanlar" class="mb-6 bg-white p-4 rounded-lg shadow-sm">
        <h3 class="sidebar-title border-b pb-2 mb-3">Son İlanlar</h3>
        <?php if (!empty($sidebar_ilanlar)): ?>
            <div class="space-y-2">
                <?php foreach ($sidebar_ilanlar as $ilan): ?>
                    <?php // DEĞİŞİKLİK: İlan linki ID ile güncellendi ?>
                    <a href="<?= BASE_PATH ?>/ilan/<?= $ilan['id'] ?>" class="news-list-item group">
                        <h5 class="group-hover:text-blue-600 text-sm font-medium leading-tight"><?= htmlspecialchars($ilan['baslik']) ?></h5>
                        <span class="text-xs text-gray-500">
                            <?= htmlspecialchars($ilan['kategori']) ?>
                            <?php if ($ilan['fiyat'] !== null && $ilan['fiyat'] > 0): ?>
                                - <?= formatFiyat($ilan['fiyat']) // Fonksiyon helpers.php'den gelir ?>
                            <?php endif; ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="mt-4">
                <a href="<?= BASE_PATH ?>/ilanlar" class="text-xs text-blue-600 hover:underline font-medium">Tüm İlanlar &rarr;</a>
            </div>
        <?php else: ?>
            <p class="text-sm text-gray-500">Gösterilecek ilan bulunamadı.</p>
        <?php endif; ?>
    </section>

    <section id="forum-ozet" class="mb-6 bg-white p-4 rounded-lg shadow-sm">
        <h3 class="sidebar-title border-b pb-2 mb-3">Forumdan Başlıklar</h3>
        <div class="space-y-2">
            <a href="#" class="news-list-item group"> <h5 class="group-hover:text-blue-600 text-sm font-medium leading-tight">İlçemizdeki internet altyapısı hakkında...</h5> <span class="text-xs text-gray-500">Teknoloji - Ahmet Y.</span> </a>
            <a href="#" class="news-list-item group"> <h5 class="group-hover:text-blue-600 text-sm font-medium leading-tight">Hafta sonu piknik için en güzel yerler?</h5> <span class="text-xs text-gray-500">Sosyal - Ayşe G.</span> </a>
        </div>
        <div class="mt-4"> <a href="<?= BASE_PATH ?>/forum" class="text-xs text-blue-600 hover:underline font-medium">Foruma Git &rarr;</a> </div>
    </section>

    <section id="reklam-2" class="mb-6"> <div class="bg-gray-200 h-32 flex items-center justify-center rounded-lg text-gray-500"> Reklam Alanı (300x100) </div> </section>

</aside>
