<?php
require_once '../config/database.php';

class File {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function upload($file, $id_project) {
        $nombre = basename($file['nombre_archivo']);
        $tipo = $file['type'] === 'application/pdf' ? 'pdf' : 'img';
        $ruta = 'uploads/' . uniqid() . "_" . $nombre;

        
        $stmt = $this->conn->prepare("INSERT INTO files (nombre_archivo, tipo_archivo, ruta, id_project) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nombre, $tipo, $ruta, $id_project]);
    }

    public function getByProject($id_project) {
        $stmt = $this->conn->prepare("SELECT * FROM files WHERE id_project = ?");
        $stmt->execute([$id_project]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("SELECT ruta FROM files WHERE id = ?");
        $stmt->execute([$id]);
        $file = $stmt->fetch();
        if ($file && file_exists($file['ruta'])) {
            unlink($file['ruta']);
        }
        $stmt = $this->conn->prepare("DELETE FROM files WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
