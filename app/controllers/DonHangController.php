<?php
require_once __DIR__ . '/../models/DonHangModel.php';

class DonHangController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new DonHangModel($pdo);
    }

    public function index()
    {
        $error = '';

        if (isset($_POST['them'])) {
            try {
                $this->model->add($_POST['ten_khach_hang'], $_POST['tong_tien'], $_POST['trang_thai']);
                header('Location: index.php?modun=donhang');
                exit();
            } catch (Exception $e) {
                $error = 'Lỗi khi tạo đơn hàng: ' . $e->getMessage();
            }
        }

        if (isset($_GET['xoa'])) {
            try {
                $this->model->delete($_GET['xoa']);
                header('Location: index.php?modun=donhang');
                exit();
            } catch (Exception $e) {
                $error = 'Lỗi khi xóa đơn hàng: ' . $e->getMessage();
            }
        }

        try {
            $donhang = $this->model->getAll();
        } catch (Exception $e) {
            $donhang = [];
            $error = 'Lỗi CSDL: ' . $e->getMessage() . '. (Vui lòng đảm bảo đã tạo bảng don_hang trong CSDL!)';
        }

        require_once __DIR__ . '/../view/donhang/donhang_view.php';
    }
}
