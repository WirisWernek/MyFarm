<?php

class Vacina{
    public $nome;
    public $descricao;
    public $id;
    public $connect;

    public function __construct($id, $nome, $descricao)
    {
        $this->connect = new mysqli("localhost", "wiris", "1+1Wiris1+1", "MyFarm");
        $this->connect->set_charset("utf8");
        $this->id = $this->connect->escape_string($id);
        $this->nome = $this->connect->escape_string($nome);
        $this->descricao =  $this->connect->escape_string($descricao);
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->$descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function Cadastrar()
    {
        $sql = "INSERT INTO tb_vacinas(nome_vacina, descricao_vacina) VALUES('$this->nome', '$this->descricao')";

        if($this->connect->query($sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../../index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo $this->connect->error;
        }
    }

    public function Atualizar()
    {
        $sql = "UPDATE tb_vacinas SET nome_vacina = '$this->nome', descricao_vacina = '$this->descricao' WHERE id_vacina='$this->id';";
        if($this->connect->query($sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../../index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao Atualizar!";
            echo $this->connect->error;
        }
    }
    public function Excluir()
    {
        $sql = "DELETE FROM tb_vacinas WHERE id_vacina = '$this->id'";

        if($this->connect->query($sql)){
            $_SESSION['mensagem']= "Excluído com sucesso!";
            header('Location: ../../index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao Excluir!";
            echo $this->connect->error;
        }
    }
    public function Listar()
    {

    }
}
