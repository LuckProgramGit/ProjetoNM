<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_peca = $_POST['nome_peca'];
    $preco_peca = $_POST['preco_peca'];
    $quantidade_peca = $_POST['quantidade_peca'];
    $lote_peca = $_POST['lote_peca'];

    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("INSERT INTO peca (nome_peca, preco_peca) VALUES (:nome_peca, :preco_peca)");
        $stmt->execute(['nome_peca' => $nome_peca, 'preco_peca' => $preco_peca]);

        $id_peca = $pdo->lastInsertId();

        $stmt = $pdo->prepare("UPDATE peca SET quantidade_peca = quantidade_peca + :quantidade_peca, lote_peca = :lote_peca WHERE id_peca = :id_peca");
        $stmt->execute(['quantidade_peca' => $quantidade_peca, 'lote_peca' => $lote_peca, 'id_peca' => $id_peca]);

        $pdo->commit();

        header("Location: pecalst.php?success=true");
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Erro ao registrar a peça: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar peças</title>
    <link rel="stylesheet" href="../css/peca.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
</head>
<body>
    
    <h1>Registrar Peças</h1>
    <form action="peca.php" method="POST">
        <br><br>
        
        <label for="nome_peca">Nome da Peça:</label>
        <input type="text" id="nome_peca" name="nome_peca" required><br><br>

        <label for="preco_peca">Preço da Peça:</label>
        <input type="number" id="preco_peca" name="preco_peca" step="0.01" required><br><br>

        <label for="quantidade_peca">Quantidade de Peças:</label>
        <input type="number" id="quantidade_peca" name="quantidade_peca" required><br><br>

        <label for="lote_peca">Lote:</label>
        <input type="number" id="lote_peca" name="lote_peca" required><br><br>
        
        <input type="submit" value="Registrar Peça">
        <br><br>
    </form>
    <br><br>      
      <div class="btn-container">
        <div style="text-align: center;text-decoration: none;">
            <a href="pecalst.php" class="btn1">Lista de Peças</a>
        </div>
        <br><br>
        <div style="text-align: center;text-decoration: none;">
            <a href="excluirpeca.php" class="btn2">Excluir Peças</a>
        </div>
        <br><br>
        <div style="text-align: center;text-decoration: none;">
                 <a href="Home.php" class="btn3">Home</a>
        </div>
        </div>
        <br><br>
    </body>
</html>
