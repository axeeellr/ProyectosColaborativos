<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

require_once '../controllers/ProjectController.php';

$controller = new ProjectController();
$controller->delete($_GET['id']);
