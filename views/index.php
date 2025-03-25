<?php
require_once '../controllers/NoteController.php';

$noteController = new NoteController($pdo);
$notes = $noteController->getAllNotes();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Notes</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5 bg-white rounded shadow">
        <h1 class="text-3xl font-bold mb-5">Notes</h1>
        <a href="create.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Note</a>
        <div class="mt-5">
            <?php foreach ($notes as $note): ?>
                <div class="note border p-3 mb-3 bg-gray-50 rounded shadow">
                    <h2 class="font-bold text-xl"><?= htmlspecialchars($note->title); ?></h2>
                    <p><?= nl2br(htmlspecialchars($note->content)); ?></p>
                    <a href="edit.php?id=<?= $note->id; ?>" class="text-blue-500 hover:underline">Edit</a> |
                    <a href="../controllers/NoteController.php?action=delete&id=<?= $note->id; ?>" class="text-red-500 hover:underline">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>