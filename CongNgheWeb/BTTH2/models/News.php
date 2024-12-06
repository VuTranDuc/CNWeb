<?php
require_once 'Database.php';

class News {

    // Lấy tất cả tin tức
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM news ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm bài viết mới
    public static function add($title, $content) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO news (title, content, created_at) VALUES (?, ?, NOW())");
        return $stmt->execute([$title, $content]);
    }

    // Lấy tin tức theo ID
    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
