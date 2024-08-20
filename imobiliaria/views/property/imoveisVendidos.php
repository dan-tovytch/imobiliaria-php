<?php

require "../../database/database.php";

$sql = "SELECT v.id_venda, c.id AS id_cliente, c.nome, i.id AS id_imovel, i.titulo, v.valor, v.forma_pagamento
        FROM vendas v
        INNER JOIN clientes c ON v.id_cliente = c.id
        INNER JOIN imoveis i ON v.id_imovel = i.id";


$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imoveis vendidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <h2 class="h2 text-center mt-3">Imóveis vendidos</h2>
    <ul class="nav justify-content-center mt-3">
        <li class="nav-item">
            <a class="btn btn-warning text-white me-2" href="/"><i class="bi bi-house-door-fill" style="font-size: 18px;"></i></a>
            <a class="btn btn-success" href="listaImoveis.php"><i class="bi bi-houses-fill" style="font-size: 18px;"></i></a>
        </li>
    </ul>
    <table class="table table-Secondary table-striped table-hover table-bordered mt-3">
        <tr>
            <th scope="col"><i class="bi bi-person-badge-fill me-2"></i>ID Venda</th>
            <th scope="col"><i class="bi bi-person-fill me-2"></i>ID Cliente</th>
            <th scope="col"><i class="bi bi-person-vcard-fill me-2"></i>Nome do cliente</th>
            <th scope="col"><i class="bi bi-house-check-fill me-2"></i>ID Casa</th>
            <th scope="col"><i class="bi bi-house-door-fill me-2"></i>Casa</th>
            <th scope="col"><i class="bi bi-currency-dollar me-2"></i>Valor</th>
            <th scope="col"><i class="bi bi-credit-card-fill"></i>Pagamento</th>
            <th scope="col"><i class="bi bi-gear-fill me-2"></i>Opções</th>
        </tr>
        <?php foreach ($result as $consult): ?>
            <tr>
                    <td><?= htmlspecialchars($consult->id_venda) ?></td>
                    <td><?= htmlspecialchars($consult->id_cliente) ?></td>
                    <td><?= htmlspecialchars($consult->nome) ?></td>
                    <td><?= htmlspecialchars($consult->id_imovel) ?></td>
                    <td><?= htmlspecialchars($consult->titulo) ?></td>
                    <td>R$ <?= number_format($consult->valor,  2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($consult->forma_pagamento) ?></td>
                    <td><div class="text-center"><a class="btn btn-primary" href="verImovel.php?id=<?= $consult->id_imovel?>"><i class="bi bi-eye-fill"></i></a></div></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>