<?php session_start(); if (!isset($_SESSION['user_id'])) header("Location: login.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Proyecto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <form action="project_store.php" method="POST" class="bg-white p-8 rounded-xl shadow-md w-full max-w-md space-y-4">
        <h2 class="text-2xl font-bold text-center">Crear Proyecto</h2>

        <div>
            <label class="block mb-1 font-medium">Título:</label>
            <input type="text" name="titulo" required class="w-full border p-2 rounded" />
        </div>

        <div>
            <label class="block mb-1 font-medium">Descripción:</label>
            <textarea name="descripcion" required class="w-full border p-2 rounded h-28 resize-none"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full hover:bg-blue-600">Guardar</button>
    </form>
</body>
</html>
