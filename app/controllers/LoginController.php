<?php

require_once __DIR__ . '/../models/LoginModel.php';

class LoginController
{
    private $loginModel;

    public function __construct($pdo)
    {
        $this->loginModel = new LoginModel($pdo);
    }

    public function login()
    {
        $thongBao = '';

        // Đã đăng nhập thì chuyển về trang chủ
        if (isset($_SESSION['nguoi_dung'])) {
            header('Location: /ban-quan-ao/index.php');
            exit();
        }

        // Xử lý khi submit form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tenDangNhap = trim($_POST['ten_dang_nhap'] ?? '');
            $matKhau = trim($_POST['mat_khau'] ?? '');

            if ($tenDangNhap === '' || $matKhau === '') {

                $thongBao = 'Vui lòng nhập đầy đủ thông tin!';

            } else {

                $nd = $this->loginModel->getUserByUsername($tenDangNhap);

                if (!$nd) {

                    $thongBao = 'Tên đăng nhập không tồn tại!';

                } elseif ($nd['MatKhau'] !== $matKhau) {

                    $thongBao = 'Mật khẩu không đúng!';

                } elseif ($nd['TrangThai'] === 'Khoa') {

                    $thongBao = 'Tài khoản đã bị khóa. Vui lòng liên hệ quản trị viên!';

                } else {

                    // Lưu thông tin người dùng vào session
                    $_SESSION['nguoi_dung'] = [
                        'MaNguoiDung' => $nd['MaNguoiDung'],
                        'TenDangNhap' => $nd['TenDangNhap'],
                        'TenHienThi'  => $nd['TenHienThi'],
                        'VaiTro'      => $nd['VaiTro']
                    ];

                    // Cập nhật lịch sử đăng nhập
                    $this->loginModel->updateLoginHistory(
                        $nd['MaNguoiDung']
                    );

                    // Đăng nhập thành công
                    header('Location: /ban-quan-ao/index.php');
                    exit();
                }
            }
        }

        // Gọi View
        require_once __DIR__ . '/../view/login/login.php';
    }
}