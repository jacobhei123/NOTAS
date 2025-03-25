<?php
require_once '../database/db.php';
require_once '../controllers/NoteController.php';

$noteController = new NoteController($pdo);
$currentNote = $noteController->getNoteById($_GET['id']); // Usando o controlador para buscar a nota

if (!$currentNote) {
    die("Nota não encontrada."); // Tratamento para notas inexistentes
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Note</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5 bg-white rounded shadow">
        <h1 class="text-3xl font-bold mb-5">Edit Note</h1>
        <form action="../controllers/NoteController.php?action=update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($currentNote->id); ?>">
            <input type="text" name="title" value="<?= htmlspecialchars($currentNote->title); ?>" class="block w-full p-2 mb-3 border rounded" required>
            <textarea name="content" class="block w-full p-2 mb-3 border rounded" required><?= htmlspecialchars($currentNote->content); ?></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
</body>

</html>