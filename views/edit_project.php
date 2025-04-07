<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

require_once '../models/Project.php';
$project = (new Project())->getById($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head><title>Editar Proyecto</title></head>
<body>
    <h2>Editar Proyecto</h2>
    <form action="project_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($project['titulo']); ?>" required><br>
        <label>Descripción:</label>
        <textarea name="descripcion" required><?php echo htmlspecialchars($project['descripcion']); ?></textarea><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
