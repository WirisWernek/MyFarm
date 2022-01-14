<?php
session_start();
// require_once '../../includes/db_connect.php';
require_once '../../includes/class/vacinacao.php';
if(isset($_POST['btn-deletar'])){

    // $id = mysqli_escape_string($connect, $_POST['id']);

    // $sql = "DELETE FROM tb_vacinados WHERE id_vacinado = '$id'";

    // if(mysqli_query($connect, $sql)){
    //     $_SESSION['mensagem']= "Excluído com sucesso!";
    //     header('Location: ../../index.php');
    // }else{
    //     $_SESSION['mensagem']= "Erro ao Excluir!";
    //     header('Location: ../../index.php');
    // }
    $vacinacao = new Vacinacao($_POST['id'], "", "", "");
    $vacinacao->Excluir();
}
?>