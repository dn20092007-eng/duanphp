<?php

require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new UserModel($pdo);
    }

    public function index()
    {
        $users = $this->model->getAll();

        require_once __DIR__ . '/../views/user/user_view.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/user/user_themoi.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'ten_dang_nhap' => $_POST['ten_dang_nhap'],
                'mat_khau' => $_POST['mat_khau'],
                'email' => $_POST['email'],
                'ten_hien_thi' => $_POST['ten_hien_thi'],
                'vai_tro' => $_POST['vai_tro'],
                'so_dien_thoai' => $_POST['so_dien_thoai'],
                'dia_chi' => $_POST['dia_chi'],
                'trang_thai' => $_POST['trang_thai']
            ];

            $this->model->create($data);

            header('Location: index.php?controller=user&action=index');
            exit();
        }
    }
}