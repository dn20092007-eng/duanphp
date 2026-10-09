
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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $thongBao = '';

        // Nếu đã đăng nhập thì về trang chủ
        if (isset($_SESSION['nguoi_dung'])) {
            header('Location: /ban-quan-ao/index.php');
            exit();
        }

        // Xử lý form đăng nhập
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tenDangNhap = trim($_POST['ten_dang_nhap'] ?? '');
            $matKhau = $_POST['mat_khau'] ?? '';

            if ($tenDangNhap === '' || $matKhau === '') {
                $thongBao = 'Vui lòng nhập đầy đủ thông tin!';
            } else {
                $nd = $this->loginModel->getUserByUsername($tenDangNhap);

                if (!$nd) {
                    $thongBao = 'Tên đăng nhập không tồn tại!';
                } elseif ($nd['MatKhau'] !== $matKhau) {
                    $thongBao = 'Mật khẩu không đúng!';
                } elseif ($nd['TrangThai'] === 'Khoa') {
                    $thongBao = 'Tài khoản đã bị khóa!';
                } else {
                    // Lấy đúng vai trò từ database
                    $vaiTro = trim($nd['VaiTro'] ?? '');

                    if (!in_array($vaiTro, ['Admin', 'Staff', 'User'], true)) {
                        $thongBao = 'Vai trò tài khoản không hợp lệ!';
                    } else {
                        session_regenerate_id(true);

                        $_SESSION['nguoi_dung'] = [
                            'MaNguoiDung' => $nd['MaNguoiDung'],
                            'TenDangNhap' => $nd['TenDangNhap'],
                            'TenHienThi'  => $nd['TenHienThi'],
                            'VaiTro'      => $vaiTro
                        ];

                        // Cập nhật lịch sử đăng nhập
                        $this->loginModel->updateLoginHistory(
                            $nd['MaNguoiDung']
                        );

                        header('Location: /ban-quan-ao/index.php');
                        exit();
                    }
                }
            }
        }

        // Hiển thị form đăng nhập
        require __DIR__ . '/../view/login/login.php';
    }
}

