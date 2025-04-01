<?php

namespace App\Core; // İleride autoloading için namespace tanımlaması (opsiyonel ama iyi pratik)

use PDO;
use PDOException;
use PDOStatement; // PDOStatement sınıfını kullanacağımızı belirtelim

class Database {
    private static $instance = null; // Singleton pattern için instance
    private $connection;
    private $stmt; // Son çalıştırılan PDOStatement nesnesini tutmak için

    private $db_host = DB_HOST;
    private $db_name = DB_NAME;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_charset = DB_CHARSET;

    // Constructor private yapılarak dışarıdan new ile örnek oluşturulması engellenir (Singleton)
    private function __construct() {
        $dsn = "mysql:host={$this->db_host};dbname={$this->db_name};charset={$this->db_charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Hataları Exception olarak fırlat
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Sonuçları ilişkisel dizi olarak al (varsayılan)
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Gerçek prepared statement'ları kullan (güvenlik için)
        ];

        try {
            $this->connection = new PDO($dsn, $this->db_user, $this->db_pass, $options);
        } catch (PDOException $e) {
            // Geliştirme modunda detaylı hata, canlıda genel mesaj gösterilebilir
            if (defined('DEBUG_MODE') && DEBUG_MODE) {
                throw new PDOException("Veritabanı bağlantı hatası: " . $e->getMessage(), (int)$e->getCode());
            } else {
                // Canlı ortam için daha genel bir hata mesajı
                die("Veritabanına bağlanılamıyor. Lütfen daha sonra tekrar deneyin.");
            }
        }
    }

    // Singleton pattern: Sadece bir tane Database nesnesi olmasını sağlar
    public static function getInstance() {
        if (self::$instance === null) {
            require_once __DIR__ . '/../../config/config.php';
            self::$instance = new self();
        }
        return self::$instance;
    }

    // PDO bağlantı nesnesini döndüren metod
    public function getConnection() {
        return $this->connection;
    }

    /**
     * SQL sorgusunu hazırlayıp çalıştıran genel metod.
     * Prepared statement'ları destekler.
     *
     * @param string $sql Çalıştırılacak SQL sorgusu (placeholder içerebilir: ?, :name).
     * @param array $params Sorguya bağlanacak parametreler dizisi.
     * @return bool|PDOStatement Başarılı olursa PDOStatement nesnesi, hata olursa false döner.
     */
    public function query(string $sql, array $params = []) {
        try {
            // Sorguyu hazırla (prepare)
            $this->stmt = $this->connection->prepare($sql);
            // Parametreleri bağla (bind) ve sorguyu çalıştır (execute)
            $this->stmt->execute($params);
            // PDOStatement nesnesini döndür
            return $this->stmt;
        } catch (PDOException $e) {
            // Hata durumunda (DEBUG_MODE aktifse) hatayı göster
            if (defined('DEBUG_MODE') && DEBUG_MODE) {
                echo "Sorgu Hatası: " . $e->getMessage() . "<br>SQL: " . $sql;
            }
            return false; // Hata durumunda false döndür
        }
    }

    // İleride fetch, fetchAll gibi yardımcı metodlar eklenebilir
    // public function fetchAll() { return $this->stmt->fetchAll(); }
    // public function fetch() { return $this->stmt->fetch(); }
    // public function rowCount() { return $this->stmt->rowCount(); }


    // Klonlamayı engelle (Singleton)
    private function __clone() {}

    // Uyandırmayı engelle (Singleton)
    public function __wakeup() {}
}

?>
