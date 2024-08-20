<?php

require_once '../database/database.php';
// require 'includes/header.php';

if ($_SERVER['REQUEST_METHOD']) {
    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'registro_cliente':
            $nome = $_POST['nome'] ?? '';
            $cpf = $_POST['cpf'] ?? '';
            $email = $_POST['email'] ?? '';
            $data_nas = $_POST['dataN'] ?? '';
            $genero = $_POST['genero'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $endereco = $_POST['endereco'] ?? '';
            if (empty($nome) || empty($cpf) || empty($email) || empty($data_nas) || empty($genero) || empty($telefone) || empty($endereco)) {
                echo 'Preencha todos os campos';
                exit;
            }
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo 'Email inválido';
                exit;
            }
            verificCpf($conn, $cpf,);
            verificEmail($conn, $email);
            verificPhoneNumber($conn, $telefone);

            $sql = 'INSERT INTO clientes (nome, cpf, email, data_nas, genero, telefone, endereco) VALUES (?, ?, ?, ?, ?, ?, ?)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nome, $cpf, $email, $data_nas, $genero, $telefone, $endereco]);

            if (!$stmt) {
                echo 'Erro ao registrar cliente';
            }

            echo '<script>alert("Cliente registrado com sucesso")</script>
                  <h2>Deseja registrar outro cliente?</h2>
                  <a href="../../views/users/registro.php">Sim</a><br>
                  <a href="../../views/users/listaCliente.php">Não</a>';

            break;
        case 'editar_cliente':
            if (isset($_POST['editar'])) {
                $id = $_POST['id'] ?? '';
                $nome = $_POST['nome'] ?? '';
                $cpf = $_POST['cpf'] ?? '';
                $email = $_POST['email'] ?? '';
                $data_nas = $_POST['dataN'] ?? '';
                $genero = $_POST['genero'] ?? '';
                $telefone = $_POST['telefone'] ?? '';
                $endereco = $_POST['endereco'] ?? '';
                if (empty($nome) || empty($cpf) || empty($email) || empty($genero) || empty($telefone) || empty($endereco)) {
                    die("Todos os campos devem estar preenchidos");
                }

                verificCpf($conn, $cpf, $id);
                verificPhoneNumber($conn, $telefone, $id);
                verificEmail($conn, $email, $id);

                $sql = 'UPDATE clientes SET nome = ?, cpf = ?, email = ?, data_nas = ?, genero = ?, telefone = ?, endereco = ? WHERE id = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$nome, $cpf, $email, $data_nas, $genero, $telefone, $endereco, $id]);
                if (!$stmt) {
                    echo 'Erro ao editar cliente';
                } else {
                    echo '<script>alert("Cliente atualizado com sucesso"); window.location.href="../../views/users/listaCliente.php";</script>';
                }
            }
            break;
        case "deletar_cliente":
            $id = $_POST['id'] ?? '';
            $sql = 'DELETE FROM clientes WHERE id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            if (!$stmt) {
                echo 'Erro ao deletar cliente';
            } else {
                echo '<script>alert("Cliente deletado com sucesso"); window.location.href="../../views/users/listaCliente.php";</script>';
            }
            break;
        case "registro_imoveis":
            $imagem = $_POST['imagem'];
            $titulo = $_POST['titulo'] ?? '';
            $metro_quadrado = $_POST['metro_quadrado'] ?? '';
            $valor_metro_quadrado = $_POST['valor_metro_quadrado'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $valor_total = $valor_metro_quadrado * $metro_quadrado;

            $sql = "INSERT INTO imoveis (imagem, titulo, metros_quadrado, valor_metro, valor_total, descricao) VALUES (?, ?, ?, ?, ?, ?)";
            $result = $conn->prepare($sql);
            $result->execute([$imagem, $titulo, $metro_quadrado, $valor_metro_quadrado, $valor_total, $descricao]);

            if (!$result) {
                echo 'Erro ao registrar imóvel';
            } else {
                echo '<script>alert("Imóvel registrado com sucesso"); window.location.href="../../views/property/listaImoveis.php";</script>';
            }
            break;
        case "editar_imoveis":
            if (isset($_POST['editar'])) {
                $id = $_POST['id'] ?? '';
                $titulo = $_POST['titulo'] ?? '';
                $imagem = $_POST['imagem'];
                $metro_quadrado = $_POST['metro_quadrado'] ?? '';
                $valor_metro_quadrado = $_POST['valor_metro_quadrado'] ?? '';
                $descricao = $_POST['descricao'] ?? '';
                $valor_total = $valor_metro_quadrado * $metro_quadrado;

                $sql = "UPDATE imoveis SET imagem = ?, titulo = ?, metros_quadrado = ?, valor_metro = ?, valor_total = ?, descricao = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$imagem, $titulo, $metro_quadrado, $valor_metro_quadrado, $valor_total, $descricao, $id]);

                if (!$stmt) {
                    echo 'Erro ao editar imóvel';
                } else {
                    echo '<script>alert("Imóvel atualizado com sucesso"); window.location.href="../../views/property/listaImoveis.php";</script>';
                }
            }
            break;

        case "delete_imovel":
            $id = $_POST['id'] ?? '';
            $sql = 'DELETE FROM imoveis WHERE id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            if (!$stmt) {
                echo 'Erro ao deletar imóvel';
            } else {
                echo '<script>alert("Imóvel deletado com sucesso"); window.location.href="../../views/property/listaImoveis.php";</script>';
            }
            break;
        case 'vender_imovel':
            $id = $_POST['id'];
            $cpf = $_POST['cpf'];
            $forma_pagamento = $_POST['pagamento'];
            $valor_total = $_POST['valor_total'];

            echo "ID imovel " . $id;
            echo "<br>";
            echo "CPF " . $cpf;
            echo "<br>";
            echo "Forma de pagamento " . $forma_pagamento;
            echo "<br>";
            echo "Valor total " . $valor_total;
            echo "<br>";
            $sql = "SELECT * FROM clientes WHERE cpf = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$cpf]);

            $cliente = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$cliente) {
                die("Cliente não encontrado");
            }
            $idCliente = $cliente->id;
            echo $idCliente;

            $sql = "INSERT INTO vendas (id_cliente, id_imovel, valor, forma_pagamento) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$idCliente, $id, $valor_total, $forma_pagamento]);

            $sql = "UPDATE imoveis SET status = 'Vendido' WHERE id = ?";
            $stmt = $conn->prepare($sql);
            if (!$stmt->execute([$id])) {
                die("Erro ao atualizar status do imóvel");
            }

            $sql = "SELECT * FROM imoveis WHERE status = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);


            $imovel = $stmt->fetch(PDO::FETCH_OBJ);


            echo "<br>venda concluida";
            break;
        default:
            echo 'not found';
            break;
    }
}


function verificCpf($conn, $cpf, $id = null)
{
    if (strlen($cpf) !== 11) {
        die("Cpf inválido!");
    }
    $sql = "SELECT * FROM clientes WHERE cpf = ?";
    $params = [$cpf];
    if ($id) {
        $sql .= " AND id != ?";
        $params[] = $id;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    $cliente = $stmt->fetch(PDO::FETCH_OBJ);

    if ($cliente) {
        die("CPF já cadastrado!");
    }
}
function verificPhoneNumber($conn, $telefone, $id = null)
{
    if (strlen($telefone) !== 10) {
        die("Numero de telefone inválido!");
    }

    $sql = "SELECT * FROM clientes WHERE telefone = ?";
    $params = [$telefone];
    if ($id) {
        $sql .= " AND id != ?";
        $params[] = $id;
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    $cliente = $stmt->fetch(PDO::FETCH_OBJ);

    if ($cliente) {
        die("Número de telefone já cadastrado!");
    }
}



function verificEmail($conn, $email, $id = null)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        die("Email inválido!");
    }

    $sql = "SELECT * FROM clientes WHERE email = ?";
    $params = [$email];
    if ($id) {
        $sql .= " AND id != ?";
        $params[] = $id;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    $cliente = $stmt->fetch(PDO::FETCH_OBJ);

    if ($cliente) {
        echo '<div class="alert alert-warning" role="alert">Email já cadastrado!</div>';
    }
}

// function verificExistCpf($conn, $cpf) {
//     $sql = "SELECT * FROM clientes WHERE cpf = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([$cpf]);

//     $cliente = $stmt->fetch(PDO::FETCH_OBJ);

//     if(!$cliente) {
//         return "não tem nada";
//     }

// }