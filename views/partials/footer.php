</main> <?php // View dosyalarında açılan main etiketi kapanışı ?>

<footer class="footer">
    <div class="container mx-auto text-center">
        <div class="mb-4"> <a href="<?= BASE_PATH ?>/" class="text-xl font-semibold text-white">Turkelinet.com</a> </div>
        <div class="mb-4 space-x-4 text-sm"> <a href="<?= BASE_PATH ?>/" class="text-gray-400 hover:text-white">Ana Sayfa</a> <?php if (!empty($kategoriler)): ?> <?php foreach ($kategoriler as $kategori): ?> <a href="<?= BASE_PATH ?>/kategori/<?= htmlspecialchars($kategori['slug']) ?>" class="text-gray-400 hover:text-white"><?= htmlspecialchars($kategori['ad']) ?></a> <?php endforeach; ?> <?php endif; ?> <a href="<?= BASE_PATH ?>/genclik" class="text-gray-400 hover:text-white">Gençlik</a> <a href="<?= BASE_PATH ?>/rehber" class="text-gray-400 hover:text-white">Rehber</a> <a href="<?= BASE_PATH ?>/ilanlar" class="text-gray-400 hover:text-white">İlanlar</a> </div>
        <div class="mb-4 space-x-4"> <a href="<?= BASE_PATH ?>/hakkimizda" class="text-gray-400 hover:text-white text-xs">Hakkımızda</a> <a href="<?= BASE_PATH ?>/kunye" class="text-gray-400 hover:text-white text-xs">Künye</a> <a href="<?= BASE_PATH ?>/iletisim" class="text-gray-400 hover:text-white text-xs">İletişim</a> <a href="<?= BASE_PATH ?>/gizlilik-politikasi" class="text-gray-400 hover:text-white text-xs">Gizlilik Politikası</a> <a href="<?= BASE_PATH ?>/kullanim-sartlari" class="text-gray-400 hover:text-white text-xs">Kullanım Şartları</a> </div>
        <p class="text-xs text-gray-500">&copy; <?= date('Y') ?> Turkelinet.com - Tüm Hakları Saklıdır.</p>
        <div class="mt-4 space-x-2">
            <a href="#" class="footer-social-icon" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg> </a>
            <a href="#" class="footer-social-icon" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22 4s-.7 2.1-2 3.4c1.6 1.4 3.3 4.4 3.3 9.5C23.3 21.8 18 24 12.6 24c-7 0-10.7-3.3-10.7-8.5 0-4.6 3.6-8.8 7.8-10.1C8.9 4.8 8.1 4 8.1 4s2.1-.7 4.4 1.3c1.5-1 3.2-1.8 5.2-1.9z"/></svg> </a>
            <a href="#" class="footer-social-icon" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg> </a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.min.js"></script>

<script>
    // DOM tamamen yüklendikten sonra işlemleri yap
    document.addEventListener('DOMContentLoaded', (event) => {
        // Mobil menü toggle JS
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Lucide ikonlarını oluşturma
        try {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
                console.log("Lucide createIcons() çağrısı tamamlandı.");
            } else {
                console.error("DOMContentLoaded içinde bile 'lucide' nesnesi bulunamadı.");
            }
        } catch (e) {
            console.error("Lucide createIcons error:", e);
        }
    });
</script>
</body>
</html>
