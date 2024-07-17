<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_carro_venda = $_POST['id_carro_venda'] ?? null;
    $quantidade_venda = $_POST['quantidade_venda'] ?? null;
    $data_venda = $_POST['data_venda'] ?? null;
    $valor_venda = $_POST['valor_venda'] ?? null;

    if ($id_carro_venda && $quantidade_venda && $data_venda) {
        $stmt = $conn->prepare("INSERT INTO venda (id_carro_venda, quantidade_venda, valor_venda, data_venda) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $id_carro_venda, $quantidade_venda, $valor_venda, $data_venda);

        if ($stmt->execute()) {
            echo "Venda registrada com sucesso!";
        } else {
            echo "Erro ao registrar a venda: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Dados do formulário não enviados corretamente.";
        if (!$id_carro_venda) echo " id_carro_venda não definido.";
        if (!$quantidade_venda) echo " quantidade_venda não definido.";
        if (!$data_venda) echo " data_venda não definido.";
        if (!$valor_venda) echo " valor_venda não definido.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de vendas</title>
    <link rel="stylesheet" href="../css/venda.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
</head>
<body>
    <h1>Relatório de vendas</h1>
    <form action="vendalst.php" method="POST">
        <label for="id_carro_venda">ID do Carro:</label>
        <input type="text" id="id_carro_venda" name="id_carro_venda" required><br><br>
        
        <label for="quantidade_venda">Quantidade Vendida:</label>
        <input type="number" id="quantidade_venda" name="quantidade_venda" required><br><br>
        
        <label for="valor_venda">Valor da Venda:</label>
        <input type="number" id="valor_venda" name="valor_venda" step="0.01" required><br><br>
        
        <label for="data_venda">Data da Venda:</label>
        <input type="date" id="data_venda" name="data_venda" required><br><br>
        
        <input type="submit" value="Registrar Venda">
    </form>
    <br><br>
    <div class="btn-container">
                 <a href="Home.php" class="btn3">Home</a>
        </div>
</body>
</html>
