<?php
include 'conexao.php';

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['confirm_senha'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirm_senha = $_POST['confirm_senha'];

        if ($senha !== $confirm_senha) {
            $erro = "A senha e a confirmação de senha não correspondem.";
        } else {
            try {
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO usuario (id_usuario, nome_usuario, email_usuario, senha_usuario) VALUES (UUID(), :nome, :email, :senha)");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha_hash);
                $stmt->execute();

                header("Location: logar.php");
                exit;
            } catch (PDOException $e) {
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
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/cadastrar.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
</head>

<body>
    <div class="cadastro-container">
        <h2>Cadastro</h2>
        <hr><br>
        <form id="cadastroForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="confirm_senha">Confirmação de Senha:</label>
                <input type="password" id="confirm_senha" name="confirm_senha" required>
            </div>
            <button type="submit" class="btn">Cadastrar</button>
            <a href="logar.php" class="conta-link">Já tem uma conta?</a>
        </form>
        <?php if ($erro) { ?>
            <div class="erro"><?php echo $erro; ?></div>
        <?php } ?>
    </div>
</body>
</html>
