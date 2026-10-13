

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<div class="container mt-4">
    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Sửa Thông Tin Người Dùng</h4>
        </div>

        <div class="card-body">

            <a href="index.php?modun=user&action=index"
               class="btn btn-secondary mb-3">
                Quay lại
            </a>

            <form method="POST"
                  action="index.php?modun=user&action=update">

                <input type="hidden" name="id"
                       value="<?= htmlspecialchars($user['MaNguoiDung']) ?>">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Họ tên</label>
                        <input type="text" name="ten_hien_thi"
                               class="form-control"
                               value="<?= htmlspecialchars($user['TenHienThi'] ?? '') ?>"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                               class="form-control"
                               value="<?= htmlspecialchars($user['Email'] ?? '') ?>"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="so_dien_thoai"
                               class="form-control"
                               value="<?= htmlspecialchars($user['SoDienThoai'] ?? '') ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" name="dia_chi"
                               class="form-control"
                               value="<?= htmlspecialchars($user['DiaChi'] ?? '') ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Vai trò</label>
                        <select name="vai_tro" class="form-select">
                            <option value="User"
                                <?= $user['VaiTro'] === 'User' ? 'selected' : '' ?>>
                                User
                            </option>

                            <option value="Staff"
                                <?= $user['VaiTro'] === 'Staff' ? 'selected' : '' ?>>
                                Staff
                            </option>

                            <option value="Admin"
                                <?= $user['VaiTro'] === 'Admin' ? 'selected' : '' ?>>
                                Admin
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="trang_thai" class="form-select">
                            <option value="HoatDong"
                                <?= $user['TrangThai'] === 'HoatDong' ? 'selected' : '' ?>>
                                Hoạt động
                            </option>

                            <option value="Khoa"
                                <?= $user['TrangThai'] === 'Khoa' ? 'selected' : '' ?>>
                                Khóa
                            </option>
                        </select>
                    </div>

                </div>

                <hr>

                <button type="submit" class="btn btn-primary">
                    Lưu thay đổi
                </button>

                <a href="index.php?modun=user&action=index"
                   class="btn btn-secondary">
                    Hủy
                </a>

            </form>

        </div>
    </div>
</div>
