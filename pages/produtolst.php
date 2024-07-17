<?php
include 'conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
}

try {
    $stmt = $pdo->query("SELECT * FROM produto");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar produtos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="../CSS/produtolst.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
</head>
<body>

    <div class="container">
        <h1>Lista de Produtos</h1>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>ID do Produto</th>
                    <th>Nome do Produto</th>
                    <th>Preço</th>
                    <th>Cor</th>
                    <th>Data de Fabricação</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto) { ?>
                    <tr>
                        <td><?php echo $produto['id_produto']; ?></td>
                        <td><?php echo $produto['nome_produto']; ?></td>
                        <td><?php echo $produto['preco_produto']; ?></td>
                        <td><?php echo $produto['cor_produto']; ?></td>
                        <td><?php echo $produto['ano_fabricacao_produto']; ?></td>
                        <td><?php echo $produto['quantidade_produto']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <br>

    </div>

    <br><br>

<div>
    <a href="produto.php" class="btn">Página inicial</a>
</div>
<br><br>
</body>
</html>
