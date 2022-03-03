<?php
require_once '../includes/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';

if (isset($_GET['id'])) {
    $conexao = new Conexao();
    $conexao = $conexao->Conectar();
    $sql = "SELECT * FROM tb_vacinas WHERE id_vacina = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $dados = $stmt->fetch();
}
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Vacina</h3>

        <form action="./actions_vacinas/actions.php" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $dados['id_vacina']; ?>">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $dados['nome_vacina']; ?>"><br>

            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="materialize-textarea" cols="30" rows="10"><?php echo $dados['descricao_vacina']; ?></textarea>
            <br>

            <input class="btn red" type="submit" value="Atualizar" name="btn-editar">
            <a class="btn green" style="color: #fff;text-decoration: none;" href="./index.php">Home</a>
        </form>
    </div>
</div>
<?php
require_once '../includes/footer.php';
?>