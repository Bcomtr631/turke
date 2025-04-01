<?php
// Header'ı dahil et (Genel veriler $view_data'dan gelir, index.php'de extract edilir)
require_once __DIR__ . '/../partials/header.php';
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md text-center">

            <h1 class="text-6xl font-bold text-red-500 mb-4">404</h1>
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 mb-4">Sayfa Bulunamadı</h2>
            <p class="text-gray-600 mb-6">
                Aradığınız sayfa mevcut değil, taşınmış veya silinmiş olabilir.
                <?php if (isset($error_message) && defined('DEBUG_MODE') && DEBUG_MODE): ?>
                    <br><span class="text-xs text-red-400">(Hata Detayı: <?= htmlspecialchars($error_message) ?>)</span>
                <?php endif; ?>
            </p>
            <a href="<?= BASE_PATH ?>/" class="inline-block px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition-colors">
                Ana Sayfaya Dön
            </a>

        </div> <?php
        // Sidebar'ı dahil et
        require_once __DIR__ . '/../partials/sidebar.php';
        ?>

    </div> </main>

<?php
// Footer'ı dahil et
require_once __DIR__ . '/../partials/footer.php';
?>
