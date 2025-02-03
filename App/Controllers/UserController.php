<?php
require_once 'Models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        echo "Hola desde el UserController";
    }
    
    public function login() {

        if ($this->userModel->login()) {
            $_POST['uri'] = '/';
            $_GET['uri'] = '/';
            include_once 'Views/home/home_view.php';
        } else {
            include_once 'Views/home/login.php';
        }
    }
    
    public function signup() {
        
        if ($this->userModel->signup()) {
            $_POST['uri'] = '/';
            $_GET['uri'] = '/';
            include_once 'Views/home/home_view.php';
        } else {
            include_once 'Views/home/login.php';
        }
    }

    public function logout() {
        
        $this->userModel->logout();
        $_POST['uri'] = '/';
        $_GET['uri'] = '/';
        include_once 'Views/home/home_view.php';
    }

    public function profileView() {
        include_once 'Views/user/profile.php';
    }
}
