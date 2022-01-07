<?php
session_start();
require_once '../../includes/db_connect.php';
if(isset($_POST['btn-editar'])){
    $id = mysqli_escape_string($connect, $_POST['id']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $descricao =  mysqli_escape_string($connect, $_POST['descricao']);

    $sql = "UPDATE tb_vacinas SET nome_vacina = '$nome', descricao_vacina = '$descricao' WHERE id_vacina='$id';";
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem']= "Atualizado com sucesso!";
        header('Location: ../../index.php');
    }else{
        $_SESSION['mensagem']= "Erro ao Atualizar!";
        header('Location: ../../index.php');
    }
}
?>