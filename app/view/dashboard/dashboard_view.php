
<?php
$nd = $_SESSION['nguoi_dung'];
$laAdmin = ($nd['VaiTro'] === 'Admin');
$laAdminHoacStaff = in_array($nd['VaiTro'], ['Admin', 'Staff']);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title><?= $pageTitle ?? 'Shop Quần Áo' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3">

<div class="d-flex justify-content-between align-items-center mb-2">
    <nav>
        <?php if ($laAdminHoacStaff): ?>
            <a href="index.php">Báo Cáo Doanh Thu</a> |
        <?php endif; ?>

        <a href="index.php?modun=sanpham&action=index">Sản Phẩm</a>

        <a href="index.php?modun=donhang&action=index">| Đơn Hàng</a>

        <?php if ($laAdmin): ?>
            | <a href="index.php?modun=user&action=index">Người Dùng</a>
        <?php endif; ?>
    </nav>

    <div>
        Xin chào, <strong><?= htmlspecialchars($nd['TenHienThi']) ?></strong>
        (<?= $nd['VaiTro'] ?>)
        | <a href="logout.php">Đăng Xuất</a>
    </div>
</div>
<hr>

</div>
</body>
</html>

