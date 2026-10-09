<?php
$pageTitle = 'Thêm Người Dùng';
?>

<h3>Thêm Tài Khoản Mới</h3>
<a href="index.php">
    Quay lại 
</a>

<a href="index.php?controller=user&action=index">← Quay lại</a>

<hr>

<form method="POST"
      action="index.php?controller=user&action=store">

    <div class="mb-2">
        <label>Tên Đăng Nhập</label>
        <input type="text"
               name="ten_dang_nhap"
               class="form-control"
               required>
    </div>

    <div class="mb-2">
        <label>Mật Khẩu</label>
        <input type="password"
               name="mat_khau"
               class="form-control"
               required>
    </div>

    <div class="mb-2">
        <label>Họ Tên</label>
        <input type="text"
               name="ten_hien_thi"
               class="form-control"
               required>
    </div>

    <div class="mb-2">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control"
               required>
    </div>

    <div class="mb-2">
        <label>Số Điện Thoại</label>
        <input type="text"
               name="so_dien_thoai"
               class="form-control">
    </div>

    <div class="mb-2">
        <label>Địa Chỉ</label>
        <input type="text"
               name="dia_chi"
               class="form-control">
    </div>

    <div class="mb-2">
        <label>Vai Trò</label>

        <select name="vai_tro" class="form-control">
            <option value="User">Khách Hàng (User)</option>
            <option value="Staff">Nhân Viên (Staff)</option>
            <option value="Admin">Quản Trị Viên (Admin)</option>
        </select>
    </div>

    <div class="mb-2">
        <label>Trạng Thái</label>

        <select name="trang_thai" class="form-control">
            <option value="HoatDong">Hoạt Động</option>
            <option value="Khoa">Khóa</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">
        Lưu
    </button>

    <a href="index.php?controller=user&action=index"
       class="btn btn-secondary">
        Hủy
    </a>

</form>