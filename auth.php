<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function kiemTraDangNhap() {
    if (!isset($_SESSION['nguoi_dung'])) {
        header('Location: login.php');
        exit();
    }
}

function kiemTraAdmin() {
    kiemTraDangNhap();

    if ($_SESSION['nguoi_dung']['VaiTro'] !== 'Admin') {
        echo "<p>Bạn không có quyền truy cập trang này!</p>";
        echo "<a href='index.php'>Quay lại trang chủ</a>";
        exit();
    }
}

function laAdmin() {
    return isset($_SESSION['nguoi_dung'])
        && $_SESSION['nguoi_dung']['VaiTro'] === 'Admin';
}

function laAdminHoacStaff() {
    return isset($_SESSION['nguoi_dung'])
        && in_array($_SESSION['nguoi_dung']['VaiTro'], ['Admin', 'Staff'], true);
}

function kiemTraAdminHoacStaff() {
    kiemTraDangNhap();

    if (!laAdminHoacStaff()) {
        echo "<p>Bạn không có quyền truy cập!</p>";
        echo "<a href='index.php'>Quay lại</a>";
        exit();
    }
}

function daoDangNhap() {
    return isset($_SESSION['nguoi_dung']);
}

function nguoiDungHienTai() {
    return $_SESSION['nguoi_dung'] ?? null;
}