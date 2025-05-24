<?php
require_once './Models/UserModel.php';
require_once './Views/UserView.php';

class UserController {
    private $userModel;
    private $userView;

    public function __construct($username) {
        $this->userModel = new UserModel($username);
        $this->userView = new UserView();
    }

    public function showUser() {
        $username = $this->userModel->getUsername();
        $this->userView->displayUsername($username);
    }
}
