<?php
    session_start();

    require_once '../../includes/class/vacinas.php';
    $vacina = new Vacina($_POST['id'], $_POST['nome'], $_POST['descricao']);

    if(isset($_POST['btn-cadastrar'])){
        $vacina->Cadastrar();
    }
    else if(isset($_POST['btn-editar'])){
        $vacina->Atualizar();
    }
    else if(isset($_POST['btn-deletar'])){
        $vacina->Excluir();
    }
?>