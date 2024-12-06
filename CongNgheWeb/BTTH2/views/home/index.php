<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Danh sách Tin Tức</h1>
    <?php
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
</body>
</html>
