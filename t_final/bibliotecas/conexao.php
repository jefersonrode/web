<?php
$username = "root";
$password = "";
$banco = "tbfinal";
$host = "localhost";

try {
    $conn = new PDO("mysql:host={$host};dbname={$banco}; charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    echo"Erro: {$e->getMessage()}";
}
?>
