<?php
require_once '../includes/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';
require_once '../includes/message.php';

?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h1 align="center">Vacinas Cadastradas</h1>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Descrição:</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $conexao = new Conexao();
                $conexao = $conexao->Conectar();

                $sql = "SELECT * FROM tb_vacinas";
                $stmt = $conexao->prepare($sql);

                $stmt->execute();

                if ($stmt->rowCount() > 0) :

                    foreach ($conexao->query($sql) as $chave => $dados) :
                        echo "<tr>";
                        echo "<td>" . $dados['nome_vacina'] . "</td>";
                        echo "<td>" . $dados['descricao_vacina'] . "</td>";
                        echo '<td><a href="./editar.php?id=' . $dados['id_vacina'] . '" class="btn-floating orange"><i class="material-icons">edit</i></a></td>';
                        echo '<td><a href="#modal' . $dados['id_vacina'] . '" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>';
                        echo "</tr>";
                ?>
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id_vacina']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Opa!</h4>
                                <p>Tem certeza que deseja excluir esse registro?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="./actions_vacinas/actions.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id_vacina']; ?>">
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
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <br>
        <a href="./cadastrar.php" class="btn green">Cadastrar Vacina</a>
        <a class="btn blue" style="color: #fff;text-decoration: none;" href="../index.php">Home</a>
    </div>
</div>
<?php
require_once '../includes/footer.php';
?>