<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

require_once '../models/File.php';

if (isset($_GET['id']) && isset($_GET['project'])) {
    $file = new File();
    $archivo = $file->getById($_GET['id']);
    
    if (file_exists($archivo['ruta'])) {
        unlink($archivo['ruta']);
    }

    $file->delete($_GET['id']);
    header("Location: view_project.php?id=" . $_GET['project']);
}
