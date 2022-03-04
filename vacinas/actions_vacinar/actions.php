<?php
session_start();

require_once '../../includes/class/vacinacao.php';

if (isset($_POST['btn-cadastrar'])) {
    $vacinacao = new Vacinacao(null, $_POST['animal'], $_POST['vacina'], $_POST['data_vacinacao']);
    $vacinacao->Cadastrar();
} else if (isset($_POST['btn-atualizar'])) {
    $vacinacao = new Vacinacao($_POST['id'], $_POST['animal'], $_POST['vacina'], $_POST['data_vacinacao']);
    $vacinacao->Atualizar();
} else if (isset($_POST['btn-deletar'])) {
    $vacinacao = new Vacinacao($_POST['id'], $_POST['animal'], $_POST['vacina'], $_POST['data_vacinacao']);
    $vacinacao->Excluir();
}
