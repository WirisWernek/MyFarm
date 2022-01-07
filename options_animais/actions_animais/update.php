<?php
session_start();
require_once '../../includes/db_connect.php';
if(isset($_POST['btn-editar'])){
    $id = mysqli_escape_string($connect, $_POST['id']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $pai =  mysqli_escape_string($connect, $_POST['pai']);;
    $mae =  mysqli_escape_string($connect, $_POST['mae']);
    $data =  mysqli_escape_string($connect, $_POST['data']);;
    $sexo =  mysqli_escape_string($connect, $_POST['sexo']);
    $raca =  mysqli_escape_string($connect, $_POST['raca']);

    $sql = "UPDATE tb_animais SET nome_animal = '$nome', pai_animal = '$pai', mae_animal = '$mae', data_nascimento_animal = '$data', sexo_animal ='$sexo', raca_animal = '$raca'  WHERE id_animal='$id';";
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem']= "Atualizado com sucesso!";
        header('Location: ../../index.php');
    }else{
        $_SESSION['mensagem']= "Erro ao Atualizar!";
        header('Location: ../../index.php');
    }
}
?>