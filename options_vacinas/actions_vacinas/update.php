<?php
session_start();
require_once '../../includes/class/vacinas.php';
if(isset($_POST['btn-editar'])){
    $vacina = new Vacina($_POST['id'], $_POST['nome'], $_POST['descricao']);
    $vacina->Atualizar();
}
?>