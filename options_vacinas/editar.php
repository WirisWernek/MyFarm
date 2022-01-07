<?php
include_once '../includes/header.php';
include_once '../includes/db_connect.php';

if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM tb_vacinas WHERE id_vacina = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m6 push-m3">
    <h3 class="light">Editar Vacina</h3>

    <form action="./actions_vacinas/update.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $dados['id_vacina']; ?>">
        
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php echo $dados['nome_vacina']; ?>"><br>

        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" class="materialize-textarea" cols="30" rows="10"><?php echo $dados['descricao_vacina']; ?></textarea>
        <br>

        <input class="btn red" type="submit" value="Atualizar" name="btn-editar">
        <a class="btn green"  style="color: #fff;text-decoration: none;" href="./index.php">Home</a>
    </form>
    </div>
</div>


<?php
include_once '../includes/footer.php';
?>