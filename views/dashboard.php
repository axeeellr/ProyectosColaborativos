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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-xl p-6 space-y-6">
        <h1 class="text-2xl font-bold">Bienvenido, <?php echo $_SESSION['user_id']['nombre']; ?></h1>

        <div class="flex justify-between items-center">
            <a href="create_project.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Nuevo Proyecto</a>
            <a href="logout.php" class="text-red-500 underline hover:text-red-600">Cerrar sesión</a>
        </div>

        <h2 class="text-xl font-semibold mt-4">Mis Proyectos</h2>
        <ul class="space-y-2">
            <?php foreach ($projects as $p): ?>
                <li class="bg-gray-50 p-4 rounded shadow flex justify-between items-center">
                    <div>
                        <a href="view_project.php?id=<?php echo $p['id']; ?>" class="text-blue-600 font-medium hover:underline">
                            <?php echo htmlspecialchars($p['titulo']); ?>
                        </a>
                    </div>
                    <div class="flex gap-4 text-sm">
                        <a href="edit_project.php?id=<?php echo $p['id']; ?>" class="text-yellow-600 hover:underline">Editar</a>
                        <a href="delete_project.php?id=<?php echo $p['id']; ?>" class="text-red-600 hover:underline">Eliminar</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
