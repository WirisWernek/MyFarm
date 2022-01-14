<?php
session_start();
require_once '../../includes/class/vacinacao.php';
if(isset($_POST['btn-deletar'])){
    $vacinacao = new Vacinacao($_POST['id'], "", "", "");
    $vacinacao->Excluir();
}
?>