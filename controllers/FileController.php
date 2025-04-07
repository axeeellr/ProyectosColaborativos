<?php
require_once '../models/File.php';

class FileController {
    public function upload($file, $id_project) {
        $archivo = new File();
        $archivo->upload($file, $id_project);
        header("Location: ../views/view_project.php?id=$id_project");
    }

    public function delete($id, $id_project) {
        $archivo = new File();
        $archivo->delete($id);
        header("Location: view_project.php?id=$id_project");
    }
}
