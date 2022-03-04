<?php
    session_start();

    require_once '../../includes/class/vacinas.php';
    

    if(isset($_POST['btn-cadastrar'])){
        $vacina = new Vacina(null, $_POST['nome'], $_POST['descricao']);
        $vacina->Cadastrar();
    }
    else if(isset($_POST['btn-editar'])){
        $vacina = new Vacina($_POST['id'], $_POST['nome'], $_POST['descricao']);
        $vacina->Atualizar();
    }
    else if(isset($_POST['btn-deletar'])){
        $vacina = new Vacina($_POST['id'], $_POST['nome'], $_POST['descricao']);
        $vacina->Excluir();
    }
