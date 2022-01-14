<?php
session_start();
include_once'../includes/header.php';
include_once'../includes/db_connect.php';
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
                    $id = intval($_GET['id']);
                    $consulta = "SELECT * FROM tb_vacinados WHERE id_vacinado = '$id'";
                    $retorno = mysqli_fetch_assoc(mysqli_query($connect, $consulta));

                    $sql = "SELECT * FROM tb_animais";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):
                    
                        while($dados = mysqli_fetch_array($resultado)):
                            if($dados['id_animal'] == $retorno['animal']):
                                echo "<option value='" . $dados['id_animal'] . "' selected>" . $dados['nome_animal'] . "</option>";
                            else:
                                echo "<option value='" . $dados['id_animal'] . "'>" . $dados['nome_animal'] . "</option>";
                            endif;
                        endwhile;                  
                    endif;
                ?>
            </select><br>

            <label for="vacina">Vacina</label>
            <select name="vacina" id="vacina">
                <option value="">Selecione um valor</option>
                <?php

                    $sql = "SELECT * FROM tb_vacinas";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):
                    
                        while($dados = mysqli_fetch_array($resultado)):

                            if($dados['id_vacina'] == $retorno['vacina']):
                                echo "<option value='" . $dados['id_vacina'] . "' selected>" . $dados['nome_vacina'] . "</option>";
                            else:
                                echo "<option value='" . $dados['id_vacina'] . "'>" . $dados['nome_vacina'] . "</option>";
                            endif;
                        endwhile;                  
                    endif;

                    $data = new DateTime($retorno['data_vacinacao']);
                    
                ?>
            </select><br>
            <label for="data_vacinacao">Data de Vacinação</label>
            <input type="date" name="data_vacinacao" id="data_vacinacao" placeholder="Data de Vacinação" value="<?php echo $data->format('Y-m-d'); ?>"><br>

            <input type="hidden" name="id" value="<?php echo $retorno['id_vacinado']; ?>">

            <input class="btn green" type="submit" value="Atualizar" name="btn-atualizar">
            <a class="btn blue"  style="color: #fff;text-decoration: none;" href="../index.php">Home</a>
                
            </form>
        </div>
    </div>
</div>
<?php
include_once'../includes/footer.php';
?>