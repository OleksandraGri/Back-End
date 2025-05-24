<?php
require_once __DIR__ . '/autoload.php';
use Models\UserModel;

$user = new UserModel(1, "Саша", "sasha@gmail.com");
echo $user->getInfo();
