<?php
// File tự động khởi tạo cơ sở dữ liệu và bảng san_pham
$host = 'localhost';
$username = 'root';
$password = '';

try {
    // 1. Kết nối đến MySQL server
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Tạo CSDL ql_shopquanao nếu chưa có
    $pdo->exec("CREATE DATABASE IF NOT EXISTS ql_shopquanao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE ql_shopquanao");

    // 3. Tạo bảng san_pham nếu chưa có
    $sqlTable = "CREATE TABLE IF NOT EXISTS san_pham (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ten_sp VARCHAR(255) NOT NULL,
        gia INT NOT NULL
    )";
    $pdo->exec($sqlTable);

    // 4. Kiểm tra xem có dữ liệu chưa, nếu chưa thì thêm dữ liệu mẫu
    $check = $pdo->query("SELECT COUNT(*) FROM san_pham")->fetchColumn();
    if ($check == 0) {
        $sqlInsert = "INSERT INTO san_pham (ten_sp, gia) VALUES
            ('Áo phông nam cổ tròn', 150000),
            ('Quần Jean nam dáng ôm', 290000),
            ('Áo sơ mi trắng tay dài', 220000),
            ('Áo khoác Nhẹ Uniqlo', 350000)";
        $pdo->exec($sqlInsert);
    }

    echo "<h2 style='color: green;'> Tự động tạo cơ sở dữ liệu và bảng 'san_pham' THÀNH CÔNG!</h2>";
    echo "<p>Đã tạo CSDL: <b>ql_shopquanao</b></p>";
    echo "<p>Đã tạo Bảng: <b>san_pham</b> (và tự thêm 4 sản phẩm mẫu)</p>";
    echo "<br><a href='../index.php?modun=sanpham'>👉 Bấm vào đây để tới trang Quản Lý Sản Phẩm</a>";

} catch (PDOException $e) {
    echo "<h2 style='color: red;'> Lỗi khi tạo cơ sở dữ liệu:</h2> " . $e->getMessage();
}
