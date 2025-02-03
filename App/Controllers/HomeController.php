<?php

class HomeController {
    public function index() {
        require 'Views/home/home_view.php';
    }

    public function login() {
        require 'Views/home/login.php';
    }
}