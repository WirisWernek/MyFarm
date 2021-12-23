<?php

include_once'./includes/header.php';
?>
    <form action="./actions_animais/register.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome"><br>

        <label for="pai">Pai</label>
        <input type="text" name="pai" id="pai"><br>

        <label for="mae">Mãe</label>
        <input type="text" name="mae" id="mae"><br>

        <label for="data">Data de Nascimento</label>
        <input type="date" name="data" id="data"><br>

        <label for="sexo">Sexo</label>
        <select name="sexo" id="sexo">
            <option value="">Selecione um valor</option>
            <option value="Macho">Macho</option>
            <option value="Fêmea">Fêmea</option>
        </select><br>

        <label for="raca">Raça</label>
        <select name="raca" id="raca">
            <option value="">Selecione um valor</option>
            <option value="gato">Gato</option>
            <option value="cachorro">Cachorro</option>
            <option value="bovino">Bovino</option>
        </select><br>

        <input type="submit" value="Cadastrar" name="btn-cadastrar">

    </form>
<?php
include_once'./includes/footer.php';
?>