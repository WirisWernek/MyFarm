<?php
include_once '../includes/header.php';
require_once '../includes/db_connect.php';
?>
<div class="row" >
    <div class="col s12 m6 push-m3">
    <h1 align="center">Animais Cadastrados</h1>    
    <table class="striped centered" >
                <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Mãe:</th>
                    <th>Pai:</th>
                    <th>Data de Nascimento:</th>
                    <th>Sexo:</th>
                    <th>Raça:</th>
                    <th colspan=2>Ações:</th>
                </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM tb_animais";
                    $resultado = mysqli_query($connect, $sql);
                    
                    if(mysqli_num_rows($resultado) > 0):
                       
                        while($dados = mysqli_fetch_array($resultado)):
                         $data = new DateTime($dados['data_nascimento_animal']);
                            echo "<tr>";
                            echo "<td>" . $dados['nome_animal'] . "</td>";
                            echo "<td>" . $dados['mae_animal'] . "</td>";
                            echo "<td>" . $dados['pai_animal'] . "</td>";
                            echo "<td>" . $data->format('d/m/Y') . "</td>";
                            echo "<td>" . $dados['sexo_animal'] . "</td>";
                            echo "<td>" . $dados['raca_animal'] . "</td>";
                            echo '<td><a href="./editar.php?id=' . $dados['id_animal'] . '" class="btn-floating orange"><i class="material-icons">edit</i></a></td>';
                            echo '<td><a href="#modal' . $dados['id_animal'] . '" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>';
                        ?>  
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id_animal']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Opa!</h4>
                                    <p>Tem certeza que deseja excluir esse registro?</p>
                                </div>
                                    <div class="modal-footer">
                                    
                                    <form action="./actions_animais/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id_animal']; ?>">
                                        <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                                        <a href="#!" class="modal-close waves-effect waves-green btn">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                        </tr>
        <?php 
                        endwhile; 
                    else: 
                    ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <br>
            <a href="./cadastrar.php" class="btn green">Cadastrar Animal</a>
            <a class="btn blue"  style="color: #fff;text-decoration: none;" href="../index.php">Home</a>
    </div>
</div>



<?php
include_once '../includes/footer.php';
?>
