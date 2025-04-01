<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';

// Kategori verisini kontrol et (index.php'den $kategori olarak gelir)
if (empty($kategori)) {
    echo "<p class='text-center text-red-600 my-10'>Kategori bilgileri yüklenemedi.</p>";
    require_once __DIR__ . '/../partials/footer.php'; // Footer'ı yine de dahil et
    exit; // Script'i sonlandır
}

// index.php'den gelen sayfalama değişkenleri: $haberler, $currentPage, $totalPages
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3">

            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 pb-3 border-b">
                <?= htmlspecialchars($kategori['ad']) ?> Haberleri
            </h1>

            <?php if (!empty($haberler)): ?>
                <div class="space-y-6">
                    <?php foreach ($haberler as $haber): ?>
                        <div class="card flex flex-col md:flex-row">
                            <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="block md:w-1/3 flex-shrink-0">
                                <img src="<?= htmlspecialchars($haber['resim_url'] ?? 'https://placehold.co/300x200/cccccc/666666?text=Haber') ?>"
                                     alt="<?= htmlspecialchars($haber['resim_alt_metni'] ?? $haber['baslik']) ?>"
                                     class="w-full h-48 md:h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none">
                            </a>
                            <div class="card-content flex-1">
                                <div>
                                    <h3 class="font-semibold text-xl mb-2">
                                        <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="hover:text-blue-700">
                                            <?= htmlspecialchars($haber['baslik']) ?>
                                        </a>
                                    </h3>
                                    <?php if (!empty($haber['ozet'])): ?>
                                        <p class="text-gray-600 text-sm mb-3 leading-relaxed hidden sm:block">
                                            <?= htmlspecialchars($haber['ozet']) ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="card-footer flex justify-between items-center">
                                    <span class="text-xs text-gray-500">
                                        <?= formatTarih($haber['yayinlanma_tarihi']) // Fonksiyon helpers.php'den gelir ?>
                                    </span>
                                    <a href="<?= BASE_PATH ?>/haber/<?= htmlspecialchars($haber['slug']) ?>" class="text-blue-600 hover:underline font-medium text-sm">
                                        Oku →
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if (isset($totalPages) && $totalPages > 1): ?>
                    <nav aria-label="Sayfalama" class="mt-8 flex justify-center items-center space-x-1 sm:space-x-2">
                        <?php
                        // Temel URL (sayfa parametresi hariç)
                        $baseUrl = BASE_PATH . '/kategori/' . htmlspecialchars($kategori['slug']);
                        $queryString = $_GET; // Mevcut diğer GET parametrelerini al (varsa)
                        unset($queryString['sayfa']); // 'sayfa' parametresini çıkar
                        // Diğer parametreler varsa URL'e ekle
                        $baseUrl .= !empty($queryString) ? '?' . http_build_query($queryString) . '&' : '?';
                        ?>

                        <?php // Önceki Sayfa Linki ?>
                        <?php if ($currentPage > 1): ?>
                            <a href="<?= $baseUrl ?>sayfa=<?= $currentPage - 1 ?>"
                               class="px-3 py-1 border rounded-md text-sm font-medium text-gray-600 bg-white hover:bg-gray-100 transition-colors duration-150 ease-in-out">
                                &laquo; <span class="hidden sm:inline">Önceki</span>
                            </a>
                        <?php else: ?>
                            <span class="px-3 py-1 border rounded-md text-sm font-medium text-gray-400 bg-gray-100 cursor-not-allowed">
                                &laquo; <span class="hidden sm:inline">Önceki</span>
                            </span>
                        <?php endif; ?>

                        <?php
                        // Sayfa Numaraları (Optimize Edilmiş Gösterim)
                        $maxPagesToShow = 5; // Gösterilecek maksimum sayfa sayısı (ortada)
                        $startPage = max(1, $currentPage - floor($maxPagesToShow / 2));
                        $endPage = min($totalPages, $startPage + $maxPagesToShow - 1);
                        // Eğer sona çok yaklaşıldıysa, başlangıcı ayarla
                        if ($endPage - $startPage + 1 < $maxPagesToShow) {
                            $startPage = max(1, $endPage - $maxPagesToShow + 1);
                        }
                        ?>

                        <?php // İlk Sayfa ve "..." ?>
                        <?php if ($startPage > 1): ?>
                            <a href="<?= $baseUrl ?>sayfa=1"
                               class="px-3 py-1 border rounded-md text-sm font-medium text-gray-600 bg-white hover:bg-gray-100 transition-colors duration-150 ease-in-out">
                                1
                            </a>
                            <?php if ($startPage > 2): ?>
                                <span class="px-3 py-1 text-sm text-gray-500">...</span>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php // Ortadaki Sayfa Numaraları ?>
                        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                            <?php if ($i == $currentPage): ?>
                                <span aria-current="page"
                                      class="px-3 py-1 border border-blue-600 rounded-md text-sm font-medium text-white bg-blue-600 cursor-default">
                                    <?= $i ?>
                                </span>
                            <?php else: ?>
                                <a href="<?= $baseUrl ?>sayfa=<?= $i ?>"
                                   class="px-3 py-1 border rounded-md text-sm font-medium text-gray-600 bg-white hover:bg-gray-100 transition-colors duration-150 ease-in-out">
                                    <?= $i ?>
                                </a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php // Son Sayfa ve "..." ?>
                        <?php if ($endPage < $totalPages): ?>
                            <?php if ($endPage < $totalPages - 1): ?>
                                <span class="px-3 py-1 text-sm text-gray-500">...</span>
                            <?php endif; ?>
                            <a href="<?= $baseUrl ?>sayfa=<?= $totalPages ?>"
                               class="px-3 py-1 border rounded-md text-sm font-medium text-gray-600 bg-white hover:bg-gray-100 transition-colors duration-150 ease-in-out">
                                <?= $totalPages ?>
                            </a>
                        <?php endif; ?>


                        <?php // Sonraki Sayfa Linki ?>
                        <?php if ($currentPage < $totalPages): ?>
                            <a href="<?= $baseUrl ?>sayfa=<?= $currentPage + 1 ?>"
                               class="px-3 py-1 border rounded-md text-sm font-medium text-gray-600 bg-white hover:bg-gray-100 transition-colors duration-150 ease-in-out">
                                <span class="hidden sm:inline">Sonraki</span> &raquo;
                            </a>
                        <?php else: ?>
                            <span class="px-3 py-1 border rounded-md text-sm font-medium text-gray-400 bg-gray-100 cursor-not-allowed">
                                <span class="hidden sm:inline">Sonraki</span> &raquo;
                            </span>
                        <?php endif; ?>
                    </nav>
                <?php endif; ?>
            <?php else: ?>
                <p class="text-center text-gray-500 my-10">Bu kategoride henüz haber bulunmamaktadır.</p>
            <?php endif; ?>

        </div> <?php require_once __DIR__ . '/../partials/sidebar.php'; // Sidebar'ı dahil et ?>

    </div> </main>

<?php require_once __DIR__ . '/../partials/footer.php'; // Footer'ı dahil et ?>
