<?php
include 'products.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $description = $_POST['description'];
    $targetDir = "uploads/"; 
    
    // Kiểm tra loại file ảnh
    $image = $_FILES["image"];
    $imageFileType = $image["type"];
    
    // Khởi tạo biến $image để lưu đường dẫn file ảnh
    $imagePath = '';
    
    if (in_array($imageFileType, ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'])) {
        // Di chuyển ảnh vào thư mục uploads
        $imagePath = $targetDir . basename($image["name"]);
        
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        
        } else {
            echo "Có lỗi khi tải ảnh lên.";
            $imagePath = ''; // Nếu không thể tải ảnh lên
        }
    } else {
        echo "Chỉ chấp nhận các định dạng ảnh jpg, jpeg, png, gif.";
        $imagePath = ''; // Nếu ảnh không phải là hình ảnh hợp lệ
    }

    // Tạo sản phẩm mới và thêm vào mảng flowers
    $newFlower = [
        'name' => $name,
        'description' => $description,
        'image' => $imagePath, // Lưu đường dẫn ảnh
    ];

    // Thêm sản phẩm mới vào mảng flowers (giả sử $flowers đã được đọc từ products.php)
    $flowers[] = $newFlower;

    // Ghi lại mảng flowers vào file products.php mà không làm mất dữ liệu cũ
    // file_put_contents('products.php', '<?php $flowers = ' . var_export($flowers, true) . ';');
    $data_json = json_encode($flowers);
    file_put_contents("products.json", $data_json);

    // Chuyển hướng về index.php sau khi thêm sản phẩm
    header("Location: index.php");
    exit(); // Dừng script sau khi chuyển hướng
}
?>
