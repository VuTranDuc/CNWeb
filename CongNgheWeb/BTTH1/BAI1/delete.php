<?php
// Đọc dữ liệu từ file JSON
$flowers = json_decode(file_get_contents('products.json'), true);

// Kiểm tra nếu file JSON không tồn tại hoặc không thể đọc được
if ($flowers === null) {
    $flowers = []; // Khởi tạo mảng rỗng nếu không đọc được dữ liệu từ file
}

// Kiểm tra xem có tham số 'index' trong URL không
if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index =(int) $_GET['index'];
    echo $index;
    echo gettype($index);
    foreach ($flowers as $key=>$flower) {
    echo "<pre>";
    echo json_encode($key, JSON_PRETTY_PRINT);
    echo "</pre>";
    }
    // Kiểm tra xem chỉ số sản phẩm có hợp lệ không
    if (isset($flowers[$index])) {
        // Xóa sản phẩm tại vị trí index
        unset($flowers[$index]);

        // Reindex lại mảng để đảm bảo không có chỉ số trống
        $flowers = array_values($flowers);

        // In ra mảng sau khi xóa (kiểm tra)
        

        // Lưu lại mảng sau khi xóa vào file JSON
        $json_data = json_encode($flowers);
       // ... (code hiện tại)

// Lưu lại mảng sau khi xóa vào file JSON
$json_data = json_encode($flowers);

// Kiểm tra lỗi mã hóa JSON và lỗi ghi file
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Lỗi mã hóa JSON: " . json_last_error_msg();
} else {
    if (file_put_contents('products.json', $json_data)) {
        // echo "Sản phẩm đã được xóa thành công!";
        header('Location: index.php');
        exit;
    } else {
        // In ra thông tin lỗi cụ thể
        echo "Lỗi khi ghi dữ liệu vào file products.json! Error: " . error_get_last()['message'];
    }
}

        // Sau khi xóa thành công, chuyển hướng về trang danh sách sản phẩm (index.php)
        header('Location: index.php');
        exit; // Dừng script lại để tránh tiếp tục xử lý mã dưới đây
    } else {
        echo "Sản phẩm không tồn tại!";
        exit;
    }
} else {
    echo "Không có sản phẩm được chọn để xóa!";
    exit;
}
?>