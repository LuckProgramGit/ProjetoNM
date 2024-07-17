<?php
include 'conexao.php'; 

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cnpj']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['endereco'])) {
        $cnpj = $_POST['cnpj'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];

        try {
            $stmt = $pdo->prepare("INSERT INTO fornecedor (cnpj_fornecedor, nome_fornecedor, email_fornecedor, endereco_fornecedor) VALUES (:cnpj, :nome, :email, :endereco)");
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->execute();

            header("Location: fornecedorlst.php");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $erro = "CNPJ já cadastrado.";
            } else {
                $erro = "Erro de conexão com o banco de dados: " . $e->getMessage();
            }
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
    <title>Fornecedores</title>
    <link rel="stylesheet" href="../css/fornecedor.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h2 style="text-align: center;">Fornecedor</h2>
            <br><hr><br>
            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" id="cnpj" name="cnpj" required>
            </div>     
           <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>  
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome do Fornecedor:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group" style="text-align: center;">
                <button type="submit">Adicionar Fornecedor</button>
            </div>
        </form>
        <br>
        
        <br>

        <?php if ($erro) { ?>
            <div class="erro"><?php echo $erro; ?></div>
        <?php } ?>
    </div>
    <div class="btn-container">
        <a href="fornecedorlst.php" class="btn1">Lista de Fornecedores</a>
        <br><br>
        <a href="excluirfor.php" class="btn2">Excluir Fornecedor</a>
        <br><br>
        <a href="Home.php" class="btn3">Home</a>
    </div>

    <br><br><br>
</body>

</html>
