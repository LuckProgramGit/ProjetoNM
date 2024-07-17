<?php
include 'conexao.php';

if ($pdo) {
    $stmt = $pdo->query("SELECT * FROM carro");

    if ($stmt) {
        $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Erro ao executar a consulta.";
    }
} else {
    echo "Erro ao conectar ao banco de dados.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de carros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/carrolst.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">

</head>
<body>
    <div class="container">
        <h1>Lista de carros produzidos</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Modelo</th>
                    <th style="text-align: center;">Ano de Fabricação</th>
                    <th style="text-align: center;">Cor</th>
                    <th style="text-align: center;">Número do Chassi</th>
                    <th style="text-align: center;">Preço</th>
                    <th style="text-align: center;">Quantidade</th>
                    <th style="text-align: center;">Lote</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros as $carro) : ?>
                    <>
                        <td><?php echo $carro['id_carro']; ?></td>
                        <td><?php echo $carro['modelo_carro']; ?></td>
                        <td><?php echo $carro['ano_fabricacao_carro']; ?></td>
                        <td><?php echo $carro['cor_carro']; ?></td>
                        <td><?php echo $carro['numero_chassi_carro']; ?></td>
                        <td><?php echo $carro['preco_carro']; ?></td>
                        <td><?php echo $carro['quantidade_carro']; ?></td>
                        <td><?php echo $carro['lote_carro']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br><br>
    </div>
</body>
        <div class="btn-container">
                 <a href="carro.php" class="btn">Página inicial</a>
        </div>  
        <br><br>
</html>
