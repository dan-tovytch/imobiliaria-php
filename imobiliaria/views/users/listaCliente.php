<?php

require '../../database/database.php';

$sql = "SELECT * FROM clientes";
$stmt = $conn->prepare($sql);
$stmt->execute();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <h2 class="h2 text-center mt-3">Lista de Cadastro</h2>
    <ul class="nav justify-content-center mt-3">
        <li class="nav-item">
            <a class="btn btn-warning text-white me-2" href="/"><i class="bi bi-house-door-fill" style="font-size: 18px;"></i></a>
            <a class="btn btn-success" href="registro.php"><i class="bi bi-person-fill-add" style="font-size: 18px;"></i></a>
        </li>
    </ul>
    <table class="table table-Secondary table-striped table-hover table-bordered mt-3">
        <tr>
            <th scope="col"><i class="bi bi-person-badge-fill me-2"></i>ID</th>
            <th scope="col"><i class="bi bi-person-fill me-2"></i>Nome</th>
            <th scope="col"><i class="bi bi-person-vcard-fill me-2"></i>Cpf</th>
            <th scope="col"><i class="bi bi-at me-2"></i>Email</th>
            <th scope="col"><i class="bi bi-calendar-event-fill me-2"></i>Data Nasc</th>
            <th scope="col"><i class="bi bi-gender-ambiguous me-2"></i>Gênero</th>
            <th scope="col"><i class="bi bi-telephone-fill me-2"></i>Telefone</th>
            <th scope="col"><i class="bi bi-geo-alt-fill me-2"></i>Endereço</th>
            <th scope="col"><i class="bi bi-gear-fill me-2"></i>Opções</th>
        </tr>
        <?php foreach ($stmt as $consult): ?>
            <tr>
                <td><?= htmlspecialchars($consult['id']) ?></td>
                <td><?= htmlspecialchars($consult['nome']) ?></td>
                <td><?= htmlspecialchars($consult['cpf']) ?></td>
                <td><?= htmlspecialchars($consult['email']) ?></td>
                <td><?= htmlspecialchars($consult['data_nas']) ?></td>
                <td><?= htmlspecialchars($consult['genero']) ?></td>
                <td><?= htmlspecialchars($consult['telefone']) ?></td>
                <td><?= htmlspecialchars($consult['endereco']) ?></td>
                <td><a class="btn btn btn-primary text-white me-2" id="editar" name="editar" href="editar.php?id=<?= $consult['id'] ?>"><i class="bi bi-pencil-fill"></i></a><a class="btn btn-danger" id="deletar" name="deletar" href="deletar.php?id=<?= $consult['id'] ?>"><i class="bi bi-trash3-fill"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>