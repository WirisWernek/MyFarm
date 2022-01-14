<?php
session_start();
// require_once '../../includes/db_connect.php';
require_once '../../includes/class/vacinacao.php';
if(isset($_POST['btn-cadastrar'])){
    // $animal = intval(mysqli_escape_string($connect, $_POST['animal']));
    // $vacina =  intval(mysqli_escape_string($connect, $_POST['vacina']));
    // $data = mysqli_escape_string($connect, $_POST['data_vacinacao']);
    // $sql;
    // if($data == null){
    //     $sql = "INSERT INTO tb_vacinados(vacina, animal, data_vacinacao) VALUES('$vacina', '$animal', now())";
    // }else{
    //     $sql = "INSERT INTO tb_vacinados(vacina, animal, data_vacinacao) VALUES('$vacina', '$animal', '$data')";
    // }


    // if(mysqli_query($connect, $sql)){
    //     $_SESSION['mensagem']= "Animal vacinado com sucesso!";
    //     header('Location: ../../index.php');
    // }else{
    //     $_SESSION['mensagem']= "Erro ao vacinar!";
    //     header('Location: ../../index.php');
    // }
    $vacinacao = new Vacinacao("", $_POST['animal'], $_POST['vacina'], $_POST['data_vacinacao']);
    $vacinacao->Cadastrar();
}
?>