<h3>Quản lý người dùng</h3>

<a href="index.php?modun=user&action=create">
    + Thêm người dùng
</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Tên đăng nhập</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Vai trò</th>
        <th>Số điện thoại</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
    </tr>

    <?php foreach ($users as $user): ?>

    <tr>
        <td><?= $user['MaNguoiDung'] ?></td>

        <td><?= htmlspecialchars($user['TenDangNhap']) ?></td>

        <td><?= htmlspecialchars($user['TenHienThi']) ?></td>

        <td><?= htmlspecialchars($user['Email']) ?></td>

        <td><?= htmlspecialchars($user['VaiTro']) ?></td>

        <td><?= htmlspecialchars($user['SoDienThoai']) ?></td>

        <td><?= htmlspecialchars($user['TrangThai']) ?></td>

        <td>
            <a href="index.php?modun=user&action=edit&id=<?= $user['MaNguoiDung'] ?>">
                Sửa
            </a>

            |

            <a href="index.php?modun=user&action=delete&id=<?= $user['MaNguoiDung'] ?>"
               onclick="return confirm('Bạn có chắc muốn xóa không?')">
                Xóa
            </a>
        </td>
    </tr>

    <?php endforeach; ?>

</table>