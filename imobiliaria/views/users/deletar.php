<?php 

require '../../database/database.php';

$sql = "SELECT * FROM clientes WHERE id = :id";
$result = $conn->prepare($sql);
$result->bindParam(':id', $_GET['id']);
$result->execute();

$result = $result->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Deletar Cliente</h1>
    <p>Deseja deletar o cliente: <?php echo $result->nome; ?></p>
   <form action="../../api/api.php?action=deletar_cliente" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit">Deletar</button>
   </form> <br>
    <a href="listaCliente.php">Voltar</a>
</body>
</html>