<?php

include_once'../includes/header.php';
?>
<div class="row">
    <div class="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light">Cadastrar Vacina</h3>
            <form action="./actions_vacinas/register.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome"><br>

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="materialize-textarea" cols="30" rows="10"></textarea>

                <input class="btn green" type="submit" value="Cadastrar" name="btn-cadastrar">
                <a class="btn blue"  style="color: #fff;text-decoration: none;" href="../index.php">Home</a>
                
            </form>
        </div>
    </div>
</div>
<?php
include_once'../includes/footer.php';
?>