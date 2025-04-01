<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';
?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">

            <article class="prose max-w-none">
                <?php // Ana Başlık ?>
                <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-6 border-b-2 border-blue-200 pb-3">
                    İletişim
                </h1>

                <p class="mb-6">Bizimle iletişime geçmek için aşağıdaki bilgileri kullanabilir veya iletişim formunu doldurabilirsiniz. Size en kısa sürede geri dönüş yapmaya çalışacağız.</p>

                <?php // İletişim Bilgileri Bölümü ?>
                <div class="mb-8 p-4 border rounded-lg bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">İletişim Bilgilerimiz</h2>
                    <div class="space-y-2 text-gray-700">
                        <p class="flex items-center">
                            <i data-lucide="map-pin" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                            <span>Adres: [Buraya Adresinizi Yazın], Türkeli / SİNOP</span>
                        </p>
                        <p class="flex items-center">
                            <i data-lucide="phone" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                            <a href="tel:+90XXXXXXXXXX" class="hover:text-blue-600">[+90 XXX XXX XX XX]</a> <?php // Telefon numaranızı yazın ?>
                        </p>
                        <p class="flex items-center">
                            <i data-lucide="mail" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                            <a href="mailto:info@turkelinet.com" class="text-blue-600 hover:underline">[info@turkelinet.com]</a> <?php // E-posta adresinizi yazın ?>
                        </p>
                        <p class="flex items-center">
                            <i data-lucide="clock" class="w-5 h-5 mr-2 text-gray-500 flex-shrink-0"></i>
                            <span>Çalışma Saatleri: [Örn: H.içi 09:00 - 18:00]</span>
                        </p>
                    </div>
                </div>

                <?php // İletişim Formu Bölümü ?>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-4">İletişim Formu</h2>
                    <form action="#" method="POST" class="space-y-4"> <?php // action="#" şimdilik bir yere göndermiyor ?>
                        <div>
                            <label for="ad_soyad" class="block text-sm font-medium text-gray-700 mb-1">Adınız Soyadınız</label>
                            <input type="text" name="ad_soyad" id="ad_soyad" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="eposta" class="block text-sm font-medium text-gray-700 mb-1">E-posta Adresiniz</label>
                            <input type="email" name="eposta" id="eposta" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="konu" class="block text-sm font-medium text-gray-700 mb-1">Konu</label>
                            <input type="text" name="konu" id="konu" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="mesaj" class="block text-sm font-medium text-gray-700 mb-1">Mesajınız</label>
                            <textarea name="mesaj" id="mesaj" rows="5" required
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Mesajı Gönder
                            </button>
                            <p class="text-xs text-gray-500 mt-2">* Bu form şu anda aktif değildir, gönderim işlemi yapmaz.</p>
                        </div>
                    </form>
                </div>

            </article>

        </div>

        <?php
        // Sidebar'ı dahil et
        require_once __DIR__ . '/../partials/sidebar.php';
        ?>

    </div>
</main>

<?php
// Footer'ı dahil et
require_once __DIR__ . '/../partials/footer.php';
?>
