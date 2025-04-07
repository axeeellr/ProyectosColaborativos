<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="../controllers/AuthController.php?action=login" method="POST">
        <label>Email:</label>
        <input type="text" name="email" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
    <a href="register.php">Crear nueva cuenta</a>
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">Credenciales incorrectas</p>
    <?php endif; ?>
</body>
</html>
