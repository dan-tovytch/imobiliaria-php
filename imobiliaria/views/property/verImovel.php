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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imóvel | <?php echo htmlspecialchars($result->titulo); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        .property-header {
            border-bottom: 2px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .property-image {
            max-height: 400px;
            object-fit: cover;
        }

        .property-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .property-details h2 {
            font-size: 1.75rem;
            margin-bottom: 15px;
        }

        .property-details p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="position-relative">
        <div class="position-absolute top-0 start-0 p-2">
            <div class="text-dark p-2 rounded-5">
            <?php if ($result->status == 'Vendido'): ?>
                <a href="imoveisVendidos.php" class="icon-link link-dark">
                    <i class="bi bi-arrow-left-circle" style="font-size: 45px;"></i>
                </a>
            <?php elseif ($result->status == 'Disponivel'): ?>
                <a href="listaImoveis.php" class="icon-link link-dark">
                    <i class="bi bi-arrow-left-circle" style="font-size: 45px;"></i>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="property-header text-center">
            <figure class="figure">
                <img src="<?php echo htmlspecialchars($result->imagem); ?>" class="img-fluid property-image" alt="Imagem do imóvel">
            </figure>
        </div>
        <div class="property-details">
            <h2><?php echo htmlspecialchars($result->titulo); ?></h2>
            <p><strong>Descrição:</strong> <?php echo htmlspecialchars($result->descricao); ?></p>
            <p><strong>Área:</strong> <?php echo htmlspecialchars($result->metros_quadrado); ?> m²</p>
            <p><strong>Valor Total:</strong> R$ <?php echo number_format($result->valor_total, 2, ',', '.'); ?></p>
        </div>
    </div>
    <div class="text-center">
        <?php if ($result->status == 'Vendido'): ?>
            <a class="btn btn-secondary disabled mt-5 mb-5" id="ver" name="ver">Vendido</a>
        <?php elseif ($result->status == 'Disponivel'): ?>
            <a class="btn btn-success mt-5 mb-5" id="ver" name="ver" href="vender.php?id=<?= $result->id ?>">Vender</a>
        <?php endif; ?>
    </div>

</body>

</html>