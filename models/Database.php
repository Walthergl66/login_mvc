<?php
namespace Models;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $db   = 'login_mvc';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            exit('Database connection error'); // Evitamos mostrar detalles del error
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
