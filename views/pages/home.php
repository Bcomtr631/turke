<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// formatTarih() fonksiyonu helpers.php'den geliyor
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3">

            <section id="manset" class="mb-8">
                <?php // isset kontrolü kaldırıldı, !empty yeterli ?>
                <?php if (!empty($manset_haber)): ?>
                    <div class="card mb-6">
                        <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($manset_haber['slug']) ?>">
                            <img src="<?= htmlspecialchars($manset_haber['resim_url'] ?? 'https://placehold.co/800x400/007bff/white?text=Manşet') ?>"
                                 alt="<?= htmlspecialchars($manset_haber['resim_alt_metni'] ?? $manset_haber['baslik']) ?>"
                                 class="w-full h-64 object-cover">
                        </a>
                        <div class="card-content">
                            <div>
                                <?php if(!empty($manset_haber['kategori_ad'])): ?>
                                    <span class="text-xs text-gray-500 mb-1 block">
                                 <?= htmlspecialchars(strtoupper($manset_haber['kategori_ad'])) ?> - <?= formatTarih($manset_haber['yayinlanma_tarihi']) // Fonksiyon çağrısı ?>
                             </span>
                                <?php endif; ?>
                                <h2 class="font-bold text-2xl mb-2">
                                    <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($manset_haber['slug']) ?>" class="hover:text-blue-700">
                                        <?= htmlspecialchars($manset_haber['baslik']) ?>
                                    </a>
                                </h2>
                                <?php if(!empty($manset_haber['ozet'])): ?>
                                    <p class="text-gray-600 text-sm mb-3 leading-relaxed">
                                        <?= htmlspecialchars($manset_haber['ozet']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer">
                                <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($manset_haber['slug']) ?>" class="text-blue-600 hover:underline font-medium text-sm">
                                    Devamını Oku &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; // Manşet haberi yoksa hiçbir şey gösterme (veya mesaj) ?>

                <?php // isset kontrolü kaldırıldı ?>
                <?php if (!empty($ikincil_mansetler)): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($ikincil_mansetler as $haber): ?>
                            <div class="card">
                                <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>">
                                    <img src="<?= htmlspecialchars($haber['resim_url'] ?? 'https://placehold.co/600x350/cccccc/333333?text=Haber') ?>"
                                         alt="<?= htmlspecialchars($haber['resim_alt_metni'] ?? $haber['baslik']) ?>"
                                         class="w-full h-48 object-cover">
                                </a>
                                <div class="card-content">
                                    <h3 class="font-semibold text-lg mb-1">
                                        <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="hover:text-blue-700">
                                            <?= htmlspecialchars($haber['baslik']) ?>
                                        </a>
                                    </h3>
                                    <div class="card-footer">
                                        <?php if(!empty($haber['kategori_ad'])): ?>
                                            <span class="text-xs text-gray-500">
                                     <?= htmlspecialchars(strtoupper($haber['kategori_ad'])) ?>
                                 </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

            <section id="nobetci-eczane" class="mb-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative shadow" role="alert">
                <strong class="font-bold block sm:inline"><i data-lucide="alert-triangle" class="inline-block w-5 h-5 mr-1 relative -top-px"></i> Nöbetçi Eczane</strong>
                <span class="block sm:inline ml-2">
                    <?php echo "Bugünün nöbetçi eczanesi bilgisi çok yakında burada olacak."; // Yer tutucu mesaj ?>
                </span>
                <a href="<?= BASE_PATH ?>/rehber/eczaneler" class="text-xs text-red-800 hover:underline font-medium block sm:inline sm:float-right mt-2 sm:mt-0">
                    Tüm Eczaneler &rarr;
                </a>
            </section>

            <section id="rehber" class="mb-8 bg-white p-6 rounded-lg shadow-md">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                    <h2 class="section-title !border-b-0 !pb-0 !mb-0">Türkeli Rehberi</h2>
                    <div class="relative mt-3 md:mt-0 w-full md:w-1/2">
                        <input type="text" placeholder="Rehberde Ara (Restoran, Eczane, Kurum...)" class="w-full pl-5 pr-12 py-3 text-base rounded-full border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200 ease-in-out" aria-label="Rehberde Ara">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 pointer-events-none">
                             <i data-lucide="search" class="w-5 h-5"></i> <?php // Arama ikonu ?>
                        </span>
                        <p class="text-xs text-gray-500 mt-2 pl-2">* Arama özelliği yakında aktif olacaktır.</p>
                    </div>
                </div>
                <?php // isset kontrolü kaldırıldı ($rehber_kategorileri_all olarak geliyor) ?>
                <?php if (!empty($rehber_kategorileri_all)): ?>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        <?php
                        // Renkleri Tailwind sınıflarına eşleştir
                        $renk_siniflari = ['blue' => 'text-blue-500', 'green' => 'text-green-500', 'yellow' => 'text-yellow-500', 'red' => 'text-red-500', 'rose' => 'text-rose-500', 'indigo' => 'text-indigo-500', 'purple' => 'text-purple-500', 'cyan' => 'text-cyan-500', 'gray' => 'text-gray-500', 'slate' => 'text-slate-500', 'activity' => 'text-red-600'];
                        ?>
                        <?php foreach ($rehber_kategorileri_all as $rk): ?>
                            <?php
                            // Kategori için renk sınıfını belirle
                            $ikon_renk_adi = $rk['renk'] ?? ($rk['slug'] === 'eczaneler' ? 'red' : 'gray');
                            $ikon_renk_sinifi = $renk_siniflari[$ikon_renk_adi] ?? 'text-gray-500';
                            ?>
                            <a href="<?= BASE_PATH ?>/rehber/<?= htmlspecialchars($rk['slug']) ?>" class="guide-card border border-gray-100 hover:shadow-lg hover:border-blue-200">
                                <i data-lucide="<?= htmlspecialchars($rk['ikon'] ?? 'help-circle') ?>" class="<?= $ikon_renk_sinifi ?> w-10 h-10 mb-2"></i> <?php // Dinamik ikon ve renk ?>
                                <h4 class="font-medium text-base"><?= htmlspecialchars($rk['ad']) ?></h4> <?php // Kategori adı ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center mt-6">
                        <a href="<?= BASE_PATH ?>/rehber" class="btn btn-secondary btn-sm">Tüm Rehber</a> <?php // Tüm rehber linki ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-center">Rehber kategorileri bulunamadı.</p>
                <?php endif; ?>
            </section>

            <section id="turkeli" class="mb-8">
                <h2 class="section-title">Türkeli'den Haberler</h2>
                <?php // isset kontrolü kaldırıldı ?>
                <?php if (!empty($turkeli_haberleri)): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php foreach ($turkeli_haberleri as $haber): ?>
                            <div class="card">
                                <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>">
                                    <img src="<?= htmlspecialchars($haber['resim_url'] ?? 'https://placehold.co/400x250/6f42c1/white?text=Türkeli') ?>"
                                         alt="<?= htmlspecialchars($haber['resim_alt_metni'] ?? $haber['baslik']) ?>"
                                         class="w-full h-40 object-cover">
                                </a>
                                <div class="card-content">
                                    <h3 class="font-semibold text-base mb-1">
                                        <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="hover:text-blue-700">
                                            <?= htmlspecialchars($haber['baslik']) ?>
                                        </a>
                                    </h3>
                                    <div class="card-footer">
                                 <span class="text-xs text-gray-500">
                                     <?= formatTarih($haber['yayinlanma_tarihi']) // Tarihi formatla ?>
                                 </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center mt-6">
                        <a href="<?= BASE_PATH ?>/kategori/turkeli-ozel" class="btn btn-secondary btn-sm">Tüm Türkeli Haberleri</a> <?php // Kategori linki ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500">Bu kategoride haber bulunamadı.</p>
                <?php endif; ?>
            </section>

            <section id="genclik" class="mb-8">
                <h2 class="youth-section-title">
                    <i data-lucide="rocket" class="inline-block w-6 h-6 mr-2 align-middle text-orange-500"></i>Gençlik Köşesi
                </h2>
                <?php // isset kontrolü kaldırıldı ?>
                <?php if (!empty($genclik_haberleri)): ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <?php foreach($genclik_haberleri as $haber): ?>
                            <div class="card">
                                <?php if(!empty($haber['resim_url'])): ?>
                                    <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>">
                                        <img src="<?= htmlspecialchars($haber['resim_url']) ?>"
                                             alt="<?= htmlspecialchars($haber['resim_alt_metni'] ?? $haber['baslik']) ?>"
                                             class="w-full h-40 object-cover">
                                    </a>
                                <?php endif; ?>
                                <div class="card-content">
                                    <h3 class="font-semibold text-base mb-1">
                                        <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="hover:text-blue-700">
                                            <?= htmlspecialchars($haber['baslik']) ?>
                                        </a>
                                    </h3>
                                    <?php if (!empty($haber['ozet'])): ?>
                                        <p class="text-gray-600 text-xs mb-3 leading-relaxed">
                                            <?= htmlspecialchars(mb_substr(strip_tags($haber['ozet']), 0, 80)) . (mb_strlen(strip_tags($haber['ozet'])) > 80 ? '...' : '') // Özeti kısalt ?>
                                        </p>
                                    <?php endif; ?>
                                    <div class="card-footer flex justify-between items-center">
                                 <span class="text-xs text-gray-500">
                                     <?= formatTarih($haber['yayinlanma_tarihi'], 'd.m.Y') // Tarihi formatla ?>
                                 </span>
                                        <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="text-xs text-orange-600 hover:underline font-medium">Oku &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center mt-6">
                        <a href="<?= BASE_PATH ?>/kategori/genclik" class="btn btn-secondary btn-sm bg-orange-500 hover:bg-orange-600 border-orange-500">Tüm Gençlik Haberleri</a> <?php // Gençlik kategorisi linki ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-center p-4 bg-gray-50 rounded">Gençlik kategorisinde gösterilecek içerik bulunamadı.</p>
                <?php endif; ?>
            </section>

            <section id="ekonomi" class="mb-8">
                <h2 class="section-title">Ekonomi Haberleri</h2>
                <?php if (!empty($ekonomi_haberleri)): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php foreach ($ekonomi_haberleri as $haber): ?>
                            <div class="card">
                                <a href="<?= htmlspecialchars(BASE_PATH) ?>/haber/<?= htmlspecialchars($haber['slug']) ?>">
                                    <img src="<?= htmlspecialchars($haber['resim_url'] ?? 'https://placehold.co/400x250/17a2b8/white?text=Eko') ?>"
                                         alt="<?= htmlspecialchars($haber['resim_alt_metni'] ?? $haber['baslik']) ?>"
                                         class="w-full h-48 object-cover">
                                </a>
                                <div class="card-content">
                                    <h3 class="font-semibold text-base mb-1">
                                        <a href="<?= htmlspecialchars(BASE_PATH) ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="hover:text-blue-700">
                                            <?= htmlspecialchars($haber['baslik']) ?>
                                        </a>
                                    </h3>
                                    <?php if (!empty($haber['ozet'])): ?>
                                        <p class="text-gray-600 text-xs mb-2">
                                            <?= htmlspecialchars(mb_substr($haber['ozet'], 0, 100)) . (mb_strlen($haber['ozet']) > 100 ? '...' : '') ?>
                                        </p>
                                    <?php endif; ?>
                                    <div class="card-footer">
                            <span class="text-xs text-gray-500">
                                <?= formatTarih($haber['yayinlanma_tarihi']) ?>
                            </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center mt-6">
                        <a href="<?= htmlspecialchars(BASE_PATH) ?>/kategori/ekonomi" class="btn btn-secondary btn-sm">
                            Tüm Ekonomi Haberleri
                        </a>
                    </div>
                <?php else: ?>
                    <div class="bg-gray-50 p-6 rounded-lg text-center">
                        <i data-lucide="alert-circle" class="w-8 h-8 mx-auto text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Ekonomi kategorisinde henüz haber bulunmamaktadır.</p>
                    </div>
                <?php endif; ?>
            </section>

        </div> <?php require_once __DIR__ . '/../partials/sidebar.php'; // Sidebar'ı dahil et ?>

    </div> </main>

<?php require_once __DIR__ . '/../partials/footer.php'; // Footer'ı dahil et ?>
