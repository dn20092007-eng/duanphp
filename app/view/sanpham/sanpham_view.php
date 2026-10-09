<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sản Phẩm</title>
</head>
<body>
    <h2>Trang Quản Lý Sản Phẩm</h2>
    <a href="index.php">Quay lại Trang Chủ</a>
    <hr>

    <h3>Thêm sản phẩm mới</h3>
    <form method="POST">
        <input type="text" name="ten_sp" placeholder="Tên sản phẩm" required>
        <input type="number" name="gia" placeholder="Giá sản phẩm" required>
        <button type="submit" name="them">Thêm sản phẩm</button>
    </form>

    <hr>

    <h3>Danh sách sản phẩm</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
        <?php if (!empty($sanpham)): ?>
            <?php foreach ($sanpham as $sp): ?>
                <tr>
                    <td><?= $sp['id'] ?></td>
                    <td><?= htmlspecialchars($sp['ten_sp']) ?></td>
                    <td><?= number_format($sp['gia']) ?> đ</td>
                    <td>
                        <a href="index.php?modun=sanpham&xoa=<?= $sp['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Chưa có sản phẩm nào.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>