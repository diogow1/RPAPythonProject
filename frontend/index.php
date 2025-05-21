<?php

include('../backend/conexao.php'); 

$sql = "SELECT f.id, c.nome, c.email, f.valor, f.vencimento, f.status 
        FROM clientes c
        JOIN faturas f ON c.id = f.cliente_id";
$stmt = $conn->query($sql);
$faturas = $stmt;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status das Faturas</title>
</head>
<body>
    <h1>Status das Faturas</h1>
    <table border="4">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Vencimento</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($faturas as $fatura): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fatura['nome']); ?></td>
                    <td>R$ <?php echo number_format($fatura['valor'], 2, ',', '.'); ?></td>
                    <td><?php echo $fatura['vencimento']; ?></td>
                    <td><?php echo $fatura['status']; ?></td>
                    <td>
                    <?php if ($fatura['status'] == 'PENDENTE'): ?>
                    <span>FATURA NÃO ENVIADA</span>
                    <?php else: ?>
                    <span>FATURA ENVIADA</span>
                    <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <form action="../backend/executar_script.php" method="post">
    <button type="submit">Enviar Emails e Whatsapp</button>
    </form>

    <br>
    <br>
    <a href="cadastro_cliente.php" style="text-decoration: none;">
        <button>Cadastrar Cliente</button>
    </a>

    <a href="cadastro_fatura.php" style="text-decoration: none;">
        <button>Cadastrar Fatura</button>
    </a>
</body>
</html>
