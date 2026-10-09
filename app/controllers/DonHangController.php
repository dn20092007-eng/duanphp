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
        if (isset($_POST['them'])) {
            $this->model->add($_POST['ten_khach_hang'], $_POST['tong_tien'], $_POST['trang_thai']);
            header('Location: index.php?modun=donhang');
            exit();
        }

        if (isset($_GET['xoa'])) {
            $this->model->delete($_GET['xoa']);
            header('Location: index.php?modun=donhang');
            exit();
        }

        $donhang = $this->model->getAll();
        require_once __DIR__ . '/../view/donhang/donhang_view.php';
    }
}