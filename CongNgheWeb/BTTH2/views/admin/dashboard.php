<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/BTTH2/assets/style.css">
</head>
<body>
    <h1>Welcome to Admin Dashboard</h1>
    <a href="index.php?controller=admin&action=addNews">Add News</a>
    <h2>All News</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        <?php foreach ($news as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['title']; ?></td>
                <td><a href="index.php?controller=news&action=detail&id=<?php echo $item['id']; ?>">View</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
