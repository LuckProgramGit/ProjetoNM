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
    if (isset($_POST['id_carro_venda']) && isset($_POST['quantidade_venda']) && isset($_POST['valor_venda']) && isset($_POST['data_venda'])) {
        $id_carro_venda = $_POST['id_carro_venda'];
        $quantidade_venda = $_POST['quantidade_venda'];
        $valor_unitario_venda = $_POST['valor_venda'];
        $data_venda = $_POST['data_venda'];

        $valor_total_venda = $quantidade_venda * $valor_unitario_venda;

        $stmt = $conn->prepare("INSERT INTO venda (id_carro_venda, quantidade_venda, valor_venda, data_venda) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iids", $id_carro_venda, $quantidade_venda, $valor_total_venda, $data_venda);

        if ($stmt->execute()) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Erro ao registrar a venda: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Dados do formulário não enviados corretamente.";
    }
}

$sql = "SELECT id_venda, id_carro_venda, quantidade_venda, valor_venda, data_venda FROM venda";
$result = $conn->query($sql);

$total_vendas = 0;

if ($result->num_rows > 0) {
    echo "<h2>Vendas Registradas</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Venda</th>
                <th>Quantidade Vendida</th>
                <th>Valor</th>
                <th>Data da Venda</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_venda"] . "</td>
                <td>" . $row["quantidade_venda"] . "</td>
                <td>R$ " . number_format($row["valor_venda"], 2, ',', '.') . "</td>
                <td>" . $row["data_venda"] . "</td>
              </tr>";
        $total_vendas += $row["valor_venda"];
    }
    echo "</table>";
    echo "<h3>Total de Vendas: R$ " . number_format($total_vendas, 2, ',', '.') . "</h3>";
} else {
    echo "<h1>Nenhuma venda registrada.</h1>";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de vendas</title>
    <link rel="stylesheet" href="../css/vendalst.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
</head>
<body>
    <div class="btn-container">
        <a href="venda.php" class="btn">Página inicial</a>
    </div>  
</body>
</html>
