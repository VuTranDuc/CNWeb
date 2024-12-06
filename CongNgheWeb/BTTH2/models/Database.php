<?php
class Database {
    private static $host = 'localhost';
    private static $dbname = 'tintuc';
    private static $username = 'root';
    private static $password = '';

    // Kết nối đến cơ sở dữ liệu
    public static function connect() {
        try {
            $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Không thể kết nối tới cơ sở dữ liệu: " . $e->getMessage());
        }
    }
}
?>
