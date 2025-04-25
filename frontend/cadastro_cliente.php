<?php include('../backend/conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <h2>Cadastro de Cliente</h2>
    <form action="" method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" required><br>

        <label>Endereço:</label><br>
        <input type="text" name="endereco" required><br><br>

        <input type="submit" value="Cadastrar">

    </form>
    <br>
    <br>
    <a href="index.php" style="text-decoration: none;">
        <button>Voltar</button>
    </a>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];

        $sql = "INSERT INTO clientes (nome, email, telefone, endereco)
                VALUES ('$nome', '$email', '$telefone', '$endereco')";

        if ($conn->query($sql) === TRUE) {
            echo "Cliente cadastrado com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    }
    ?>
</body>
</html>
