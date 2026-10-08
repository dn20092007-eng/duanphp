<?php

session_start();

// Chưa đăng nhập → Login
if (!isset($_SESSION['nguoi_dung'])) {
    header('Location: /ban-quan-ao/login.php');
    exit();
}

require_once __DIR__ . '/database/userdatabase.php';
require_once __DIR__ . '/app/controllers/DashboardController.php';
require_once __DIR__ . '/app/controllers/SanPhamController.php';
require_once __DIR__ . '/app/controllers/UserController.php';

$modun = $_GET['modun'] ?? '';
$action = $_GET['action'] ?? '';

switch ($modun) {

    case 'sanpham':

        $controller = new SanPhamController();

        if ($action === 'themmoi') {
            $controller->themmoisp();
        } else {
            $controller->index();
        }

        break;

    case 'user':

        $controller = new UserController($pdo);

        if (method_exists($controller, $action ?: 'index')) {
            $controller->{$action ?: 'index'}();
        } else {
            echo 'Không tìm thấy action';
        }

        break;

    default:

        $controller = new DashboardController();
        $controller->index();

        break;
}