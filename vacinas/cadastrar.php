<?php
session_start();
require_once '../includes/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';
$conexao = new Conexao();
$conexao = $conexao->Conectar();
?>
<div class="row">
    <div class="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light">Cadastrar Vacina</h3>
            <form action="./actions_vacinar/actions.php" method="post">
                <label for="animal">Animal</label>
                <select name="animal" id="animal">
                    <option value="">Selecione um valor</option>
                    <?php

                    $sql = "SELECT * FROM tb_animais";
                    $stmt = $conexao->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) :

                        foreach ($conexao->query($sql) as $chave => $dados) :
                            echo "<option value='" . $dados['id_animal'] . "'>" . $dados['nome_animal'] . "</option>";
                        endforeach;
                    endif;
                    ?>
                </select><br>

                <label for="vacina">Vacina</label>
                <select name="vacina" id="vacina">
                    <option value="">Selecione um valor</option>
                    <?php

                    $sql = "SELECT * FROM tb_vacinas";
                    $stmt = $conexao->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) :

                        foreach ($conexao->query($sql) as $chave => $dados) :
                            echo "<option value='" . $dados['id_vacina'] . "'>" . $dados['nome_vacina'] . "</option>";
                        endforeach;
                    endif;
                    ?>
                </select><br>
                <label for="data_vacinacao">Data de Vacinação</label>
                <input type="date" name="data_vacinacao" id="data_vacinacao" placeholder="Data de Vacinação"><br>

                <input class="btn green" type="submit" value="Vacinar" name="btn-cadastrar">
                <a class="btn blue" style="color: #fff;text-decoration: none;" href="../index.php">Home</a>

            </form>
        </div>
    </div>
</div>
<?php
require_once '../includes/footer.php';
?>