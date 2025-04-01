<?php
// Header'ı dahil et
require_once __DIR__ . '/../partials/header.php';


?>

<main class="container mx-auto px-4 mt-6">
    <div class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-md">

            <article>
                <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-4 border-b-2 border-blue-200 pb-3">
                    Türkeli Rehberi
                </h1>

                <p class="mb-8 text-gray-700 leading-relaxed">
                    Türkeli ilçesindeki işletmeleri, kurumları, önemli yerleri ve hizmetleri keşfedin! Aşağıdaki kategorilerden birini seçerek veya arama çubuğunu kullanarak aradığınız bilgiye kolayca ulaşabilirsiniz.
                </p>

                <div class="relative mb-10">
                    <input type="text"
                           placeholder="Restoran, otel, eczane, kurum adı veya anahtar kelime ile arayın..."
                           class="w-full pl-5 pr-12 py-3 text-base rounded-full border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200 ease-in-out"
                           aria-label="Rehberde Ara">
                    <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 pointer-events-none">
                         <i data-lucide="search" class="w-5 h-5"></i>
                    </span>
                    <p class="text-xs text-gray-500 mt-2 pl-2">* Arama özelliği yakında aktif olacaktır.</p>
                </div>

                <?php if (!empty($rehber_kategorileri)): // Kontrol bu değişkene göre yapılıyor ?>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <?php
                        $renk_siniflari = ['blue' => 'text-blue-500', 'green' => 'text-green-500', 'yellow' => 'text-yellow-500', 'red' => 'text-red-500', 'rose' => 'text-rose-500', 'indigo' => 'text-indigo-500', 'purple' => 'text-purple-500', 'cyan' => 'text-cyan-500', 'gray' => 'text-gray-500', 'slate' => 'text-slate-500', 'activity' => 'text-red-600'];
                        ?>
                        <?php foreach ($rehber_kategorileri as $rk): // Döngü bu değişkeni kullanıyor ?>
                            <?php
                            $ikon_renk_adi = $rk['renk'] ?? ($rk['slug'] === 'eczaneler' ? 'red' : 'gray');
                            $ikon_renk_sinifi = $renk_siniflari[$ikon_renk_adi] ?? 'text-gray-500';
                            ?>
                            <a href="<?= BASE_PATH ?>/rehber/<?= htmlspecialchars($rk['slug']) ?>" class="guide-card border border-gray-100 hover:shadow-lg hover:border-blue-200">
                                <i data-lucide="<?= htmlspecialchars($rk['ikon'] ?? 'help-circle') ?>"
                                   class="<?= $ikon_renk_sinifi ?> w-10 h-10 mb-2"></i>
                                <h4 class="font-medium text-base"><?= htmlspecialchars($rk['ad']) ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-center">Rehber kategorileri bulunamadı.</p> <?php // Bu mesaj görünüyor ?>
                <?php endif; ?>

            </article>

        </div> <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

    </div> </main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
