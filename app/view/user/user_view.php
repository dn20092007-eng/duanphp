
<h3 class="mb-3">Quản Lý Người Dùng</h3>

<!-- Bootstrap 5 CSS: bỏ dòng này nếu header.php đã nạp Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="mb-3">
    <a href="index.php?modun=user&action=create"
       class="btn btn-primary">
        + Thêm người dùng
    </a>

    <a href="index.php" class="btn btn-secondary">
        ← Quay lại
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover align-middle mb-0">

                <thead class="table-dark">
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
                </thead>

                <tbody>
                    <?php foreach ($users as $user): ?>

                    <tr>
                        <td>
                            <?= htmlspecialchars($user['MaNguoiDung']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($user['TenDangNhap']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($user['TenHienThi']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($user['Email']) ?>
                        </td>

                        <td>
                            <?php if ($user['VaiTro'] === 'Admin'): ?>
                                <span class="badge bg-danger">Admin</span>
                            <?php elseif ($user['VaiTro'] === 'Staff'): ?>
                                <span class="badge bg-primary">Staff</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">User</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($user['SoDienThoai'] ?? '') ?>
                        </td>

                        <td>
                            <?php if ($user['TrangThai'] === 'HoatDong'): ?>
                                <span class="badge bg-success">Hoạt động</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Khóa</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <div class="d-flex gap-2">
                                <a href="index.php?modun=user&action=edit&id=<?= urlencode($user['MaNguoiDung']) ?>"
                                   class="btn btn-warning btn-sm">
                                    Sửa
                                </a>

                                <a href="index.php?modun=user&action=delete&id=<?= urlencode($user['MaNguoiDung']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?')">
                                    Xóa
                                </a>
                            </div>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                    <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            Chưa có người dùng nào.
                        </td>
                    </tr>
                    <?php endif; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
