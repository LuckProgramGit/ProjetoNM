<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/excluircarro.css">
    <title>Excluir Carros</title>
</head>
<body>
    <div class="container">
        <h2>Excluir Carros</h2>
        <hr><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="modelo_carro">Selecione o carro que deseja excluir:</label><br>
            <select id="modelo_carro" name="modelo_carro">
                <?php
                include 'conexao.php';

                $sql = "SELECT id_carro, modelo_carro FROM carro";
                $result = $pdo->query($sql);

                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row['id_carro'] . "'>" . $row['modelo_carro'] . "</option>";
                    }
                } else {
                    echo "<option disabled>Nenhum carro encontrado</option>";
                }
                ?>
            </select><br><br>
            <label for="quantidade_carro">Quantidade de carros a ser excluída:</label>
            <input type="number" id="quantidade_carro" name="quantidade_carro" min="1" required><br><br>
            <input type="submit" value="Excluir Carros">
        </form>
        <br>
        <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_carro = $_POST['modelo_carro'];
            $quantidade_carro = $_POST['quantidade_carro'];

            $sql = "SELECT quantidade_carro FROM carro WHERE id_carro = :id_carro";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_carro', $id_carro);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && $quantidade_carro > 0 && $row['quantidade_carro'] >= $quantidade_carro) {
                $sql = "UPDATE carro SET quantidade_carro = quantidade_carro - :quantidade_carro WHERE id_carro = :id_carro";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_carro', $id_carro);
                $stmt->bindParam(':quantidade_carro', $quantidade_carro);
                
                if ($stmt->execute()) {
                    $_SESSION['message'] = "Carro excluído com sucesso.";
                } else {
                    $_SESSION['message'] = "Erro ao excluir carros.";
                }
            } else {
                $_SESSION['message'] = "Quantidade insuficiente.";
            }

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
    </div>
    <div class="btn-container">
        <a href="carro.php" class="btn">Página inicial</a>
    </div>
</body>
</html>
