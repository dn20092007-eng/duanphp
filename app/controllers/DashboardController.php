
<?php

require_once __DIR__ . '/User_AuthController.php';

class DashboardController
{
    public function index()
    {
        $pageTitle = 'Shop Quần Áo';

        require __DIR__ . '/../view/dashboard/dashboard_view.php';
    }
}
