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
    <title>Venda <?php echo $result->titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="position-relative">
        <div class="position-absolute top-0 start-0 p-2">
            <div class="text-dark p-2 rounded-5">
                <a href="verImovel.php?id=<?= $result->id ?>" class="icon-link link-dark">
                    <i class="bi bi-arrow-left-circle" style="font-size: 45px;"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container mt-4 col-md-5">
        <div class="bg-dark text-light rounded p-4">
            <h2 class="text-center mb-4">Vender Imóvel</h2>
            <form action="../../api/api.php?action=vender_imovel" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($result->id); ?>">
                <div class="mb-3">
                    <label for="imagem" class="form-label">CPF do cliente</label>
                    <input type="text" class="form-control" name="cpf" id="cpf">
                </div>
                <div class="mb-3">
                    <label for="titulo" class="form-label">Condição de pagamento</label>
                    <select id="pagamento" name="pagamento" class="form-select" aria-label="Default select example">
                        <option selected>Seleciona a forma de pagamento</option>
                        <option value="Financiamento">Financiamento</option>
                        <option value="Pix">Pix (A vista)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Valor total</label>
                    <input type="text" class="form-control" name="valor_total" id="valor_total" value="<?php echo $result->valor_total; ?>" readonly>
                </div>
                <div class="text-center">
                <?php if ($result->status == 'Vendido'): ?>
                        <a class="btn btn-secondary disabled mt-5 mb-5" id="ver" name="ver">Vendido</a>
                    <?php elseif ($result->status == 'Disponivel'): ?>
                        <input class="btn btn-success" type="submit" id="vender" name="vender" value="Vender">
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>