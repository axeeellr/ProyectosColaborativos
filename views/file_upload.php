<?php
session_start();
if (!isset($_SESSION['user_id'])) header('Location: login.php');

require_once '../controllers/FileController.php';

if (isset($_FILES['archivo']) && isset($_POST['id_project'])) {
    $archivo = $_FILES['archivo'];
    $id_project = $_POST['id_project'];

    $upload_dir = '../uploads/';
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

    $nombre = basename($archivo['name']);
    $ruta = $upload_dir . time() . '_' . $nombre;

    if (move_uploaded_file($archivo['tmp_name'], $ruta)) {
        $file = new File();
        $file->upload([
            'id_project' => $id_project,
            'nombre_archivo' => $nombre,
            'ruta' => $ruta,
            'type' => $archivo['type']
        ], $id_project);
    }
}
header("Location: view_project.php?id=$id_project");
