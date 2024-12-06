<?php
require_once 'models/News.php';

class NewsController {
    // Hiển thị chi tiết tin tức
    public function detail($id) {
        // Kiểm tra ID hợp lệ
        if (!is_numeric($id) || $id <= 0) {
            echo "ID không hợp lệ!";
            return;
        }

        // Truy vấn tin tức theo ID
        $newsItem = News::getById($id);

        if ($newsItem) {
            // Hiển thị chi tiết
            require_once 'views/news/detail.php';
        } else {
            echo "Tin tức không tồn tại!";
        }
    }

    // Hiển thị danh sách tin tức
    public function index() {
        // Lấy danh sách tin tức
        $news = News::getAll();
        require_once 'views/home/index.php';
    }
}
?>
