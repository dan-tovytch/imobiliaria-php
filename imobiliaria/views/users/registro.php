<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="position-relative">
        <div class="position-absolute top-0 start-0 p-2">
            <div class="text-dark p-2 rounded-5">
                <a href="/" class="icon-link link-dark">
                    <i class="bi bi-arrow-left-circle" style="font-size: 45px;"></i>
                </a>
            </div>
        </div>

        <div class="container grid text-center">
        </div>
        <div class="container mt-3 col-md-5 bg-dark rounded text-light">
            <div class="row justify-content-center">
                <h2 class="mt-4 text-center">Registrar Cliente</h2>
                <div class="col-md-10">
                    <form class="centered-form" action="../../api/api.php?action=registro_cliente" method="POST">
                        <div class="form-group mt-3">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" id="nome" name="nome" value="Daniel">
                        </div>
                        <div class="form-group">
                            <label for="cpf">Cpf</label>
                            <input class="form-control" type="text" id="cpf" name="cpf" value="12345678910">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email" value="daniel@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="dat_nas">Data Nascimento</label>
                            <input class="form-control" type="date" id="dataN" name="dataN">
                        </div>
                        <div class="form-group">
                            <label>Genero</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="masculino" name="genero" value="masculino">
                                <label class="form-check-label" for="masculino">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="feminino" name="genero" value="feminino">
                                <label class="form-check-label" for="feminino">Feminino</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input class="form-control" type="text" id="telefone" name="telefone" value="4112345678">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input class="form-control" type="text" id="endereco" name="endereco" value="">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-light mt-4 mb-2"">Registrar</button><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>