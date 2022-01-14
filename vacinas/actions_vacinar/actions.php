<?php
    session_start();
    
    require_once '../../includes/class/vacinacao.php';
    $vacinacao = new Vacinacao($_POST['id'], $_POST['animal'], $_POST['vacina'], $_POST['data_vacinacao']);
    
    if(isset($_POST['btn-cadastrar'])){
        $vacinacao->Cadastrar();
    }
    else if(isset($_POST['btn-atualizar'])){
        $vacinacao->Atualizar();
    }
    else if(isset($_POST['btn-deletar'])){
        $vacinacao->Excluir();
    }
?>