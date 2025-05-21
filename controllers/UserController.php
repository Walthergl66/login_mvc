<?php
namespace Controllers;

use Models\Database;
use Models\User;

class UserController {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new User($this->db);
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
            $username = trim($username);
            $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $email = trim($email);

            $password = $_POST['password'];

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $result = $this->userModel->create($username, $email, $password);
                if ($result === true) {
                    $message = "Registration successful.";
                } elseif ($result === 'duplicate') {
                    $message = "Username or email already exists.";
                } else {
                    $message = "Registration error.";
                }
            } else {
                $message = "Invalid email format.";
            }
            require 'views/register.php';
        } else {
            require 'views/register.php';
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
            $username = trim($username);
            $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

            $password = $_POST['password'];

            $user = $this->userModel->find($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                header('Location: ?action=dashboard');
                exit();
            } else {
                $message = "Incorrect username or password.";
                require 'views/login.php';
            }
        } else {
            require 'views/login.php';
        }
    }

    public function dashboard() {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            require 'views/dashboard.php';
        } else {
            header('Location: ?action=login');
            exit();
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ?action=login');
        exit();
    }
}
