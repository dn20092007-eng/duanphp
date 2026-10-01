<?php

require_once "app/controner/DashboardController.php";
require_once "app/controner/SanPhamController.php";



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