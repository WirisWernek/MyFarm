<?php
session_start();
require_once '../../includes/db_connect.php';
if(isset($_POST['btn-cadastrar'])){
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $descricao =  mysqli_escape_string($connect, $_POST['descricao']);

    $sql = "INSERT INTO tb_vacinas(nome_vacina, descricao_vacina) VALUES('$nome', '$descricao')";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem']= "Cadastrado com sucesso!";
        header('Location: ../../index.php');
    }else{
        $_SESSION['mensagem']= "Erro ao cadastrar!";
        header('Location: ../../index.php');
    }
}
?>