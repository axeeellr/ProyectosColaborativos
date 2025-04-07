    <?php
    session_start();
    if (!isset($_SESSION['user_id'])) header("Location: login.php");

    require_once '../models/Project.php';
    require_once '../models/File.php';

    $project = (new Project())->getById($_GET['id']);
    $archivos = (new File())->getByProject($_GET['id']);
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?php echo htmlspecialchars($project['titulo']); ?></title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 min-h-screen p-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">
            <div>
                <h2 class="text-2xl font-bold"><?php echo htmlspecialchars($project['titulo']); ?></h2>
                <p class="text-gray-700 mt-2"><?php echo htmlspecialchars($project['descripcion']); ?></p>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">Subir archivo</h3>
                <form action="file_upload.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <input type="file" name="archivo" required class="block w-full p-2 border rounded" />
                    <input type="hidden" name="id_project" value="<?php echo $project['id']; ?>">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
                </form>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">Archivos adjuntos</h3>
                <ul class="space-y-2">
                    <?php foreach ($archivos as $a): ?>
                        <li class="bg-gray-50 p-3 rounded shadow flex justify-between items-center">
                            <a href="../ <?php echo $a['nombre_archivo']; ?>" target="_blank" class="text-blue-600 hover:underline">
                                <?php echo $a['nombre_archivo']; ?>
                            </a>
                            <a href="file_delete.php?id=<?php echo $a['id']; ?>&project=<?php echo $project['id']; ?>" class="text-red-600 text-sm hover:underline">Eliminar</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="text-center">
                <a href="dashboard.php" class="text-blue-600 underline hover:text-blue-800">← Volver al Dashboard</a>
            </div>
        </div>
    </body>
    </html>
