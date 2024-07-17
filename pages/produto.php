<?php
include 'conexao.php'; 

$modelo_carro = $preco_produto = $cor_produto = $ano_fabricacao_produto = $quantidade_produto = $erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['modelo_carro']) && isset($_POST['preco_produto']) && isset($_POST['cor_produto']) && isset($_POST['ano_fabricacao_produto']) && isset($_POST['quantidade_produto'])) {
        $modelo_carro = $_POST['modelo_carro'];
        $preco_produto = $_POST['preco_produto'];
        $cor_produto = $_POST['cor_produto'];
        $ano_fabricacao_produto = $_POST['ano_fabricacao_produto'];
        $quantidade_produto = $_POST['quantidade_produto'];

        try {
            $stmt = $pdo->prepare("INSERT INTO produto (nome_produto, preco_produto, cor_produto, ano_fabricacao_produto, quantidade_produto) VALUES (:modelo_carro, :preco_produto, :cor_produto, :ano_fabricacao_produto, :quantidade_produto)");
            $stmt->bindParam(':modelo_carro', $modelo_carro);
            $stmt->bindParam(':preco_produto', $preco_produto);
            $stmt->bindParam(':cor_produto', $cor_produto);
            $stmt->bindParam(':ano_fabricacao_produto', $ano_fabricacao_produto);
            $stmt->bindParam(':quantidade_produto', $quantidade_produto);
            $stmt->execute();

            header("Location: produtolst.php");
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
    <title>Cadastro de Produto</title>
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/produto.css">
</head>
<body>

<div class="cadastro-container">
    <h2>Cadastro de Produto</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
            <legend></legend>
            <br>
            <div class="form-group">
                <label for="modelo_carro">Modelo de Carro:</label>
                <select id="modelo_carro" name="modelo_carro" required>
                    <option value="" selected>Selecione</option>          
                    <option value="Astra">Astra</option>
                    <option value="Blazer">Blazer</option>
                    <option value="Camaro">Camaro</option>
                    <option value="Celta">Celta</option>
                    <option value="Civic">Civic</option>
                    <option value="Cobalt">Cobalt</option>
                    <option value="Corsa">Corsa</option>
                    <option value="Courier">Courier</option>
                    <option value="Cruze">Cruze</option>
                    <option value="EcoSport">EcoSport</option>
                    <option value="Edge">Edge</option>
                    <option value="Equinox">Equinox</option>
                    <option value="Escape">Escape</option>
                    <option value="Etios">Etios</option>
                    <option value="Explorer">Explorer</option>
                    <option value="F-150">F-150</option>
                    <option value="F-250">F-250</option>
                    <option value="Fiesta">Fiesta</option>
                    <option value="Focus">Focus</option>
                    <option value="Fusion">Fusion</option>
                    <option value="Gol">Gol</option>
                    <option value="HB20">HB20</option>
                    <option value="Ka">Ka</option>
                    <option value="Montana">Montana</option>
                    <option value="Mustang">Mustang</option>
                    <option value="Onix">Onix</option>
                    <option value="Palio">Palio</option>
                    <option value="Prisma">Prisma</option>
                    <option value="Ranger">Ranger</option>
                    <option value="S10">S10</option>
                    <option value="Sandero">Sandero</option>
                    <option value="Spin">Spin</option>
                    <option value="Tracker">Tracker</option>
                    <option value="Transit">Transit</option>
                    <option value="Vectra">Vectra</option>
                    <?php
                    $stmt_carros = $pdo->query("SELECT modelo_carro FROM carro");
                    while ($row = $stmt_carros->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row['modelo_carro'] . "'>" . $row['modelo_carro'] . "</option>";
                    }
                    ?>
                </select>
                <br><br>
                <label for="ano_fabricacao_produto">Ano de Fabricação:</label>
                <input type="number" id="ano_fabricacao_produto" name="ano_fabricacao_produto" required>
                <br><br>
                <label for="cor_produto">Cor:</label>
                <input type="text" id="cor_produto" name="cor_produto" required>
                <br><br>
                <label for="preco_produto">Preço:</label>
                <input type="text" id="preco_produto" name="preco_produto" required>
                <br><br>
                <label for="quantidade_produto">Quantidade:</label>
                <input type="number" id="quantidade_produto" name="quantidade_produto" min="1" required>
                <br><br>
            </div>
        </fieldset>
        <button type="submit" class="btn">Cadastrar Produto</button>
        <?php
        if (!empty($erro)) {
            echo "<div class='error'>$erro</div>";
        }
        ?>
    </form>
</div>
<div class="btn-container">

<div>
    <a href="produtolst.php" class="btn1">Lista de Produtos</a>
</div>
<br>
<div>
    <a href="excluirprod.php" class="btn2">Excluir Produtos</a>
</div>
<div>
        <a href="Home.php" class="btn3">Home</a>
</div>
</div>
</body>
</html>
