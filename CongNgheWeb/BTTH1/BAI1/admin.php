    <?php include 'products.php'; ?>
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
    <a href="add.html" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Edit Image</a>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($current_page_items as $current_page_index => $flower): ?>
                <?php $index = $items_per_page*($current_page - 1) + $current_page_index ?>
                <div class="col">
                    <div class="card h-100">

                        
                        <!-- Hình ảnh -->
                        <img src="<?= $flower['image']; ?>" class="card-img-top" alt="<?= $flower['name']; ?>" style="max-height: 200px; object-fit: cover;">

                        <!-- Nội dung -->
                        <div class="card-body">
                            <h3 class="card-title"><?= $flower['name']; ?></h3>
                            <p class="card-text"><?= $flower['description']; ?></p>
                            <td><a href="edit.php?index=<?= $index ?>"><i class="fa-solid fa-pen-to-square" style="color: #74C0FC;"></i></a></td>
                            <td><a href="delete.php?index=<?php echo $index; ?>"><i class="fa-solid fa-trash" style="color: #74C0FC;"></i></a></td>

                        
                            
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
