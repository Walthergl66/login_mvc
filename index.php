<?php
session_start();

// Autocargador de clases
spl_autoload_register(function ($class) {
    $base_dir = __DIR__ . '/';
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use Controllers\UserController;

$controller = new UserController();

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($action) {
    case 'register':
        $controller->register();
        break;
    case 'login':
        $controller->login();
        break;
    case 'dashboard':
        $controller->dashboard();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        $controller->login();
        break;
}
?>
