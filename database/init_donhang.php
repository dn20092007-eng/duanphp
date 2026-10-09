<?php
// File tự động khởi tạo cơ sở dữ liệu và bảng don_hang
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS ql_shopquanao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE ql_shopquanao");

    $sqlTable = "CREATE TABLE IF NOT EXISTS don_hang (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ten_khach_hang VARCHAR(255) NOT NULL,
        tong_tien INT NOT NULL,
        trang_thai VARCHAR(50) NOT NULL DEFAULT 'Mới tạo'
    )";
    $pdo->exec($sqlTable);

    $check = $pdo->query("SELECT COUNT(*) FROM don_hang")->fetchColumn();
    if ($check == 0) {
        $sqlInsert = "INSERT INTO don_hang (ten_khach_hang, tong_tien, trang_thai) VALUES
            ('Nguyễn Văn A', 440000, 'Đã hoàn thành'),
            ('Trần Thị B', 290000, 'Mới tạo')";
        $pdo->exec($sqlInsert);
    }

    echo "<h2 style='color: green;'> Tự động tạo bảng 'don_hang' THÀNH CÔNG!</h2>";
    echo "<br><a href='../index.php?modun=donhang'>👉 Bấm vào đây để tới trang Quản Lý Đơn Hàng</a>";

} catch (PDOException $e) {
    echo "<h2 style='color: red;'> Lỗi:</h2> " . $e->getMessage();
}
