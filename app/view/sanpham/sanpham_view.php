<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h3 class="mb-3">Quản Lý Sản Phẩm</h3>

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

    <!-- Form thêm sản phẩm mới -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">+ Thêm Sản Phẩm Mới</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="row g-3 align-items-end">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" name="ten_sp" class="form-control" placeholder="Nhập tên sản phẩm..." required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Giá (VNĐ)</label>
                        <input type="number" name="gia" class="form-control" placeholder="Nhập giá sản phẩm..." required>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" name="them" class="btn btn-primary w-100">
                            Lưu sản phẩm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bảng danh sách sản phẩm -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Danh Sách Sản Phẩm</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 80px;">ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th style="width: 120px;" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sanpham as $sp): ?>
                            <tr>
                                <td><?= htmlspecialchars($sp['id']) ?></td>
                                <td><strong><?= htmlspecialchars($sp['ten_sp']) ?></strong></td>
                                <td><span class="text-primary fw-bold"><?= number_format($sp['gia']) ?> đ</span></td>
                                <td class="text-center">
                                    <a href="index.php?modun=sanpham&xoa=<?= urlencode($sp['id']) ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($sanpham)): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">
                                    Chưa có sản phẩm nào.
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