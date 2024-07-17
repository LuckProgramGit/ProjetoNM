<?php


include 'conexao.php'; 

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cnpj'])) {
        $cnpj = $_POST['cnpj'];

        try {
            $stmt = $pdo->prepare("DELETE FROM fornecedor WHERE cnpj_fornecedor = :cnpj");
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->execute();

            header("Location: fornecedorlst.php");
            exit;
        } catch (PDOException $e) {
            echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Fornecedor</title>
    <link rel="stylesheet" href="..\css\excluirfor.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">

</head>

<body>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2 style="text-align: center;">Excluir Fornecedor</h2>
            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" id="cnpj" name="cnpj" required>
            </div>
            <div class="form-group">
                <button type="submit">Excluir Fornecedor</button>
            </div>
        </form>
        <br>
        <div class="form-group" style="text-align: center;"> <button>
            <a href="fornecedorlst.php"><span style="color: azure; text-decoration: none;">Lista de Fornecedores</span></a></button>
        </div>
        <?php if ($erro) { ?>
            <div class="erro"><?php echo $erro; ?></div>
        <?php } ?>
    </div>
    
    <br>
</body>
        <div class="btn-container">
                 <a href="fornecedor.php" class="btn">Página inicial</a>
        </div>   

</html>
