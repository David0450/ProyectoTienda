<?php 

class User extends EmptyModel {
    public function __construct($primaryKey = 'idUsuario') {
        parent::__construct('usuarios', $primaryKey);
    }

    public function login() {
        try {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
            $query->bindParam(':email', $email);
            $query->execute();

            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                //session_start();
                $_SESSION['user_id'] = $user['idUsuario'];
                $_SESSION['user_role'] = $user['idRol'];
                $_SESSION['username'] = $user['username'];
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function signup() {
        try {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $query = $this->db->prepare("INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)");
            $query->bindParam(':username', $username);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);
            $query->execute();

            $_SESSION['user_id'] = $this->db->lastInsertId();
            $_SESSION['user_role'] = 1;

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        return true;
    }
}