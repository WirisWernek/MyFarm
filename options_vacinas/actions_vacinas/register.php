<?php
session_start();
require_once '../../includes/class/vacinas.php';
if(isset($_POST['btn-cadastrar'])){
    $vacina = new Vacina("",$_POST['nome'], $_POST['descricao']);
    $vacina->Cadastrar();
}
?>