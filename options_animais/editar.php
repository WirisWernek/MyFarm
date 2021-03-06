<?php
require_once '../includes/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';

if (isset($_GET['id'])) {
    $conexao = new Conexao();
    $conexao = $conexao->Conectar();


    $sql = "SELECT * FROM tb_animais WHERE id_animal = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $dados = $stmt->fetch();
}
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Animal</h3>
        <form action="./actions_animais/actions.php" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $dados['id_animal']; ?>">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $dados['nome_animal']; ?>"><br>

            <label for="pai">Pai</label>
            <input type="text" name="pai" id="pai" value="<?php echo $dados['pai_animal']; ?>"><br>

            <label for="mae">Mãe</label>
            <input type="text" name="mae" id="mae" value="<?php echo $dados['mae_animal']; ?>"><br>

            <label for="data">Data de Nascimento</label>
            <input type="date" name="data" id="data" value="<?php echo $dados['data_nascimento_animal']; ?>"><br>

            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo">
                <?php
                if ($dados['sexo_animal'] == "Macho") {
                    echo '<option value="Macho"  selected = "selected">Macho</option>';
                    echo '<option value="Fêmea">Fêmea</option>';
                }
                if ($dados['sexo_animal'] == "Fêmea") {
                    echo '<option value="Macho" >Macho</option>';
                    echo '<option value="Fêmea"  selected = "selected">Fêmea</option>';
                }
                ?>
            </select><br>

            <label for="raca">Raça</label>
            <select name="raca" id="raca">
                <?php
                if ($dados['raca_animal'] == "gato") {
                    echo '<option value="gato" selected="selected">Gato</option>';
                    echo '<option value="cachorro">Cachorro</option>';
                    echo '<option value="bovino">Bovino</option>';
                }
                if ($dados['raca_animal'] == "cachorro") {
                    echo '<option value="gato" >Gato</option>';
                    echo '<option value="cachorro" selected="selected">Cachorro</option>';
                    echo '<option value="bovino">Bovino</option>';
                }
                if ($dados['raca_animal'] == "bovino") {
                    echo '<option value="gato" >Gato</option>';
                    echo '<option value="cachorro">Cachorro</option>';
                    echo '<option value="bovino" selected="selected">Bovino</option>';
                }

                ?>
            </select><br>

            <input class="btn red" type="submit" value="Atualizar" name="btn-editar">
            <a class="btn green" style="color: #fff;text-decoration: none;" href="./index.php">Home</a>
        </form>
    </div>
</div>

<?php
require_once '../includes/footer.php';
?>