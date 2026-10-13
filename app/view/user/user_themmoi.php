
<?php
$pageTitle = 'Thêm Người Dùng';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Nạp Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Thêm Tài Khoản Mới</h4>
        </div>

        <div class="card-body">

           <a href="index.php?modun=user&action=index"
               class="btn btn-secondary mb-3">
                ← Quay lại
            </a>

            
<form method="POST"
      action="index.php?modun=user&action=store">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tên Đăng Nhập</label>
                        <input type="text" name="ten_dang_nhap"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mật Khẩu</label>
                        <input type="password" name="mat_khau"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Họ Tên</label>
                        <input type="text" name="ten_hien_thi"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số Điện Thoại</label>
                        <input type="text" name="so_dien_thoai"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Địa Chỉ</label>
                        <input type="text" name="dia_chi"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Vai Trò</label>
                        <select name="vai_tro" class="form-select">
                            <option value="User">Khách Hàng (User)</option>
                            <option value="Staff">Nhân Viên (Staff)</option>
                            <option value="Admin">Quản Trị Viên (Admin)</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Trạng Thái</label>
                        <select name="trang_thai" class="form-select">
                            <option value="HoatDong">Hoạt Động</option>
                            <option value="Khoa">Khóa</option>
                        </select>
                    </div>

                </div>

                <hr>

                <button type="submit" class="btn btn-primary">
                    Lưu tài khoản
                </button>

               <a href="index.php?modun=user&action=index"
                   class="btn btn-secondary">
                    Hủy
                </a>
            </form>
        </div>
    </div>
</div>

<!-- Nạp Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
