<?php
session_start();
require_once '../../includes/class/animal.php';
 if(isset($_POST['btn-cadastrar'])){
    $animal = new Animal("",$_POST['nome'], $_POST['pai'], $_POST['mae'], $_POST['data'], $_POST['sexo'], $_POST['raca']);
    $animal->Cadastrar();
}

