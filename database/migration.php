<?php
require_once './db.php';
// Este script vai criar a tabela necessaria automaticamente.
// Antes de rodar, configirar o arquivo /database/db.php com as informacoes do banco.
// Para criar, basta acessar na URL diretorio-aqui/database/migration.php


try {
    // SQL para criar a tabela `notes`
    $sql = "
        CREATE TABLE IF NOT EXISTS notes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ";

    // Executar o comando
    $pdo->exec($sql);
    echo "Migration executada com sucesso. A tabela 'notes' foi criada ou já existe.";
} catch (PDOException $e) {
    die("Erro ao executar a migration: " . $e->getMessage());
}
