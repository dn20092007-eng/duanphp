
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
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        exit('Form chưa gửi dữ liệu bằng POST.');
    }

    try {
        $result = $this->model->create($_POST);

        if ($result) {
            header('Location: index.php?modun=user&action=index');
            exit;
        }

        exit('Thêm người dùng thất bại.');
    } catch (PDOException $e) {
        exit(
            'Lỗi SQL: ' .
            htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8')
        );
    }
}


    public function edit()
    {
        if (!isset($_GET['id'])) {
            header('Location: index.php?modun=user&action=index');
            exit;
        }

        $user = $this->model->getById($_GET['id']);

        if (!$user) {
            exit('Không tìm thấy người dùng.');
        }

        require __DIR__ . '/../view/user/user_sua.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST'
            || !isset($_POST['id'])) {
            header('Location: index.php?modun=user&action=index');
            exit;
        }

        try {
            $this->model->update($_POST['id'], $_POST);

            header('Location: index.php?modun=user&action=index');
            exit;
        } catch (PDOException $e) {
            exit(
                'Lỗi cập nhật người dùng: '
                . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8')
            );
        }
    }

    public function delete()
    {
        if (!isset($_GET['id'])) {
            header('Location: index.php?modun=user&action=index');
            exit;
        }

        try {
            $this->model->delete($_GET['id']);
        } catch (PDOException $e) {
            exit(
                'Không thể xóa người dùng. Người dùng có thể đang có đơn hàng liên quan.'
            );
        }

        header('Location: index.php?modun=user&action=index');
        exit;
    }
}
