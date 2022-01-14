<?php
session_start();
require_once '../../includes/class/animal.php';
if(isset($_POST['btn-deletar'])){
    $animal = new Animal($_POST['id'], "", "", "", "", "", "");
    $animal->Excluir();
}
?>