<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <div style="text-align: center;">
        <h1 class="mt-6">Bem vindo!</h1>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="btn btn-dark me-2" href="views/users/registro.php"><i class="bi bi-person-fill-add me-2"></i>Registrar Cliente</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-dark me-2" href="views/users/listaCliente.php"><i class="bi bi-clipboard-fill me-2"></i>Lista de Clientes</a> <br>
            </li>
            <li class="nav-item">
                <a class="btn btn-dark me-2" href="views/property/registro.php"><i class="bi bi-house-up-fill me-2"></i>Registrar Imóvel</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-dark me-2" href="views/property/listaImoveis.php"><i class="bi bi-clipboard-fill me-2"></i>Lista de Imóveis</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-dark me-2" href="views/property/imoveisVendidos.php"><i class="bi bi-clipboard-fill me-2"></i>Imóveis Vendidos</a>
            </li>
        </ul>
        
    </div>
</body>
</html>