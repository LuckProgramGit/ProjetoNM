<?php
include 'conexao.php';

$mensagem = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $modelo_carro = $_POST['modelo'];
    $ano_fabricacao_carro = $_POST['fabricacao'];
    $cor_carro = $_POST['cor'];
    $numero_chassi_carro = $_POST['numeroclassi'];
    $preco_carro = $_POST['preco'];
    $lote_carro = $_POST['lote_carro'];

    $stmt_verifica = $pdo->prepare("SELECT COUNT(*) FROM carro WHERE numero_chassi_carro = :numero_chassi_carro");
    $stmt_verifica->execute(array(':numero_chassi_carro' => $numero_chassi_carro));
    $count = $stmt_verifica->fetchColumn();

    if ($count > 0) {
        $mensagem = "<h4>Número do chassi já registrado. Por favor, utilize um número diferente.</h4>";
    } else {
        $stmt_carro = $pdo->prepare("INSERT INTO carro (modelo_carro, ano_fabricacao_carro, cor_carro, numero_chassi_carro, preco_carro, lote_carro) VALUES (:modelo_carro, :ano_fabricacao_carro, :cor_carro, :numero_chassi_carro, :preco_carro, :lote_carro)");

        $resultado = $stmt_carro->execute(array(
            ':modelo_carro' => $modelo_carro,
            ':ano_fabricacao_carro' => $ano_fabricacao_carro,
            ':cor_carro' => $cor_carro,
            ':numero_chassi_carro' => $numero_chassi_carro,
            ':preco_carro' => $preco_carro,
            ':lote_carro' => $lote_carro
        ));

        if ($resultado) {
            $mensagem = "Carro registrado com sucesso!";
            header("Location: carrolst.php");
            exit();
        } else {
            $mensagem = "Erro ao registrar o carro. Por favor, tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Carros Produzidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/carro.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
</head>

<body>
    <header>
         <h1>Carros Produzidos</h1>
    </header>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
           
     
            <br>
        </div>
        <?php if (!empty($mensagem)) : ?>
            <div class="mensagem"><?php echo $mensagem; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" required min="10000">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="cor">Cor do carro:</label>
            <input type="text" id="cor" name="cor" required>
        </div>
        <br>
        <div>
            <label for="numeroclassi">Número do Chassi:</label>
            <input type="text" id="numeroclassi" name="numeroclassi" required pattern="[0-9]{12}" minlength="12" maxlength="12">
        </div>
        <div class="form-group">
            <label for="fabricacao">Ano de Fabricação:</label>
            <input type="number" id="fabricacao" name="fabricacao" required min="1900" max="<?php echo date("Y"); ?>">
        </div>
        <label for="lote_carro">Lote:</label>
            <input type="number" id="lote_carro" name="lote_carro" required>
        </div>
        <br>

        <div>
            <input type="submit" value="Registrar">
        </div>
        <br><br><br>
    </form>
    <br><br>
    <div class="btn-container">
        <a href="carrolst.php" class="btn1">Lista de Carros</a>
        <br><br>
        <a href="excluircarro.php" class="btn2">Excluir Carro</a>
        <br><br>
        <a href="Home.php" class="btn3">Home</a>
    </div>
    <br><br>
</body>

</html>
