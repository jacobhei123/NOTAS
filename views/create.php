<?php
require_once '../database/db.php';
require_once '../controllers/NoteController.php';

// Inicializa o controlador
$noteController = new NoteController($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create Note</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5 bg-white rounded shadow">
        <h1 class="text-3xl font-bold mb-5">Add New Note</h1>
        <form action="../controllers/NoteController.php?action=create" method="POST">
            <input type="text" name="title" placeholder="Title" class="block w-full p-2 mb-3 border rounded" required>
            <textarea name="content" placeholder="Content" class="block w-full p-2 mb-3 border rounded" required></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
        </form>

    </div>
</body>

</html>