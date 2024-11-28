<?php 
session_start(); 
include 'products.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">Gian hàng Hoa</h1>

    <?php
    // Kiểm tra nếu người dùng là admin
    $is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin'; 

    // Số sản phẩm trên mỗi trang
    $items_per_page = 6;

    // Tổng số sản phẩm
    $total_items = count($flowers);

    // Tính tổng số trang
    $total_pages = ceil($total_items / $items_per_page);

    // Lấy trang hiện tại từ URL, mặc định là trang 1
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($current_page < 1) $current_page = 1;
    if ($current_page > $total_pages) $current_page = $total_pages;

    // Xác định vị trí bắt đầu
    $start_index = ($current_page - 1) * $items_per_page;

    // Lấy dữ liệu sản phẩm cho trang hiện tại
    $current_page_items = array_slice($flowers, $start_index, $items_per_page);
    ?>
    <a href="admin.php"><button>Admin</button></a>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($current_page_items as $real_index => $flower): ?>
    <div class="col">
        <div class="card h-100">
            <img src="<?= $flower['image']; ?>" class="card-img-top" alt="<?= $flower['name']; ?>" style="max-height: 200px; object-fit: cover;">
            <div class="card-body">
                <h3 class="card-title"><?= $flower['name']; ?></h3>
                <p class="card-text"><?= $flower['description']; ?></p>

                <?php if ($is_admin): ?>
                    <!-- Tính toán và in chỉ số index -->
                    <?php 
                        $index = ($current_page - 1) * $items_per_page + $real_index; 
                        echo '<p>Index: ' . $index . '</p>';
                    ?>
                    <a href="edit.php?index=<?= $index; ?>">Sửa</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    </div>

    <!-- Phân trang -->
    <nav aria-label="Pagination" class="mt-4">
        <ul class="pagination justify-content-center">
            <!-- Nút trước -->
            <?php if ($current_page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $current_page - 1; ?>" aria-label="Trang trước">
                        <span aria-hidden="true">&laquo; Trước</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Nút số trang -->
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= $i === $current_page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>

            <!-- Nút sau -->
            <?php if ($current_page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $current_page + 1; ?>" aria-label="Trang sau">
                        <span aria-hidden="true">Sau &raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
</body>
</html>
