
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Chưa đăng nhập thì chuyển về login
if (!isset($_SESSION['nguoi_dung'])) {
    header('Location: /ban-quan-ao/login.php');
    exit();
}

require_once __DIR__ . '/database/userdatabase.php';

require_once __DIR__ . '/app/controllers/DashboardController.php';
require_once __DIR__ . '/app/controllers/SanPhamController.php';
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ . '/app/controllers/DonHangController.php';

// Xác định module và action
$modun = $_GET['modun'] ?? '';
$action = $_GET['action'] ?? 'index';

switch ($modun) {
    case 'sanpham':
        $controller = new SanPhamController($pdo);
        $controller->index();
        break;

    case 'donhang':
        $controller = new DonHangController($pdo);
        $controller->index();
        break;

    case 'user':
        $controller = new UserController($pdo);

        if (method_exists($controller, $action)) {
            $controller->{$action}();
        } else {
            echo 'Không tìm thấy action';
        }
        break;

    default:
        $controller = new DashboardController($pdo);
        $controller->index();
        break;
}
