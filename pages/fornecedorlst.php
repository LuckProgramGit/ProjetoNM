<?php

include 'conexao.php';

try {
    $stmt = $pdo->query("SELECT * FROM fornecedor");
    $fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fornecedores</title>
    <link rel="stylesheet" href="../CSS/fornecedorlst.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">

</head>

<body>

    <div class="container">
        <h1 style="text-align: center;">Lista de Fornecedores</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>CNPJ</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fornecedores as $fornecedor) { ?>
                    <tr>
                        <td><?php echo $fornecedor['cnpj_fornecedor']; ?></td>
                        <td><?php echo $fornecedor['nome_fornecedor']; ?></td>
                        <td><?php echo $fornecedor['email_fornecedor']; ?></td>
                        <td><?php echo $fornecedor['endereco_fornecedor']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <br><br>
    </div>
        <div class="form-group" style="text-align: center;">
            <a href="fornecedor.php" class="return">Página Inicial</a>
        </div>
    <br><br><br>


</body>

</html>
