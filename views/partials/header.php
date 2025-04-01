<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_pageTitle ?? $pageTitle ?? 'Turkelinet.com' ?></title> <meta name="description" content="<?= $_metaDescription ?? $metaDescription ?? 'Türkeli haber, rehber ve yaşam portalı.' ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ... Stiller aynı ... */
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .section-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 2px solid #007bff; color: #343a40; }
        .youth-section-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 2px solid #fd7e14; color: #343a40; }
        .sidebar-title { font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem; color: #495057; }
        .card { background-color: white; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.08); overflow: hidden; transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; display: flex; flex-direction: column; }
        .card:hover { transform: translateY(-3px); box-shadow: 0 5px 10px rgba(0,0,0,0.12); }
        .card img { width: 100%; height: 160px; object-fit: cover; flex-shrink: 0; }
        .card-content { padding: 1rem; flex-grow: 1; display: flex; flex-direction: column; }
        .card-content h3, .card-content h4 { margin-bottom: 0.5rem; }
        .card-content p { flex-grow: 1; margin-bottom: 0.75rem; }
        .card-content .card-footer { margin-top: auto; }
        .navbar-sticky { position: sticky; top: 0; z-index: 50; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .breaking-news { background-color: #dc3545; color: white; padding: 0.5rem 1rem; font-size: 0.9rem; }
        .breaking-news span { font-weight: 600; margin-right: 0.75rem; display: inline-block; background-color: rgba(0,0,0,0.2); padding: 0.2rem 0.5rem; border-radius: 0.25rem; }
        .btn { display: inline-block; padding: 0.6rem 1.2rem; border-radius: 0.375rem; font-weight: 500; text-align: center; transition: background-color 0.2s ease, transform 0.1s ease; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-primary:hover { background-color: #0056b3; transform: scale(1.02); }
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn-secondary:hover { background-color: #5a6268; transform: scale(1.02); }
        .btn-sm { padding: 0.4rem 0.8rem; font-size: 0.875rem; }
        .guide-card { background-color: white; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.08); padding: 1rem; text-align: center; transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100px; }
        .guide-card:hover { transform: translateY(-3px); box-shadow: 0 5px 10px rgba(0,0,0,0.12); background-color: #eef7ff; }
        .guide-card i { width: 2rem; height: 2rem; margin-bottom: 0.5rem; }
        .guide-card h4 { font-weight: 500; font-size: 0.9rem; color: #343a40; }
        .news-list-item { display: block; padding: 0.75rem 0; border-bottom: 1px solid #e9ecef; transition: background-color 0.15s ease; }
        .news-list-item:last-child { border-bottom: none; }
        .news-list-item:hover { background-color: #e9ecef; }
        .news-list-item h5 { font-size: 0.9rem; font-weight: 500; margin-bottom: 0.1rem; color: #343a40; }
        .news-list-item span { font-size: 0.75rem; color: #6c757d; }
        .footer { background-color: #343a40; color: #f8f9fa; padding: 2.5rem 1rem; margin-top: 4rem; }
        .footer-social-icon { display: inline-block; padding: 0.5rem; color: #adb5bd; transition: color 0.2s ease; }
        .footer-social-icon:hover { color: white; }
        .footer-social-icon svg { width: 1.25rem; height: 1.25rem; }
    </style>
</head>
<body class="bg-gray-100">

<nav class="navbar-sticky">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="<?= BASE_PATH ?>/" class="text-2xl font-bold text-blue-600">Turkelinet.com</a> <div class="hidden md:flex space-x-5 items-center">
            <a href="<?= BASE_PATH ?>/" class="text-gray-700 hover:text-blue-600 text-sm font-medium">Ana Sayfa</a> <?php if (!empty($kategoriler)): ?>
                <?php foreach ($kategoriler as $kategori): ?>
                    <a href="<?= BASE_PATH ?>/kategori/<?= htmlspecialchars($kategori['slug']) ?>" class="text-gray-700 hover:text-blue-600 text-sm font-medium">
                        <?= htmlspecialchars($kategori['ad']) ?>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <a href="#" class="text-gray-700 hover:text-blue-600 text-sm font-medium">Gündem</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 text-sm font-medium">Spor</a>
            <?php endif; ?>
            <a href="<?= BASE_PATH ?>/genclik" class="text-gray-700 hover:text-blue-600 text-sm font-medium">Gençlik</a> <a href="<?= BASE_PATH ?>/rehber" class="text-gray-700 hover:text-blue-600 text-sm font-medium">Rehber</a> <a href="<?= BASE_PATH ?>/ilanlar" class="text-gray-700 hover:text-blue-600 text-sm font-medium">İlanlar</a> </div>
        <div class="hidden md:flex items-center space-x-3">
            <button class="text-gray-600 hover:text-blue-600 p-1">
                <i data-lucide="search" class="w-5 h-5"></i>
            </button>
            <button class="text-gray-600 hover:text-blue-600 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </button>
            <a href="<?= BASE_PATH ?>/ilan-ver" class="btn btn-primary text-xs px-3 py-1.5">İlan Ver</a> </div>
        <button class="md:hidden text-gray-700" id="mobile-menu-button">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
    </div>
    <div class="hidden md:hidden bg-white shadow-md py-3 px-4 space-y-2" id="mobile-menu">
        <a href="<?= BASE_PATH ?>/" class="block text-gray-700 hover:text-blue-600 py-1">Ana Sayfa</a> <?php if (!empty($kategoriler)): ?>
            <?php foreach ($kategoriler as $kategori): ?>
                <a href="<?= BASE_PATH ?>/kategori/<?= htmlspecialchars($kategori['slug']) ?>" class="block text-gray-700 hover:text-blue-600 py-1">
                    <?= htmlspecialchars($kategori['ad']) ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
        <a href="<?= BASE_PATH ?>/genclik" class="block text-gray-700 hover:text-blue-600 py-1">Gençlik</a> <a href="<?= BASE_PATH ?>/rehber" class="block text-gray-700 hover:text-blue-600 py-1">Rehber</a> <a href="<?= BASE_PATH ?>/ilanlar" class="block text-gray-700 hover:text-blue-600 py-1">İlanlar</a> <hr class="my-2">
        <a href="<?= BASE_PATH ?>/ilan-ver" class="block text-gray-700 hover:text-blue-600 py-1">İlan Ver</a> </div>
</nav>

<div class="breaking-news">
    <div class="container mx-auto px-4">
        <span>SON DAKİKA</span>
        <a href="#" class="hover:underline">Türkeli'de sağanak yağış etkili oldu, bazı yollar kapandı...</a>
    </div>
</div>

