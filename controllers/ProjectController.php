<?php
require_once '../models/Project.php';

class ProjectController {
    public function create($data, $id_user) {
        $project = new Project();
        $project->create($data['titulo'], $data['descripcion'], $id_user);
        header("Location: dashboard.php");
    }

    public function update($data) {
        $project = new Project();
        $project->update($data['id'], $data['titulo'], $data['descripcion']);
        header("Location: dashboard.php");
    }

    public function delete($id) {
        $project = new Project();
        $project->delete($id);
        header("Location: dashboard.php");
    }
}
