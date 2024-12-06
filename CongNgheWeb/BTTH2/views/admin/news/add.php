<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
    <h1>Thêm Tin Tức Mới</h1>
    <form action="index.php?controller=admin&action=addNews" method="POST">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" id="title" required>

        <label for="content">Nội dung:</label>
        <textarea name="content" id="content" rows="4" required></textarea>

        <button type="submit">Thêm</button>
    </form>
</body>
</html>
