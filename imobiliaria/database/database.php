<?php 

$user = 'root';
$password = '';

try {
    $conn = new PDO('mysql:host=meuip;dbname=imobiliaria', $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}