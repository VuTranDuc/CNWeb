<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/js/bootstrap.bundle.min.js">
    <!-- Link Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <main class="container my-4">

        <div class="mb-3 text-start">
            <a href="./addProduct.php" class="btn btn-success">
                Thêm mới
            </a>
        </div>

        <?php if (empty($products)): ?>
            <p class="text-center text-muted">Không có sản phẩm nào.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá thành</th>
                            <th>Image</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $index => $product): ?>
                            <tr>
                                <td><?= htmlspecialchars($product['name']) ?></td>
                                <td><?= htmlspecialchars($product['price']) ?> VND</td>
                                <td>
                                    <?php if (empty($product["image"])): ?>
                                        <form action="index.php?index=<?= $index ?>" method="post" enctype="multipart/form-data">
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <button type="submit" class="btn btn-sm btn-primary mt-1" name="submit">Tải lên ảnh</button>
                                        </form>
                                    <?php else: ?>
                                        <img src="<?= htmlspecialchars($product['image']) ?>" width="50px" alt="Hình sản phẩm">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Truyền name và price qua URL -->
                                    <a href="edit.php?name=<?= urlencode($product['name']); ?>&price=<?= urlencode($product['price']); ?>&index=<?= $index; ?>" class="btn btn-sm btn-secondary mx-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                                    </a>
                                    <a href="delete.php?name=<?= urlencode($product['name']); ?>&price=<?= urlencode($product['price']); ?>&index=<?= $index; ?>" class="btn btn-sm btn-secondary">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>