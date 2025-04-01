<?php require_once __DIR__ . '/../partials/header.php'; ?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">
        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">
            <article class="prose max-w-none">
                <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-6 border-b-2 border-blue-200 pb-3">
                    Künye
                </h1>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">İmtiyaz Sahibi / Grantee</h2>
                <p>[Adınız Soyadınız veya Şirket Adı]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Genel Yayın Yönetmeni / Editor in Chief</h2>
                <p>[Ad Soyad]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Sorumlu Yazı İşleri Müdürü / Managing Editor</h2>
                <p>[Ad Soyad]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Editörler / Editors</h2>
                <p>[Ad Soyad]</p>
                <p>[Ad Soyad]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Gece Vardiyası Editörü / Night Shift Editor</h2>
                <p>[Ad Soyad]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Hukuk Danışmanı / Legal Counsel</h2>
                <p>Av. [Ad Soyad] - [Baro Sicil No]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Mali Müşavir / Financial Advisor</h2>
                <p>[Ad Soyad]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Reklam / Advertising</h2>
                <p><a href="mailto:reklam@turkelinet.com" class="text-blue-600 hover:underline">[reklam@turkelinet.com]</a></p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">İletişim Bilgileri</h2>
                <p><strong>Adres:</strong> [Adresiniz] Türkeli / SİNOP</p>
                <p><strong>Telefon:</strong> [Telefon Numaranız]</p>
                <p><strong>E-posta:</strong> [info@turkelinet.com]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Yazılım ve Sistem Yönetimi</h2>
                <p>[Yazılım Sağlayıcı Adı veya "Turkelinet Ekibi"]</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-2">Yer Sağlayıcı / Hosting Provider</h2>
                <p>[Hosting Firmanızın Adı]</p>
                <p><em>[Hosting Firmanızın İletişim Bilgileri veya Web Sitesi]</em></p>

                <hr class="mt-8">
                <p class="text-sm text-gray-600 mt-4">Sitede yayınlanan yazılar ve yorumlardan yazarları sorumludur. Sitedeki tüm harici linkler ayrı bir sayfada açılır. Turkelinet.com, harici linklerin sorumluluğunu almaz.</p>
                <p class="text-sm text-gray-600 mt-2">Gizlilik politikamız için <a href="<?= BASE_PATH ?>/gizlilik-politikasi" class="text-blue-600 hover:underline">tıklayınız</a>.</p>

            </article>
        </div>
        <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
