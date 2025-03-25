<?php
require_once '../database/db.php';
require_once '../models/Note.php';
require_once '../routes/routes.php';
class NoteController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Obtém todas as notas
    public function getAllNotes()
    {
        $stmt = $this->pdo->query("SELECT * FROM notes ORDER BY created_at DESC");
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(fn($note) => new Note($note['id'], $note['title'], $note['content'], $note['created_at']), $notes);
    }

    // Obtém uma nota específica pelo ID
    public function getNoteById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM notes WHERE id = ?");
        $stmt->execute([$id]);
        $note = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($note) {
            return new Note($note['id'], $note['title'], $note['content'], $note['created_at']);
        }

        return null;
    }

    // Cria uma nova nota
    public function createNote()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $stmt = $this->pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
        $stmt->execute([$title, $content]);

        header('Location: ../views/index.php');
        exit;
    }

    // Atualiza uma nota existente
    public function updateNote()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $stmt = $this->pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $content, $id]);

        header('Location: ../views/index.php');
        exit;
    }

    // Exclui uma nota
    public function deleteNote()
    {
        $id = $_GET['id'];

        $stmt = $this->pdo->prepare("DELETE FROM notes WHERE id = ?");
        $stmt->execute([$id]);

        header('Location: ../views/index.php');
        exit;
    }
}
