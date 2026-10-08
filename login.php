<?php

session_start();

require_once __DIR__ . '/database/userdatabase.php';
require_once __DIR__ . '/app/controllers/LoginController.php';

$controller = new LoginController($pdo);

$controller->login();