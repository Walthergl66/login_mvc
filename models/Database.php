<?php
namespace Models;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $port = '5432'; // Puerto por defecto de PostgreSQL
    private $db   = 'login_mvc';
    private $user = 'postgres'; // Cambia si tu usuario es diferente
    private $pass = 'Hola'; // Añade tu contraseña si la tienes
    private $charset = 'utf8';
    private $pdo;

    public function __construct() {
        // DSN para PostgreSQL
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
