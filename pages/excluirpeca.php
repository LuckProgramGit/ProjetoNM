<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/excluirpeca.css">
    <title>Excluir Peças</title>
</head>
<body>
    <div class="container">
        <h2>Excluir Peças</h2>
        <hr><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="id_peca">Selecione a peça que deseja excluir:</label><br>
            <select id="id_peca" name="id_peca">
                <?php
                include 'conexao.php';

                try {
                    $sql = "SELECT id_peca, nome_peca FROM peca";
                    $result = $pdo->query($sql);

                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row['id_peca'] . "'>" . $row['nome_peca'] . "</option>";
                        }
                    } else {
                        echo "<option disabled>Nenhuma peça encontrada</option>";
                    }
                } catch (PDOException $e) {
                    echo "Erro ao buscar peças: " . $e->getMessage();
                }
                ?>
            </select><br><br>
            <label for="quantidade_peca">Quantidade a ser excluída:</label>
            <input type="number" id="quantidade_peca" name="quantidade_peca" min="1" required><br><br>
            <input type="submit" value="Excluir Peça">
        </form>
        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_peca = $_POST['id_peca'];
            $quantidade_peca = $_POST['quantidade_peca'];

            try {
                $sql = "SELECT quantidade_peca FROM peca WHERE id_peca = :id_peca";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_peca', $id_peca);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $quantidade_atual = $row['quantidade_peca'];

                if ($quantidade_atual >= $quantidade_peca) {
                    $sql = "UPDATE peca SET quantidade_peca = quantidade_peca - :quantidade_peca WHERE id_peca = :id_peca";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':id_peca', $id_peca);
                    $stmt->bindParam(':quantidade_peca', $quantidade_peca);
                    
                    if ($stmt->execute()) {
                        echo "Peça excluída com sucesso";
                    } else {
                        echo "Erro ao excluir a peça.";
                    }
                } else {
                    echo "Quantidade inválida. Disponível: " . $quantidade_atual;
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        ?>
    </div>
    <div class="btn-container">
        <a href="peca.php" class="btn">Página inicial</a>
    </div>  
</body>
</html>
