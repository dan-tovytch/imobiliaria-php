<?php
require "../../database/database.php";

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);

if (!$result) {
    die('Cliente não encontrado');
}
$genero = $result->genero;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
<div class="position-relative">
        <div class="position-absolute top-0 start-0 p-2">
            <div class="text-dark p-2 rounded-5">
                <a href="listaCliente.php" class="icon-link link-dark">
                    <i class="bi bi-arrow-left-circle" style="font-size: 45px;"></i>
                </a>
            </div>
        </div>
    <div class="container mt-3 col-md-5 bg-dark rounded text-light">
        <div class="row justify-content-center">
            <h2 class="mt-4 text-center">Editar Cliente</h2>
            <div class="col-md-10">
                <form action="../../api/api.php?action=editar_cliente" method="POST">
                <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                    <div class="form-group mt-3">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $result->nome; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="cpf">Cpf</label>
                        <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $result->cpf; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" value="<?php echo $result->email; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="dat_nas">Data Nascimento</label>
                        <input class="form-control" type="date" id="dataN" name="dataN" value="<?php echo $result->data_nas;?>">
                    </div>
                    <div class="form-group mt-3">
                        <label>Genero</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="masculino" name="genero" value="masculino"  <?php echo ($genero == 'masculino') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="masculino">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="feminino" name="genero" value="feminino"  <?php echo ($genero == 'feminino') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="feminino">Feminino</label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="telefone">Telefone</label>
                        <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $result->telefone; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="endereco">Endereço</label>
                        <input class="form-control" type="text" id="endereco" name="endereco" value="<?php echo $result->endereco; ?>">
                    </div>
                    <div class="text-center">
                        <input class="btn btn-primary mt-3 mb-3" type="submit" id="editar" name="editar" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>