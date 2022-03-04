<?php
require_once '../includes/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';
require_once '../includes/message.php';
?>
<div class="row">
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
                $conexao = new Conexao();
                $conexao = $conexao->Conectar();

                $sql = "CALL animais_vacinados()";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll();

                if ($stmt->rowCount() > 0) :
                    foreach ($resultado as $chave => $dados) :
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
                    endforeach;
                else :
                    ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>

        <a href="./cadastrar.php" class="btn green">Vacinar Animal</a>
        <a class="btn blue" style="color: #fff;text-decoration: none;" href="../index.php">Home</a>
    </div>
</div>
<?php
require_once '../includes/footer.php';
?>