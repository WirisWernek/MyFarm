<?php
session_start();
// require_once '../../includes/db_connect.php';
require_once '../../includes/class/vacinacao.php';
if(isset($_POST['btn-atualizar'])){
    // $id = intval(mysqli_escape_string($connect, $_POST['id']));
    // $vacina = intval(mysqli_escape_string($connect, $_POST['vacina']));
    // $animal =  intval(mysqli_escape_string($connect, $_POST['animal']));
    // $data = mysqli_escape_string($connect, $_POST['data_vacinacao']);

    // $sql = "UPDATE tb_vacinados SET vacina = '$vacina', animal = '$animal', data_vacinacao = '$data' WHERE id_vacinado='$id';";
    // if(mysqli_query($connect, $sql)){
    //     $_SESSION['mensagem']= "Atualizado com sucesso!";
    //     header('Location: ../../index.php');
    // }else{
    //     $_SESSION['mensagem']= "Erro ao Atualizar!";
    //     header('Location: ../../index.php');

    // }
    $vacinacao = new Vacinacao($_POST['id'], $_POST['animal'], $_POST['vacina'], $_POST['data_vacinacao']);
    $vacinacao->Atualizar();
}
?>