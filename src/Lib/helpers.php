<?php

// Bu dosya, proje genelinde kullanılacak yardımcı fonksiyonları içerir.

/**
 * Verilen tarih/saat string'ini belirtilen formata çevirir.
 * Hata durumunda orijinal string'i döndürür.
 *
 * @param string|null $tarihStr Formatlanacak tarih string'i.
 * @param string $format İstenen format (örn: 'd.m.Y', 'd F Y H:i').
 * @return string|null Formatlanmış tarih veya hata durumunda orijinal string/null.
 */
function formatTarih(?string $tarihStr, string $format = 'd.m.Y'): ?string {
    if ($tarihStr === null) {
        return null;
    }
    try {
        $tarih = new DateTime($tarihStr);
        // İleride Türkçe aylar/günler için IntlDateFormatter eklenebilir.
        return $tarih->format($format);
    } catch (Exception $e) {
        // Hata durumunda loglama yapılabilir
        // error_log("Tarih formatlama hatası: " . $e->getMessage());
        return $tarihStr; // Orijinal string'i döndür
    }
}

/**
 * Sayısal bir değeri para formatına çevirir (örn: ₺1.500,00).
 *
 * @param mixed $fiyat Formatlanacak değer.
 * @return string|mixed Formatlanmış fiyat veya sayısal değilse orijinal değer.
 */
function formatFiyat($fiyat): mixed {
    if (is_numeric($fiyat)) {
        return '₺' . number_format(floatval($fiyat), 2, ',', '.');
    }
    return $fiyat;
}

// Gelecekte başka yardımcı fonksiyonlar buraya eklenebilir...
// function generateSlug($text) { ... }
// function sanitizeInput($data) { ... }

?>
