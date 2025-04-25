<?php include('../backend/conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Fatura</title>
</head>
<body>
    <h2>Cadastro de Fatura</h2>

    <form action="" method="post">
        <label>Cliente:</label><br>
        <select name="cliente_id" required>
            <option value="">Selecione um cliente</option>
            <?php
            $resultado = $conn->query("SELECT id, nome FROM clientes");
            while ($row = $resultado->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select><br><br>

        <label>Valor (R$):</label><br>
        <input type="number" name="valor" step="0.01" required><br>

        <label>Data de Vencimento:</label><br>
        <input type="date" name="vencimento" required><br><br>

        <input type="submit" value="Emitir Fatura">

    </form>
    <br>
    <br>

    <a href="index.php" style="text-decoration: none;">
        <button>Voltar</button>
    </a>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cliente_id = $_POST["cliente_id"];
        $valor = $_POST["valor"];
        $vencimento = $_POST["vencimento"];

        $sql = "INSERT INTO faturas (cliente_id, valor, vencimento, status)
                VALUES ('$cliente_id', '$valor', '$vencimento', 'PENDENTE')";

        if ($conn->query($sql) === TRUE) {
            echo "Fatura emitida com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    }
    ?>
</body>
</html>
