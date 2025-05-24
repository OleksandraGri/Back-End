<?php
require_once 'Controllers/UserController.php';

$username = "Admin";
$userController = new UserController($username);
$userController->showUser();
