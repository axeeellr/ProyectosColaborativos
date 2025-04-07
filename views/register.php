<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Registro</title></head>
<body>
    <h2>Registro</h2>
    <form action="../controllers/AuthController.php?action=register" method="POST">
        <label>Usuario:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Email:</label>
        <input type="text" name="email" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
    <a href="login.php">Ir al Login</a>
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">Credenciales incorrectas</p>
    <?php endif; ?>
</body>
</html>
