<?php require_once __DIR__ . '/../partials/header.php'; ?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">
        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">
            <article class="prose max-w-none">
                <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-6 border-b-2 border-blue-200 pb-3">
                    Gizlilik Politikası
                </h1>

                <p>Son Güncelleme: [Tarih]</p>

                <p>Turkelinet.com olarak kişisel verilerinizin gizliliğine saygı duyuyor ve önem veriyoruz. Bu gizlilik politikası, web sitemizi ziyaret ettiğinizde hangi kişisel bilgileri topladığımızı, bu bilgileri nasıl kullandığımızı, kimlerle paylaştığımızı ve haklarınızı açıklamaktadır.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">Topladığımız Bilgiler</h2>
                <p>Sitemizi ziyaret ettiğinizde otomatik olarak veya bize sağladığınızda aşağıdaki türde bilgileri toplayabiliriz:</p>
                <ul>
                    <li><strong>Log Kayıtları:</strong> IP adresiniz, tarayıcı türünüz, ziyaret ettiğiniz sayfalar, ziyaret tarihi ve saati gibi standart web sunucusu günlük bilgileri.</li>
                    <li><strong>Çerezler (Cookies):</strong> Sitemizi daha verimli kullanmanızı sağlamak ve tercihlerinizi hatırlamak için çerezler kullanabiliriz. Çerez politikamız hakkında daha fazla bilgi için [Çerez Politikası Sayfasına Link].</li>
                    <li><strong>İletişim Formu Bilgileri:</strong> İletişim formu aracılığıyla bize gönderdiğiniz adınız, e-posta adresiniz ve mesajınız gibi bilgiler.</li>
                    <li><strong>Yorum Bilgileri:</strong> (Eğer yorum özelliği aktifse) Yorum yaparken girdiğiniz ad, e-posta ve yorum içeriği.</li>
                    <li><strong>Kullanıcı Hesap Bilgileri:</strong> (Eğer üyelik sistemi aktifse) Üye olurken veya profilinizi güncellerken sağladığınız bilgiler.</li>
                </ul>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">Bilgileri Nasıl Kullanıyoruz?</h2>
                <p>Topladığımız bilgileri aşağıdaki amaçlarla kullanabiliriz:</p>
                <ul>
                    <li>Web sitemizi işletmek, sürdürmek ve iyileştirmek.</li>
                    <li>Size daha iyi hizmet sunmak ve kullanıcı deneyimini kişiselleştirmek.</li>
                    <li>Sorularınıza ve taleplerinize yanıt vermek.</li>
                    <li>Yasal yükümlülüklere uymak.</li>
                    <li>Site güvenliğini sağlamak ve kötüye kullanımı önlemek.</li>
                    <li>(İzninizle) Size bültenler veya promosyon materyalleri göndermek.</li>
                </ul>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">Bilgilerin Paylaşımı</h2>
                <p>Kişisel bilgilerinizi yasal zorunluluklar veya sizin açık izniniz olmadıkça üçüncü taraflarla paylaşmayız. Ancak, hizmet sağlayıcılarımız (hosting, analiz vb.) hizmetlerini yerine getirebilmek için bu bilgilere erişebilirler.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">Veri Güvenliği</h2>
                <p>Kişisel bilgilerinizin güvenliğini sağlamak için makul teknik ve idari önlemler alıyoruz. Ancak internet üzerinden veri iletiminin %100 güvenli olmadığını unutmayınız.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">Haklarınız</h2>
                <p>Kişisel verilerinizle ilgili olarak erişim, düzeltme, silme ve işleme itiraz etme gibi haklara sahipsiniz. Bu haklarınızı kullanmak için bizimle iletişime geçebilirsiniz.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">Gizlilik Politikasındaki Değişiklikler</h2>
                <p>Bu gizlilik politikasını zaman zaman güncelleyebiliriz. Değişiklikler bu sayfada yayınlanacaktır. Politikayı düzenli olarak gözden geçirmenizi öneririz.</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-3">İletişim</h2>
                <p>Gizlilik politikamızla ilgili sorularınız için lütfen <a href="<?= BASE_PATH ?>/iletisim" class="text-blue-600 hover:underline">iletişim sayfamızı</a> ziyaret edin.</p>

            </article>
        </div>
        <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
