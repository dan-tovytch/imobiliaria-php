<?php

require '../../database/database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM imoveis WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);

if (!$result) {
    die('Imóvel não encontrado');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Imóvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="position-relative">
        <div class="position-absolute top-0 start-0 p-2">
            <div class="text-dark p-2 rounded-5">
                <a href="listaImoveis.php" class="icon-link link-dark">
                    <i class="bi bi-arrow-left-circle" style="font-size: 45px;"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container mt-4 col-md-5">
        <div class="bg-dark text-light rounded p-4">
            <h2 class="text-center mb-4">Editar Imóvel</h2>
            <form action="../../api/api.php?action=editar_imoveis" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($result->id); ?>">

                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="url" class="form-control" name="imagem" id="imagem" accept="image/*" value="<?php echo htmlspecialchars($result->imagem); ?>">
                </div>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo htmlspecialchars($result->titulo); ?>">
                </div>

                <div class="mb-3">
                    <label for="metro_quadrado" class="form-label">Metros Quadrados</label>
                    <input type="text" class="form-control" name="metro_quadrado" id="metro_quadrado" value="<?php echo htmlspecialchars($result->metros_quadrado); ?>">
                </div>

                <div class="mb-3">
                    <label for="valor_metro_quadrado" class="form-label">Valor por Metro Quadrado</label>
                    <input type="text" class="form-control" name="valor_metro_quadrado" id="valor_metro_quadrado" value="<?php echo htmlspecialchars($result->valor_metro); ?>">
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea name="descricao" id="descricao" class="form-control" cols="20" rows="5"><?php echo htmlspecialchars($result->descricao); ?></textarea>
                </div>

                <div class="text-center">
                    <input class="btn btn-primary" type="submit" id="editar" name="editar" value="Editar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>