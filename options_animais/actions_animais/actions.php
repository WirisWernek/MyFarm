<?php
    session_start();

    require_once '../../includes/class/animal.php';
    $animal = new Animal($_POST['id'], $_POST['nome'], $_POST['pai'], $_POST['mae'], $_POST['data'], $_POST['sexo'], $_POST['raca']);

    if(isset($_POST['btn-cadastrar'])){
        $animal->Cadastrar();
    }
    if(isset($_POST['btn-editar'])){
        $animal->Atualizar();
    }
    if(isset($_POST['btn-deletar'])){
        $animal->Excluir();
    }
?>