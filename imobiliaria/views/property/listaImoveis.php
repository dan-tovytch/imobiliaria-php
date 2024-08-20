<?php

require "../../database/database.php";

$sql = "SELECT * FROM imoveis";
$stmt = $conn->prepare($sql);
$stmt->execute();

if (!$stmt) {
    die('Nenhum imóvel encontrado');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de imoveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4 text-center">Lista de Imóveis</h1>
        <ul class="nav justify-content-center mb-4">
            <li class="nav-item">
                <a class="btn btn-warning text-white me-2" href="/"><i class="bi bi-house-door-fill" style="font-size: 18px;"></i></a>
                <a class="btn btn-success" href="registro.php"><i class="bi bi-house-add-fill" style="font-size: 18px;"></i></a>
            </li>
        </ul>
        <div class="row">
            <?php foreach ($stmt as $result): ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="<?php echo htmlspecialchars($result['imagem']); ?>" alt="Imagem da casa" height="210">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($result['titulo']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($result['descricao']); ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="bi bi-rulers me-2"></i>Métros²: <?php echo htmlspecialchars($result['metros_quadrado']); ?></li>
                            <li class="list-group-item"><i class="bi bi-currency-dollar me-2"></i> R$ <?php echo number_format($result['valor_total'], 2, ',', '.'); ?></li>
                            <li class="list-group-item"><?php echo ($result['status'] == 'Vendido') ? 'Vendido' : 'Disponível'; ?></li>
                        </ul>
                        <div class="card-body d-flex gap-2">
                            <?php if($result['status'] == 'Vendido'): ?>
                                <a class="btn btn-secondary disabled" id="ver" name="ver">Vendido</a>
                            <?php elseif($result['status'] == 'Disponivel'):?>
                                <a class="btn btn-primary" id="ver" name="ver" href="verImovel.php?id=<?= $result['id'] ?>"><?php echo ($result['status'] == 'Vendido') ? 'Vendido' : 'Ver'; ?></a>
                            <?php endif;?>
                            <a class="btn btn-warning text-white" id="editar" name="editar" href="editar.php?id=<?= $result['id'] ?>"><i class="bi bi-pencil-fill"></i></a>
                            <form action="../../api/api.php?action=delete_imovel" method="POST" class="mb-0">
                                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>