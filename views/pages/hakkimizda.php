<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">

            <article class="prose max-w-none">
                <?php // Ana Başlık (H1) - Daha büyük, renkli ve altı çizgili ?>
                <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-6 border-b-2 border-blue-200 pb-3">
                    Hakkımızda
                </h1>

                <p>Turkelinet.com, Sinop'un güzel ilçesi Türkeli'nin dijital dünyadaki buluşma noktasıdır. Amacımız, ilçe sakinlerini ve Türkeli'yi ziyaret edenleri güncel haberler, yerel işletme ve hizmet rehberi, etkinlikler ve sosyal etkileşim olanaklarıyla bir araya getiren kapsamlı bir platform sunmaktır.</p>

                <?php // Alt Başlıklar (H2) - Renkli, biraz daha kalın ve üst/alt boşlukları ayarlanmış ?>
                <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">
                    Vizyonumuz
                </h2>
                <p>Türkeli'nin sosyal, kültürel ve ekonomik yaşamına katkıda bulunan, güvenilir ve kolay erişilebilir bir bilgi kaynağı olmak.</p>

                <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">
                    Misyonumuz
                </h2>
                <ul class="list-disc pl-5 space-y-1">
                    <li>Türkeli ve çevresiyle ilgili en güncel ve doğru haberleri sunmak.</li>
                    <li>İlçedeki tüm işletmeleri, kurumları ve hizmetleri içeren kapsamlı bir rehber oluşturmak.</li>
                    <li>Yerel etkinlikleri duyurarak sosyal hayata katılımı teşvik etmek.</li>
                    <li>İlçe sakinlerinin birbirleriyle iletişim kurabileceği ve fikir alışverişinde bulunabileceği bir platform sağlamak.</li>
                    <li>Türkeli'nin tanıtımına katkıda bulunmak.</li>
                </ul>

                <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">
                    Değerlerimiz
                </h2>
                <p>Doğruluk, tarafsızlık, yerellik, erişilebilirlik ve topluma katkı temel değerlerimizdir.</p>

                <hr class="mt-8">

                <p class="mt-4"><em>Bu platform, Türkeli sevdalıları tarafından geliştirilmektedir. Öneri ve görüşleriniz bizim için değerlidir.</em></p>
                <?php // İletişim sayfasına link eklenebilir ?>
                <p class="mt-4"><a href="<?= BASE_PATH ?>/iletisim" class="text-blue-600 hover:underline">Bizimle İletişime Geçin</a></p>

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
