-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2026 lúc 08:54 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_shopquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `VaiTro` varchar(20) NOT NULL DEFAULT 'User',
  `TenHienThi` varchar(100) NOT NULL,
  `SoDienThoai` varchar(15) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT 'assets/avatar-default.png',
  `NgayDangKy` datetime NOT NULL DEFAULT current_timestamp(),
  `LichSuDangNhap` datetime DEFAULT NULL,
  `TrangThai` varchar(30) NOT NULL DEFAULT 'HoatDong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaNguoiDung`, `TenDangNhap`, `MatKhau`, `Email`, `VaiTro`, `TenHienThi`, `SoDienThoai`, `DiaChi`, `Avatar`, `NgayDangKy`, `LichSuDangNhap`, `TrangThai`) VALUES
(1, 'admin', '123456', 'admin@shopquanao.vn', 'Admin', 'Quản Trị Viên Shop', '0912345678', 'Hà Nội', 'assets/avatar-default.png', '2026-09-29 16:10:13', '2026-10-13 13:33:49', 'HoatDong'),
(2, 'thu_ngan', '123456', 'staff@shopquanao.vn', 'User', 'Nguyễn Thị Thu Ngân', '0988776655', 'Cầu Giấy, Hà Nội', 'assets/avatar-default.png', '2026-09-29 16:10:13', '2026-10-13 10:37:53', 'HoatDong'),
(3, 'khachhang1', '123456', 'lananh@gmail.com', 'User', 'Hoàng Lan Anh', '0901234567', 'Đống Đa, Hà Nội', 'assets/avatar-default.png', '2026-09-29 16:10:13', '2026-09-29 16:10:13', 'HoatDong'),
(4, 'khachhang2', '123456', 'minhtuan@gmail.com', 'User', 'Lê Minh Tuấn', '0934567890', 'Bắc Từ Liêm, Hà Nội việt nam', 'assets/avatar-default.png', '2026-09-29 16:10:13', '2026-09-29 16:10:13', 'HoatDong'),
(5, 'khachang', '123456', 'khanhang@gmail.com', 'User', 'Hải Đăng', '0934567890', 'Bắc Từ Liêm, Hà Nội', 'assets/avatar-default.png', '2026-10-13 11:28:37', NULL, 'HoatDong'),
(6, 'hehehe', '123456', 'hehehe@gmail.com', 'User', 'Hải Đăng', '0934567890', 'Bắc Từ Liêm, Hà Nội', 'assets/avatar-default.png', '2026-10-13 11:35:23', NULL, 'HoatDong');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
