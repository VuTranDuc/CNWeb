<?php
session_start();
include 'products.php'; // Đảm bảo rằng bạn đang sử dụng file products.php để lấy dữ liệu hoa.

if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index = $_GET['index'];

    // Kiểm tra nếu sản phẩm tồn tại trong mảng flowers
    if (isset($flowers[$index])) {
        $flower = $flowers[$index];
    } else {
        echo "Sản phẩm không tồn tại!";
        exit;
    }
} else {
    echo "Không có sản phẩm được chọn để sửa!";
    exit;
}

// Kiểm tra và tạo thư mục uploads nếu chưa có
if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}

// Xử lý form submit (cập nhật sản phẩm)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $index;
    // Cập nhật tên và mô tả sản phẩm
    $flowers[$index]['name'] = $_POST['name'];
    $flowers[$index]['description'] = $_POST['description'];

    // Kiểm tra ảnh mới có được tải lên không
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = time() . '_' . $_FILES['image']['name']; // Thêm thời gian vào tên file để tránh trùng lặp
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image); // Lưu ảnh vào thư mục uploads.
        $flowers[$index]['image'] = 'uploads/' . $image; // Cập nhật đường dẫn ảnh trong mảng flowers.
    } else {
        // Giữ nguyên ảnh cũ nếu không có ảnh mới
        $flowers[$index]['image'] = $flower['image'];
    }

    // Lưu lại mảng flowers vào file JSON sau khi chỉnh sửa
    $json_data = json_encode($flowers, JSON_PRETTY_PRINT);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Lỗi mã hóa JSON: " . json_last_error_msg();
    } else {
        // Đảm bảo file products.json có quyền ghi
        file_put_contents('products.json', $json_data); // Lưu dữ liệu vào file
        echo "Sản phẩm đã được cập nhật thành công!";
        header('Location: index.php'); // Chuyển hướng về trang danh sách sản phẩm
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">Sửa Sản Phẩm</h1>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($flower['name']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả sản phẩm</label>
            <textarea class="form-control" id="description" name="description" rows="4" required><?= htmlspecialchars($flower['description']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh sản phẩm</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="<?= htmlspecialchars($flower['image']); ?>" alt="<?= htmlspecialchars($flower['name']); ?>" class="mt-3" style="max-width: 200px;">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
</body>
</html>
