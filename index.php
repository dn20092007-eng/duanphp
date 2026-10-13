<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/database/userdatabase.php';
require_once __DIR__ . '/app/controllers/Login_OutController.php';

// Lấy module và action
$modun = $_GET['modun'] ?? '';
$action = $_GET['action'] ?? 'index';

// Xử lý đăng nhập và đăng xuất trước khi kiểm tra session
if ($modun === 'auth') {
    $controller = new Login_OutController($pdo);

    if ($action === 'login') {
        $controller->login();
    } elseif ($action === 'logout') {
        $controller->logout();
    } else {
        http_response_code(404);
        exit('Không tìm thấy chức năng xác thực');
    }

    exit();
}

// Chưa đăng nhập thì chuyển đến trang đăng nhập
if (!isset($_SESSION['nguoi_dung'])) {
    header('Location: index.php?modun=auth&action=login');
    exit();
}

// Nạp các controller
require_once __DIR__ . '/app/controllers/DashboardController.php';
require_once __DIR__ . '/app/controllers/SanPhamController.php';
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ . '/app/controllers/DonHangController.php';

// Điều hướng module
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
            http_response_code(404);
            echo 'Không tìm thấy action';
        }
        break;

    default:
        $controller = new DashboardController($pdo);
        $controller->index();
        break;
}