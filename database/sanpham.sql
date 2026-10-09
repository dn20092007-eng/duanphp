-- 1. Tạo cơ sở dữ liệu (nếu chưa có)
CREATE DATABASE IF NOT EXISTS ql_shopquanao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Sử dụng cơ sở dữ liệu
USE ql_shopquanao;

-- 2. Tạo bảng sản phẩm san_pham
CREATE TABLE IF NOT EXISTS san_pham (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_sp VARCHAR(255) NOT NULL,
    gia INT NOT NULL
);

-- 3. Thêm dữ liệu mẫu vào bảng san_pham
INSERT INTO san_pham (ten_sp, gia) VALUES
('Áo phông nam cổ tròn', 150000),
('Quần Jean nam dáng ôm', 290000),
('Áo sơ mi trắng tay dài', 220000),
('Áo khoác Nhẹ Uniqlo', 350000);
