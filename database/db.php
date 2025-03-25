<?php
// Configuração do banco de dados

// INFORMAR OS DADOS NOS 4 CAMPOS ABAIXO PARA CONECTAR COM O BANCO DE DADOS. 

$host = 'localhost';        // host do banco, IP 
$dbname = 'db_anotacoes';   // nome do banco 
$user = 'root';             // usuario do banco
$password = '';             // senha do banco (vazio por padrao quando usando xampp)

/***************************************/

// Tenta iniciar uma conexao com o banco atraves dos dados setados acima.
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
