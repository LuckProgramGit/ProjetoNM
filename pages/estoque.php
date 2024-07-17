<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estoque.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
    <title>Estoque</title>
</head>
<body>
    <h1>Estoque Geral da Fábrica</h1>
    <br>
    <h2>Peças</h2>
    <table id="table1">
        <tr>
            <th>ID</th>
            <th>Nome da Peça</th>
            <th>Quantidade</th>
            <th>Lote</th>
        </tr>
        <?php
        // Conecta com o BD V.
        $conexao = new PDO("mysql:host=localhost;dbname=bd2", "root", "");

        // Consulta bd V.
        $query_pecas = $conexao->query("SELECT * FROM peca");

        // Percorre e mostra a tabela V.
        while ($peca = $query_pecas->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$peca['id_peca']}</td>"; 
            echo "<td>{$peca['nome_peca']}</td>"; 
            echo "<td>{$peca['quantidade_peca']}</td>"; 
            echo "<td>{$peca['lote_peca']}</td>"; 
            echo "</tr>";
        }
        ?>
    </table>
    <br><br>
    <h2>Produtos</h2>
    <table id="table2">
        <tr>
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Cor</th>
            <th>Ano de Fabricação</th>
            <th>Quantidade</th>
        </tr>
        <?php
        // Consulta o bd V.
        $query_produtos = $conexao->query("SELECT * FROM produto");

        // Percorre e mostra em tabela V
        while ($produto = $query_produtos->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$produto['id_produto']}</td>"; 
            echo "<td>{$produto['nome_produto']}</td>"; 
            echo "<td>{$produto['cor_produto']}</td>"; 
            echo "<td>{$produto['ano_fabricacao_produto']}</td>"; 
            echo "<td>{$produto['quantidade_produto']}</td>"; 
            echo "</tr>";
        }
        ?>
    </table>
    <br><br>
    <h2>Carros Produzidos</h2>
    <table id="table3">
        <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Ano de Fabricação</th>
            <th>Cor</th>
            <th>Número do Chassi</th>
            <th>Quantidade</th>
            <th>Lote</th>
        </tr>
        <?php
        // Consulta a tabela 'carro' no bd V.
        $query_carros = $conexao->query("SELECT * FROM carro");

        // Percorre sobre os resultados da consulta e exibe em tabela V.
        while ($carro = $query_carros->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$carro['id_carro']}</td>"; 
            echo "<td>{$carro['modelo_carro']}</td>"; 
            echo "<td>{$carro['ano_fabricacao_carro']}</td>";
            echo "<td>{$carro['cor_carro']}</td>"; 
            echo "<td>{$carro['numero_chassi_carro']}</td>";
            echo "<td>{$carro['quantidade_carro']}</td>";
            echo "<td>{$carro['lote_carro']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br><br>
    <div class="btn-container">
        <a href="Home.php" class="btn">Home</a>
    </div>
    <br><br>
</body>
</html>
