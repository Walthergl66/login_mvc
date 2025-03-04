<?php
namespace Models;

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($username, $email, $password) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->db->prepare($sql);
        try {
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $password_hash,
            ]);
            return true;
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) {
                return 'duplicate';
            }
            // Para depuración, puedes imprimir el mensaje de error
            // echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    public function find($username) {
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch();
    }
}
?>
