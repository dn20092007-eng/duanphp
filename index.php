<?php

require_once "app/controllers/DashboardController.php";
require_once "app/controllers/SanPhamController.php";
require_once "app/controllers/userController.php";



$modun = $_GET['modun']  ?? "" ;
$action= $_GET['action'] ?? "" ;


switch($modun):
case "sanpham":
    $controller = new SanphamController();

    if($action=="themmoi"){
        $controller -> themmoisp();
        
        
    }else{
        $controller -> index();
    }
    

    


    break;
default:
$controller = new DashboardController();

$controller->index();

break;
endswitch;




?>