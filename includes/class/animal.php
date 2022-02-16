<?php

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
        $this->connect = new mysqli("localhost", "wiris", "1+1Wiris1+1", "MyFarm");
        $this->connect->set_charset("utf8");
        $this->id = $this->connect->escape_string($id);
        $this->nome = $this->connect->escape_string($nome);
        $this->pai = $this->connect->escape_string($pai);
        $this->mae = $this->connect->escape_string($mae);
        $this->data_nascimento = $this->connect->escape_string($data_nascimento); // new DateTime($data_nascimento);
        $this->sexo = $this->connect->escape_string($sexo);
        $this->raca = $this->connect->escape_string($raca);
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
        $sql = "INSERT INTO tb_animais(nome_animal, mae_animal, pai_animal, data_nascimento_animal, sexo_animal, raca_animal) VALUES('$this->nome', '$this->mae', '$this->pai', '$this->data_nascimento', '$this->sexo', '$this->raca')";

        if ($this->connect->query($sql)) {
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: ../../options_animais/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            echo $this->connect->error;
            // header('Location: ../../index.php');
        }
    }

    public function Atualizar()
    {
        $sql = "UPDATE tb_animais SET nome_animal = '$this->nome', pai_animal = '$this->pai', mae_animal = '$this->mae', data_nascimento_animal = '$this->data_nascimento', sexo_animal ='$this->sexo', raca_animal = '$this->raca'  WHERE id_animal='$this->id';";
        if ($this->connect->query($sql)) {
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../../options_animais/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            echo $this->connect->error;
            // header('Location: ../../index.php');
        }
    }
    public function Excluir()
    {
        $sql = "DELETE FROM tb_animais WHERE id_animal = '$this->id'";

        if ($this->connect->query($sql)) {
            $_SESSION['mensagem'] = "Excluído com sucesso!";
            header('Location: ../../options_animais/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Excluir!";
            echo $this->connect->error;
            // header('Location: ../../index.php');
        }
    }
}
