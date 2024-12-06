<?php
// Kết nối cơ sở dữ liệu
require_once 'models/News.php';
require_once 'models/Database.php';

// Truy vấn tất cả tin tức từ cơ sở dữ liệu
$news = News::getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chính</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?controller=home&action=index">Trang chủ</a></li>
            <li><a href="index.php?controller=news&action=detail&id=1">Tin tức 1</a></li>
            <li><a href="index.php?controller=news&action=detail&id=2">Tin tức 2</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="card">
            <h3>Chào mừng bạn đến với trang chủ</h3>
            <p>Đây là nơi bạn có thể xem các tin tức mới nhất và quản lý chúng. Hãy truy cập các liên kết trên menu để khám phá thêm.</p>
        </div>

        <div class="card">
            <h3>Tin tức mới</h3>
            <?php
            // Kiểm tra xem biến $news có tồn tại và có dữ liệu không
            if (!empty($news)) {
                foreach ($news as $item) {
                    echo "<div class='card'>";
                    echo "<h3><a href='index.php?controller=news&action=detail&id=" . $item['id'] . "'>" . $item['title'] . "</a></h3>";
                    echo "<p>" . substr($item['content'], 0, 100) . "...</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Hiện tại chưa có tin tức nào.</p>";
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Tin Tức. All Rights Reserved.</p>
    </footer>
</body>
</html>
