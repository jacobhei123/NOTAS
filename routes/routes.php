<?php

// Tratamento de ações
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $noteController = new NoteController($pdo);

    if ($action === 'create') {
        $noteController->createNote();
    } elseif ($action === 'update') {
        $noteController->updateNote();
    } elseif ($action === 'delete') {
        $noteController->deleteNote();
    }
}
