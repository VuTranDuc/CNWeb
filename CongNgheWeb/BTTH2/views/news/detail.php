<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Tin Tức</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    if ($newsItem) {
        echo "<h1>" . htmlspecialchars($newsItem['title']) . "</h1>";
        echo "<p>" . nl2br(htmlspecialchars($newsItem['content'])) . "</p>";
        echo "<p><strong>Ngày tạo:</strong> " . $newsItem['created_at'] . "</p>";
    } else {
        echo "<p>Không tìm thấy tin tức.</p>";
    }
    ?>
</body>
</html>
