<?php
session_start();
require_once '../includes/db_connect.php';
if(isset($_POST['btn-cadastrar'])){
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $pai =  mysqli_escape_string($connect, $_POST['pai']);;
    $mae =  mysqli_escape_string($connect, $_POST['mae']);
    $data =  mysqli_escape_string($connect, $_POST['data']);;
    $sexo =  mysqli_escape_string($connect, $_POST['sexo']);
    $raca =  mysqli_escape_string($connect, $_POST['raca']);

    $sql = "INSERT INTO tb_animais(nome_animal, mae_animal, pai_animal, data_nascimento_animal, sexo_animal, raca_animal) VALUES('$nome', '$mae', '$pai', '$data', '$sexo', '$raca')";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem']= "Cadastrado com sucesso!";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensagem']= "Erro ao cadastrar!";
        header('Location: ../index.php');
    }
}
?>