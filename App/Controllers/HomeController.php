<?php

class HomeController {
    public function index() {
        require 'Views/home/view.php';
    }

    public function login() {
        require 'Views/home/login.php';
    }
}