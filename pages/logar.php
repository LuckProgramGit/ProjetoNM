<<?php
session_start();

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['senha'])) {
        include('conexao.php');

        $email = $_POST['username'];
        $senha = $_POST['senha'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email_usuario = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($usuario && password_verify($senha, $usuario['senha_usuario'])) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['logado'] = true;
                header("Location: Home.php");
                exit;
            } else {
                $erro = "E-mail ou senha incorretos.";
            }
        } catch (PDOException $e) {
            echo "Erro ao tentar logar: " . $e->getMessage();
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}

if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
</head>

<body>



    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           <hr><br>    
        <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="senha" required>
            </div>
           
            <button type="submit" class="btn-login">Login</button>
           
        </div> 
        <div class="btn-container">
              <a href="Home.php" class="btn">Home</a>
        </div>


       
</body>

</html>
