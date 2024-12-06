<?php
require_once 'models/News.php';

class AdminController {

    // Hiển thị dashboard cho admin
    public function dashboard() {
        // Lấy danh sách tin tức
        $news = News::getAll();
        include 'views/admin/dashboard.php'; // Hiển thị dashboard
    }

    // Thêm bài viết mới
    public function addNews() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin từ form
            $title = $_POST['title'];
            $content = $_POST['content'];
            
            // Gọi phương thức add để thêm bài viết vào cơ sở dữ liệu
            News::add($title, $content);
            
            // Sau khi thêm xong, chuyển hướng về dashboard
            header('Location: index.php?controller=admin&action=dashboard');
            exit;
        }
        include 'views/admin/news/add.php';
    }
}
?>
