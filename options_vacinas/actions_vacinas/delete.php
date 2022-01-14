<?php
session_start();
require_once '../../includes/class/vacinas.php';
if(isset($_POST['btn-deletar'])){
    $vacina = new Vacina($_POST['id'], "", "");
    $vacina->Excluir();
}
?>