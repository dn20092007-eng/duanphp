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
        if (isset($_POST['them'])) {
            $this->model->add($_POST['ten_sp'], $_POST['gia']);
            header('Location: index.php?modun=sanpham');
            exit();
        }

        if (isset($_GET['xoa'])) {
            $this->model->delete($_GET['xoa']);
            header('Location: index.php?modun=sanpham');
            exit();
        }

        $sanpham = $this->model->getAll();
        require_once __DIR__ . '/../view/sanpham/sanpham_view.php';
    }
}