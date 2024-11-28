<?php
// Đường dẫn tới file CSV
$filename = "KTPM3_Danh_sach_diem_danh.csv";

// Mảng chứa dữ liệu sinh viên
$sinhvien = [];

// Mở file CSV và đọc dữ liệu
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc dòng đầu tiên (tiêu đề) và loại bỏ ký tự BOM nếu có
    $headers = fgetcsv($handle, 1000, ",");
    $headers = array_map('trim', $headers); // Loại bỏ khoảng trắng và ký tự BOM trong tiêu đề

    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data = array_map('trim', $data); // Loại bỏ khoảng trắng hoặc ký tự lạ trong từng dòng
        $sinhvien[] = array_combine($headers, $data);
    }

    fclose($handle);
}

// Kiểm tra dữ liệu đã được đọc
// print_r($sinhvien);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>Điểm trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hiển thị từng sinh viên
                foreach ($sinhvien as $sv) {
                    // In ra các thông tin của sinh viên
                    echo "<tr>";
                    echo "<td>{$sv['﻿username']}</td>";  // '﻿username' là tên cột trong CSV
                    echo "<td>{$sv['lastname']} {$sv['firstname']}</td>";  // Kết hợp họ và tên
                    echo "<td>{$sv['city']}</td>";  // Sử dụng 'city' làm Ngày sinh
                    echo "<td>{$sv['course1']}</td>";  // Sử dụng 'course1' cho Lớp
                    echo "<td>Chưa có điểm</td>";  // Nếu không có điểm trung bình, để trống
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

