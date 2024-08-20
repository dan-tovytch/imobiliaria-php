<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Imóvel</title>
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
    </div>
    <div class="container mt-3 col-md-5 bg-dark rounded text-light">
        <div class="row justify-content-center">
            <h2 class="mt-4 text-center">Registrar Imóvel</h2>
            <div class="col-md-10">
                <form action="../../api/api.php?action=registro_imoveis" enctype="multipart/form-data" method="POST">
                    <div class="form-group mb-3">
                        <label for="imagem" class="form-label">Imagem</label>
                        <input class="form-control" type="url" name="imagem" id="imagem">
                    </div>
                    <div class="form-group mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input class="form-control" type="text" name="titulo" id="titulo" value="Casa de Javascripto">
                    </div>
                    <div class="form-group mb-3">
                        <label for="metro_quadrado" class="form-label">Metros Quadrados</label>
                        <input class="form-control" type="text" name="metro_quadrado" id="metro_quadrado" value="295">
                    </div>
                    <div class="form-group mb-3">
                        <label for="valor_metro_quadrado" class="form-label">Valor por Metro Quadrado</label>
                        <input class="form-control" type="text" name="valor_metro_quadrado" id="valor_metro_quadrado" value="3000">
                    </div>
                    <div class="form-group mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" cols="20" rows="5">Olhe para frente e deleite-se com a vista revigorante do Parque Barigui. Olhe para o lado e veja todas as facilidades de ser vizinho do Park Shopping Barigui. Alto padrão construtivo em um empreendimento com áreas comuns completas e rooftops com vistas incríveis. -195M² a 394M² privativos -4 Quartos -Vista para o Parque Barigui -Apartamentos Gardens, Tipo e Coberturas</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-2">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</body>

</html>