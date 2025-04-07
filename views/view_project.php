<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

require_once '../models/Project.php';
require_once '../models/File.php';

$project = (new Project())->getById($_GET['id']);
$archivos = (new File())->getByProject($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head><title><?php echo htmlspecialchars($project['titulo']); ?></title></head>
<body>
    <h2><?php echo htmlspecialchars($project['titulo']); ?></h2>
    <p><?php echo htmlspecialchars($project['descripcion']); ?></p>

    <h3>Subir archivo</h3>
    <form action="file_upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo" required>
        <input type="hidden" name="id_project" value="<?php echo $project['id']; ?>">
        <button type="submit">Subir</button>
    </form>

    <h3>Archivos adjuntos</h3>
    <ul>
        <?php foreach ($archivos as $a): ?>
            <li>
                <a href="<?php echo $a['ruta']; ?>" target="_blank"><?php echo $a['nombre_archivo']; ?></a>
                - <a href="file_delete.php?id=<?php echo $a['id']; ?>&project=<?php echo $project['id']; ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="dashboard.php">Volver</a>
</body>
</html>
