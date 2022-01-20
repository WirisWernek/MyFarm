<?php
require_once '../includes/header.php';
?>
<div class="row"><div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Cadastrar Animal</h3>
        <form action="./actions_animais/actions.php" method="post">
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

            <input class="btn green" type="submit" value="Cadastrar" name="btn-cadastrar">
            <a class="btn blue"  style="color: #fff;text-decoration: none;" href="../index.php">Home</a>

        </form>
    </div>
</div>
<?php
require_once '../includes/footer.php';
?>