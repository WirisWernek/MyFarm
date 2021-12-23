<?php

$servername="localhost";
$username="wiris";
$password="1+1Wiris1+1";
$db_name="MyFarm";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()) {
    echo "Erro na conexão: " . mysqli_connect_error();
}
?>