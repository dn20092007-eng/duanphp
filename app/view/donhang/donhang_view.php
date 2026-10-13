<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h3 class="mb-3">Quản Lý Đơn Hàng</h3>

    <div class="mb-3">
        <a href="index.php" class="btn btn-secondary">
            ← Quay lại
        </a>
    </div>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>⚠️ Thông báo:</strong> <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <!-- Form thêm đơn hàng mới -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">+ Thêm Đơn Hàng Mới</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label fw-bold">Tên khách hàng</label>
                        <input type="text" name="ten_khach_hang" class="form-control" placeholder="Nhập tên khách hàng..." required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Tổng tiền (VNĐ)</label>
                        <input type="number" name="tong_tien" class="form-control" placeholder="Nhập tổng tiền..." required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-bold">Trạng thái</label>
                        <select name="trang_thai" class="form-select">
                            <option value="Mới tạo">Mới tạo</option>
                            <option value="Đang giao">Đang giao</option>
                            <option value="Đã hoàn thành">Đã hoàn thành</option>
                            <option value="Đã hủy">Đã hủy</option>
                        </select>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" name="them" class="btn btn-primary">
                            Lưu đơn hàng
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bảng danh sách đơn hàng -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Danh Sách Đơn Hàng</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 80px;">ID</th>
                            <th>Tên khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th style="width: 120px;" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donhang as $dh): ?>
                            <tr>
                                <td><?= htmlspecialchars($dh['id']) ?></td>
                                <td><strong><?= htmlspecialchars($dh['ten_khach_hang']) ?></strong></td>
                                <td><span class="text-primary fw-bold"><?= number_format($dh['tong_tien']) ?> đ</span></td>
                                <td>
                                    <?php if ($dh['trang_thai'] === 'Đã hoàn thành'): ?>
                                        <span class="badge bg-success">Đã hoàn thành</span>
                                    <?php elseif ($dh['trang_thai'] === 'Đang giao'): ?>
                                        <span class="badge bg-warning text-dark">Đang giao</span>
                                    <?php elseif ($dh['trang_thai'] === 'Đã hủy'): ?>
                                        <span class="badge bg-danger">Đã hủy</span>
                                    <?php else: ?>
                                        <span class="badge bg-info text-dark"><?= htmlspecialchars($dh['trang_thai']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="index.php?modun=donhang&xoa=<?= urlencode($dh['id']) ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($donhang)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    Chưa có đơn hàng nào.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
