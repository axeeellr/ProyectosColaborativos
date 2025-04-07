<?php
require_once '../config/database.php';

class Project {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function create($titulo, $descripcion, $id_user) {
        $sql = "INSERT INTO projects (titulo, descripcion, id_user) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$titulo, $descripcion, $id_user]);
    }

    public function getAllByUser($id_user) {
        $sql = "SELECT * FROM projects WHERE id_user = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $titulo, $descripcion) {
        $stmt = $this->conn->prepare("UPDATE projects SET titulo = ?, descripcion = ? WHERE id = ?");
        return $stmt->execute([$titulo, $descripcion, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM projects WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
