<?php require_once __DIR__ . '/../partials/header.php'; ?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">
        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">
            <article class="prose max-w-none">
                <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-6 border-b-2 border-blue-200 pb-3">
                    Kullanım Şartları
                </h1>

                <p>Son Güncelleme: [Tarih]</p>

                <p>Lütfen Turkelinet.com web sitesini ("Site") kullanmadan önce bu Kullanım Şartları'nı dikkatlice okuyunuz. Siteye erişerek veya Site'yi kullanarak, bu Kullanım Şartları'na yasal olarak bağlı olduğunuzu kabul etmiş sayılırsınız.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">1. Site Kullanımı</h2>
                <p>Site'yi yalnızca yasal amaçlarla ve diğer kullanıcıların haklarını ihlal etmeyecek şekilde kullanmayı kabul edersiniz. Yasaklanmış davranışlar arasında taciz etmek, rahatsızlık vermek, müstehcen veya saldırgan içerik iletmek veya Site'deki normal diyalog akışını bozmak yer alır.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">2. Fikri Mülkiyet</h2>
                <p>Site'de yer alan tüm içerik (metinler, grafikler, logolar, ikonlar, resimler, ses klipleri, dijital indirmeler, veri derlemeleri ve yazılım dahil ancak bunlarla sınırlı olmamak üzere) Turkelinet.com'un veya içerik sağlayıcılarının mülkiyetindedir ve uluslararası telif hakkı yasalarıyla korunmaktadır.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">3. Kullanıcı İçeriği</h2>
                <p>(Eğer yorum, forum gibi özellikler aktifse) Site'ye gönderdiğiniz veya yüklediğiniz herhangi bir içerikten (yorumlar, mesajlar vb.) siz sorumlusunuz. Yasa dışı, tehdit edici, hakaret içeren, küçük düşürücü, müstehcen veya başka bir şekilde sakıncalı içerik göndermemeyi kabul edersiniz. Turkelinet.com, herhangi bir kullanıcı içeriğini önceden bildirimde bulunmaksızın kaldırma veya düzenleme hakkını saklı tutar ancak bunu yapma yükümlülüğü altında değildir.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">4. Sorumluluğun Reddi</h2>
                <p>Site ve içeriği "olduğu gibi" sunulmaktadır. Turkelinet.com, Site'nin kesintisiz veya hatasız olacağına, kusurların düzeltileceğine veya Site'yi barındıran sunucunun virüslerden veya hatalardan arınmış olacağına dair açık veya zımni hiçbir garanti vermez. İçeriğin doğruluğu, güvenilirliği veya başka bir özelliği hakkında hiçbir beyanda bulunmayız.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">5. Harici Bağlantılar</h2>
                <p>Site, üçüncü taraf web sitelerine bağlantılar içerebilir. Bu bağlantılar yalnızca size kolaylık sağlamak amacıyla verilmiştir. Bu sitelerin içeriğinden veya uygulamalarından Turkelinet.com sorumlu değildir.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">6. Kullanım Şartlarındaki Değişiklikler</h2>
                <p>Bu Kullanım Şartları'nı zaman zaman değiştirme hakkını saklı tutarız. Değişiklikler bu sayfada yayınlanacaktır. Site'yi kullanmaya devam etmeniz, değiştirilmiş şartları kabul ettiğiniz anlamına gelir.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">7. Geçerli Hukuk</h2>
                <p>Bu Kullanım Şartları Türkiye Cumhuriyeti yasalarına tabi olacak ve bu yasalara göre yorumlanacaktır.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">İletişim</h2>
                <p>Kullanım Şartları ile ilgili sorularınız için lütfen <a href="<?= BASE_PATH ?>/iletisim" class="text-blue-600 hover:underline">iletişim sayfamızı</a> ziyaret edin.</p>

            </article>
        </div>
        <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
