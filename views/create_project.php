<?php session_start(); if (!isset($_SESSION['user_id'])) header("Location: login.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Nuevo Proyecto</title></head>
<body>
    <h2>Crear Proyecto</h2>
    <form action="project_store.php" method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" required><br>
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
