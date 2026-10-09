<?php
require_once __DIR__ . '/../models/SanPhamModel.php';

class SanPhamController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new SanPhamModel($pdo);
    }

    public function index()
    {
        $error = '';

        if (isset($_POST['them'])) {
            try {
                $this->model->add($_POST['ten_sp'], $_POST['gia']);
                header('Location: index.php?modun=sanpham');
                exit();
            } catch (Exception $e) {
                $error = 'Lỗi khi thêm sản phẩm: ' . $e->getMessage();
            }
        }

        if (isset($_GET['xoa'])) {
            try {
                $this->model->delete($_GET['xoa']);
                header('Location: index.php?modun=sanpham');
                exit();
            } catch (Exception $e) {
                $error = 'Lỗi khi xóa sản phẩm: ' . $e->getMessage();
            }
        }

        try {
            $sanpham = $this->model->getAll();
        } catch (Exception $e) {
            $sanpham = [];
            $error = 'Lỗi CSDL: ' . $e->getMessage() . '. (Vui lòng đảm bảo đã tạo bảng san_pham trong CSDL ql_shopquanao!)';
        }

        require_once __DIR__ . '/../view/sanpham/sanpham_view.php';
    }
}