<?php

session_start();

// Xóa toàn bộ session
$_SESSION = [];

// Hủy session
session_destroy();

// Quay về trang đăng nhập
header('Location: /ban-quan-ao/login.php');
exit();