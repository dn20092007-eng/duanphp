<?php
class SanphamController{
    public function __construct() {
        
    }
    public function index(){
        require_once __DIR__."/../view/sanpham/sanpham_view.php";
    }
    

    public function themmoisp(){
        require_once __DIR__."/../view/sanpham/sanpham_themmoi.php";
    }

}


?>