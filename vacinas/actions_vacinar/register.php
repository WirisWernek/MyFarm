<?php
session_start();
require_once '../../includes/class/vacinacao.php';
if(isset($_POST['btn-cadastrar'])){
    $vacinacao = new Vacinacao("", $_POST['animal'], $_POST['vacina'], $_POST['data_vacinacao']);
    $vacinacao->Cadastrar();
}
?>