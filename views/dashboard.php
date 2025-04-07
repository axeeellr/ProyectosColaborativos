<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once '../models/Project.php';
$project = new Project();
$projects = $project->getAllByUser($_SESSION['user_id']['id']);
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['user_id']['nombre']; ?></h1>
    <a href="create_project.php">Nuevo Proyecto</a> | 
    <a href="logout.php">Cerrar sesión</a>
    <h2>Mis Proyectos</h2>
    <ul>
        <?php foreach ($projects as $p): ?>
            <li>
                <a href="view_project.php?id=<?php echo $p['id']; ?>">
                    <?php echo htmlspecialchars($p['titulo']); ?>
                </a>
                - <a href="edit_project.php?id=<?php echo $p['id']; ?>">Editar</a>
                - <a href="delete_project.php?id=<?php echo $p['id']; ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
