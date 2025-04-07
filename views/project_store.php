<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once '../controllers/ProjectController.php';

$controller = new ProjectController();
$controller->create($_POST, $_SESSION['user_id']['id']);
