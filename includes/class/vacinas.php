<?php

class Vacina
{
    private $nome;
    private $descricao;
    private $id;
    private $connect;

    public function __construct($id, $nome, $descricao)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
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

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function Cadastrar()
    {
        $sql = "INSERT INTO tb_vacinas(nome_vacina, descricao_vacina) VALUES(:nome, :descricao)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: ../../options_vacinas/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            // echo $this->connect->error;
        }
    }

    public function Atualizar()
    {
        $sql = "UPDATE tb_vacinas SET nome_vacina = :nome, descricao_vacina = :descricao WHERE id_vacina = :id;";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':id', $this->id);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../../options_vacinas/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            // echo $this->connect->error;
        }
    }
    public function Excluir()
    {
        $sql = "DELETE FROM tb_vacinas WHERE id_vacina = :id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(':id', $this->id);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Excluído com sucesso!";
            header('Location: ../../options_vacinas/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Excluir!";
            // echo $this->connect->error;
        }
    }
}
