<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Peças</title>
    <link rel="stylesheet" href="../css/pecalst.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">

</head>
<body>
    <h1>Lista de Peças</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Peça</th>
                <th>Preço da Peça</th>
                <th>Quantidade</th>
                <th>Lote</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexao.php';

            $sql = "SELECT * FROM peca";
            $result = $pdo->query($sql);

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_peca'] . "</td>";
                    echo "<td>" . $row['nome_peca'] . "</td>";
                    echo "<td>R$" . number_format($row['preco_peca'], 2, ',', '.') . "</td>";
                    echo "<td>" . $row['quantidade_peca'] . "</td>";
                    echo "<td>" . $row['lote_peca'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum registro encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <div class="btn-container">
        <a href="peca.php" class="btn">Página inicial</a>
    </div>
    <br><br><br><br>
</body>
</html>
