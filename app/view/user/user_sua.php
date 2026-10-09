<a href="index.php?modun=user&action=index">
    Quay lại 
</a>


<form method="POST" action="index.php?modun=user&action=update">

    <input type="hidden" name="id" value="<?= $user['MaNguoiDung'] ?>">

    <label>Họ tên</label>
    <input type="text" name="ten_hien_thi"
           value="<?= $user['TenHienThi'] ?>">

    <label>Email</label>
    <input type="email" name="email"
           value="<?= $user['Email'] ?>">

    <label>Số điện thoại</label>
    <input type="text" name="so_dien_thoai"
           value="<?= $user['SoDienThoai'] ?>">

    <label>Địa chỉ</label>
    <input type="text" name="dia_chi"
           value="<?= $user['DiaChi'] ?>">

    <label>Vai trò</label>
    <select name="vai_tro">
        <option value="User">User</option>
        <option value="Staff">Staff</option>
        <option value="Admin">Admin</option>
    </select>

    <label>Trạng thái</label>
    <select name="trang_thai">
        <option value="HoatDong">Hoạt động</option>
        <option value="Khoa">Khóa</option>
    </select>

    <button type="submit">Lưu thay đổi</button>

</form>