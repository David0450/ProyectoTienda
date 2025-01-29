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
            include_once 'Views/home/view.php';
        } else {
            include_once 'Views/home/login.php';
        }
    }
    
    public function signup() {
        
        if ($this->userModel->signup()) {
            $_POST['uri'] = '/';
            $_GET['uri'] = '/';
            include_once 'Views/home/view.php';
        } else {
            include_once 'Views/home/login.php';
        }
    }

    public function logout() {
        
        $this->userModel->logout();
        $_POST['uri'] = '/';
        $_GET['uri'] = '/';
        include_once 'Views/home/view.php';
    }

    public function profileView() {

        $userData = $this->userModel->getById($_SESSION['user_id']);
        include_once 'Views/user/profile.php';
    }
}
