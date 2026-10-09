<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Đơn Hàng</title>
</head>
<body>
    <h2>Trang Quản Lý Đơn Hàng</h2>
    <a href="index.php">Quay lại Trang Chủ</a>
    <hr>

    <h3>Thêm đơn hàng mới</h3>
    <form method="POST">
        <input type="text" name="ten_khach_hang" placeholder="Tên khách hàng" required>
        <input type="number" name="tong_tien" placeholder="Tổng tiền (VNĐ)" required>
        <select name="trang_thai">
            <option value="Mới tạo">Mới tạo</option>
            <option value="Đang giao">Đang giao</option>
            <option value="Đã hoàn thành">Đã hoàn thành</option>
            <option value="Đã hủy">Đã hủy</option>
        </select>
        <button type="submit" name="them">Tạo đơn hàng</button>
    </form>

    <hr>

    <h3>Danh sách đơn hàng</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        <?php if (!empty($donhang)): ?>
            <?php foreach ($donhang as $dh): ?>
                <tr>
                    <td><?= $dh['id'] ?></td>
                    <td><?= htmlspecialchars($dh['ten_khach_hang']) ?></td>
                    <td><?= number_format($dh['tong_tien']) ?> đ</td>
                    <td><?= htmlspecialchars($dh['trang_thai']) ?></td>
                    <td>
                        <a href="index.php?modun=donhang&xoa=<?= $dh['id'] ?>" onclick="return confirm('Bạn có muốn xóa đơn hàng này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Chưa có đơn hàng nào.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>