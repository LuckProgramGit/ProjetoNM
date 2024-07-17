<?php
$host = 'localhost'; 
$dbname = 'bd2'; 
$usuario = 'root'; 
$senha_db = ''; 

$mysqli = new mysqli($host, $usuario, $senha_db, $dbname);

if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    exit;
}
?>
