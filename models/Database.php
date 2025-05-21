<?php
namespace Models;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $port = '5432'; 
    private $db   = 'login_mvc';
    private $user = 'postgres';
    private $pass = 'Hola'; 
    private $charset = 'utf8';
    private $pdo;

    public function __construct() {
        $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->db}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
    $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
} catch (PDOException $e) {
    exit('Database connection error: ' . $e->getMessage());
}

    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
