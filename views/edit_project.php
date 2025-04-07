<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

require_once '../models/Project.php';
$project = (new Project())->getById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-6 rounded-xl shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Editar Proyecto</h2>
        <form action="project_update.php" method="POST" class="space-y-4">
            <input type="hidden" name="id" value="<?php echo $project['id']; ?>">

            <div>
                <label class="block mb-1 font-medium">Título:</label>
                <input type="text" name="titulo" value="<?php echo htmlspecialchars($project['titulo']); ?>" required class="w-full p-2 border rounded" />
            </div>

            <div>
                <label class="block mb-1 font-medium">Descripción:</label>
                <textarea name="descripcion" required class="w-full p-2 border rounded"><?php echo htmlspecialchars($project['descripcion']); ?></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">
                Actualizar
            </button>
        </form>
    </div>
</body>
</html>
