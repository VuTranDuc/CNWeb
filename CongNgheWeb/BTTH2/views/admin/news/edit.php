<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
</head>
<body>
    <h1>Edit News</h1>
    <form method="POST" action="index.php?controller=admin&action=editNews&id=<?= $news['id'] ?>">
        <input type="text" name="title" value="<?= $news['title'] ?>" required><br>
        <textarea name="content" required><?= $news['content'] ?></textarea><br>
        <input type="text" name="image" value="<?= $news['image'] ?>"><br>
        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= $category['id'] == $news['category_id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
