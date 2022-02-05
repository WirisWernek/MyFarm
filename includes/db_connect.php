<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/env.php';
$usuario = $user;
$senha = $password;
$banco = $db;
$endereco = $server;

$connect = mysqli_connect($endereco, $usuario, $senha, $banco);
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()) {
    echo "Erro na conexão: " . mysqli_connect_error();
}
