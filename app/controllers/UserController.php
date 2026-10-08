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
    require __DIR__ . '/../view/user/user_view.php';
}

    public function create()
        {
    require __DIR__ . '/../view/user/user_themmoi.php';
    }
    public function store()
    {
        $this->model->create($_POST);
        header('Location: index.php?controller=user&action=index');
        exit;
    }

    public function edit()
{
    $user = $this->model->getById($_GET['id']);
    require __DIR__ . '/../view/user/user_sua.php';
}

public function update()
{
    $this->model->update($_POST['id'], $_POST);

    header('Location: index.php?modun=user&action=index');
    exit;
}

    public function delete()
    {
        $this->model->delete($_GET['id']);
        header('Location: index.php?controller=user&action=index');
        exit;
    }
}