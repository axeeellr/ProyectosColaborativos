<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <form action="../controllers/AuthController.php?action=login" method="POST" class="bg-white p-8 rounded-xl shadow-md w-full max-w-md space-y-4">
        <h1 class="text-2xl font-bold text-center">Iniciar Sesión</h1>

        <?php if (isset($_GET['error'])): ?>
            <p class="text-red-500 text-center">Credenciales incorrectas</p>
        <?php endif; ?>

        <input type="text" name="email" placeholder="Correo" required class="w-full border p-2 rounded" />
        <input type="password" name="password" placeholder="Contraseña" required class="w-full border p-2 rounded" />
        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full hover:bg-blue-600">Entrar</button>
        <p class="text-center text-sm">¿No tienes cuenta? <a href="register.php" class="text-blue-600 underline">Regístrate</a></p>
    </form>
</body>
</html>
