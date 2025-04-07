<?php
require_once '../config/database.php';

class User {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function register($nombre, $email, $password) {
        $sql = "INSERT INTO users (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        return $stmt->execute([$nombre, $email, $hashed]);
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
