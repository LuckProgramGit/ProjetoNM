<?php
include 'conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto_id = $_POST['produto_id'];
    $quantidade = intval($_POST['quantidade']);

    $sql = "SELECT quantidade_produto FROM produto WHERE id_produto = :produto_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $quantidade_atual = $row['quantidade_produto'];

    if ($quantidade <= $quantidade_atual && $quantidade > 0) {
        $nova_quantidade = $quantidade_atual - $quantidade;
        $sql = "UPDATE produto SET quantidade_produto = :nova_quantidade WHERE id_produto = :produto_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nova_quantidade', $nova_quantidade, PDO::PARAM_INT);
        $stmt->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $mensagem = "Produto(s) excluído(s) com sucesso!";
        } else {
            $mensagem = "Erro ao excluir o produto.";
        }
    } else {
        $mensagem = "Quantidade Insuficiente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/excluirprod.css">
</head>
<body>

<div class="excluir-container">
    <h2>Excluir Produto</h2>
    <br>
    <?php if(isset($mensagem)) echo "<p>$mensagem</p>"; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="produto_id">Selecione o Produto:</label>
            <select id="produto_id" name="produto_id" required>
                <option value="" selected>Selecione o produto a ser excluído</option>
                <?php
                $stmt_produtos = $pdo->prepare("SELECT id_produto, nome_produto, quantidade_produto FROM produto");
                $stmt_produtos->execute();
                while ($row = $stmt_produtos->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id_produto'] . "'>" . $row['nome_produto'] . " (Quantidade: " . $row['quantidade_produto'] . ")" . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade a ser excluída:</label>
            <input type="number" id="quantidade" name="quantidade" min="1" required>
        </div>
        <div class="button-container">
            <button type="submit" class="btn">Excluir Produto</button>
        </div>
    </form>
</div>

<div class="btn-container">
    <a href="produto.php" class="btn" styte="text-align: center;">Página inicial</a>
</div>  

</body>
</html>
