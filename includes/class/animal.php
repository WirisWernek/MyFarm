<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';
class Animal
{
    private $nome;
    private $pai;
    private $mae;
    private $data_nascimento;
    private $sexo;
    private $raca;
    private $id;
    private $data;
    private $connect;

    public function __construct($id, $nome, $pai, $mae, $data_nascimento, $sexo, $raca)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';
        $this->id = $id;
        $this->nome = $nome;
        $this->pai = $pai;
        $this->mae = $mae;
        $this->data_nascimento = $data_nascimento;
        $this->sexo = $sexo;
        $this->raca = $raca;
        $this->connect = new Conexao();
        $this->connect = $this->connect->Conectar();
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getPai()
    {
        return $this->pai;
    }
    public function setPai($pai)
    {
        $this->pai = $pai;
    }

    public function getMae()
    {
        return $this->mae;
    }
    public function setMae($mae)
    {
        $this->mae = $mae;
    }

    public function getDataNascimento()
    {
        $this->data = new DateTime($this->data_nascimento);
        return $this->data->format('d/m/Y');
    }
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getRaca()
    {
        return $this->raca;
    }
    public function setRaca($raca)
    {
        $this->raca = $raca;
    }

    public function Cadastrar()
    {
        $sql = "INSERT INTO tb_animais(nome_animal, mae_animal, pai_animal, data_nascimento_animal, sexo_animal, raca_animal) VALUES(:nome, :mae, :pai, :data_nascimento, :sexo, :raca)";

        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':mae', $this->mae);
        $stmt->bindValue(':pai', $this->pai);
        $stmt->bindValue(':data_nascimento', $this->data_nascimento);
        $stmt->bindValue(':sexo', $this->sexo);
        $stmt->bindValue(':raca', $this->raca);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: ../../options_animais/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            // echo $this->connect->error;
            // header('Location: ../../index.php');
        }
    }

    public function Atualizar()
    {
        $sql = "UPDATE tb_animais SET nome_animal = :nome, pai_animal = :pai, mae_animal = :mae, data_nascimento_animal = :data_nascimento, sexo_animal = :sexo, raca_animal = :raca  WHERE id_animal= :id;";

        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':mae', $this->mae);
        $stmt->bindValue(':pai', $this->pai);
        $stmt->bindValue(':data_nascimento', $this->data_nascimento);
        $stmt->bindValue(':sexo', $this->sexo);
        $stmt->bindValue(':raca', $this->raca);
        $stmt->bindValue(':id', $this->id);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../../options_animais/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            // echo $this->connect->error;
            // header('Location: ../../index.php');
        }
    }
    public function Excluir()
    {
        $sql = "DELETE FROM tb_animais WHERE id_animal = :id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Excluído com sucesso!";
            header('Location: ../../options_animais/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Excluir!";
            // echo $this->connect->error;
            // header('Location: ../../index.php');
        }
    }
}
