<?php
require_once '../includes/header.php';
require_once '../includes/db_connect.php';
require_once '../includes/message.php';
?>
    <div class="row" >
    <div class="col s12 m6 push-m3">
    <h1 align="center">Animais Vacinados</h1>
        <table class="striped centered">
        <thead>
            <tr>
                <th>Vacina:</th>
                <th>Animal:</th>
                <th>Data da Vacinação:</th>
            </tr>
            </thead>
            <tbody>
            <?php

$sql = "call animais_vacinados()";
$resultado = mysqli_query($connect, $sql);

if (mysqli_num_rows($resultado) > 0):

    while ($dados = mysqli_fetch_array($resultado)):
        $data = new DateTime($dados['DataVacinado']);
        echo "<tr>";
        echo "<td>" . $dados['NomeVacina'] . "</td>";
        echo "<td>" . $dados['NomeAnimal'] . "</td>";
        echo "<td>" . $data->format('d/m/Y') . "</td>";
        echo '<td><a href="./editar.php?id=' . $dados['IDVacinado'] . '" class="btn-floating orange"><i class="material-icons">edit</i></a></td>';
        echo '<td><a href="#modal' . $dados['IDVacinado'] . '" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>';
        echo "</tr>";
        ?>
						            <!-- Modal Structure -->
						            <div id="modal<?php echo $dados['IDVacinado']; ?>" class="modal">
						                    <div class="modal-content">
						                        <h4>Opa!</h4>
						                        <p>Tem certeza que deseja excluir esse registro?</p>
						                    </div>
						                    <div class="modal-footer">
						                        <form action="./actions_vacinar/actions.php" method="POST">
						                            <input type="hidden" name="id" value="<?php echo $dados['IDVacinado']; ?>">
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
                    </tr>
                <?php endif;?>
                </tbody>

        </table>

    <a href="./cadastrar.php" class="btn green">Vacinar Animal</a>
    <a class="btn blue"  style="color: #fff;text-decoration: none;" href="../index.php">Home</a>
    </div>
</div>
<?php
include_once '../includes/footer.php';
?>