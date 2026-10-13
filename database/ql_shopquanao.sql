
CREATE DATABASE IF NOT EXISTS ql_shopquanao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ql_shopquanao;

-- 1. BẢNG NGƯỜI DÙNG (NguoiDung)
CREATE TABLE IF NOT EXISTS NguoiDung (
    MaNguoiDung INT AUTO_INCREMENT PRIMARY KEY,
    TenDangNhap VARCHAR(50) NOT NULL UNIQUE,
    MatKhau VARCHAR(255) NOT NULL,
    Email VARCHAR(100),
    TenHienThi VARCHAR(100),
    VaiTro VARCHAR(20) DEFAULT 'user',
    SoDienThoai VARCHAR(20),
    DiaChi VARCHAR(255),
    NgayDangKy DATETIME DEFAULT CURRENT_TIMESTAMP,
    TrangThai INT DEFAULT 1,
    LichSuDangNhap DATETIME
);


CREATE TABLE IF NOT EXISTS san_pham (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_sp VARCHAR(255) NOT NULL,
    gia INT NOT NULL
);


CREATE TABLE IF NOT EXISTS don_hang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_khach_hang VARCHAR(255) NOT NULL,
    tong_tien INT NOT NULL,
    trang_thai VARCHAR(50) NOT NULL DEFAULT 'Mới tạo'
);



-- (User: admin | Pass: 123456)
INSERT INTO NguoiDung (TenDangNhap, MatKhau, Email, TenHienThi, VaiTro, TrangThai) VALUES
('admin', '123456', 'admin@gmail.com', 'Quản trị viên', 'admin', 1);


INSERT INTO san_pham (ten_sp, gia) VALUES
('Áo phông nam cổ tròn', 150000),
('Quần Jean nam dáng ôm', 290000),
('Áo sơ mi trắng tay dài', 220000),
('Áo khoác Nhẹ Uniqlo', 350000);


INSERT INTO don_hang (ten_khach_hang, tong_tien, trang_thai) VALUES
('Nguyễn Văn A', 440000, 'Đã hoàn thành'),
('Trần Thị B', 290000, 'Mới tạo');
