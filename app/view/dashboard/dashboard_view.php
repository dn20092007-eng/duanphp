
<?php
require_once dirname(__DIR__, 2) . '/controllers/User_AuthController.php';

$nd = nguoiDungHienTai() ?? [];
$tenHienThi = $nd['TenHienThi'] ?? 'Người dùng';
$vaiTro = $nd['VaiTro'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($pageTitle ?? 'Shop Quần Áo', ENT_QUOTES, 'UTF-8') ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            NHOM5<span class="text-warning">SHOP</span>
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuShop"
                aria-controls="menuShop"
                aria-expanded="false"
                aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuShop">

            <ul class="navbar-nav me-auto ms-lg-4">

                <?php if (laAdminHoacStaff()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Báo cáo doanh thu</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link"
                       href="index.php?modun=sanpham&action=index">
                        Sản phẩm
                    </a>
                </li>

                <?php if (laAdminHoacStaff()): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="index.php?modun=donhang&action=index">
                            Đơn hàng
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (laAdmin()): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="index.php?modun=user&action=index">
                            Người dùng
                        </a>
                    </li>
                <?php endif; ?>

            </ul>

            <div class="d-flex align-items-center gap-3 flex-wrap text-white">

                <div>
                    Xin chào,
                    <strong>
                        <?= htmlspecialchars($tenHienThi, ENT_QUOTES, 'UTF-8') ?>
                    </strong>

                    <span class="badge bg-warning text-dark">
                        <?= htmlspecialchars($vaiTro, ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </div>

                <a class="btn btn-outline-danger btn-sm"
                   href="index.php?modun=auth&action=logout">
                    Đăng xuất
                </a>

            </div>

        </div>
    </div>
</nav>

<main class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">Chào mừng đến với Nhóm 5</h2>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
