<?php

class Vacinacao
{
    private $animal;
    private $vacina;
    private $data;
    private $id;
    private $connect;

    public function __construct($id, $animal, $vacina, $data)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/class/Conexao.php';
        $this->id = $id;
        $this->animal = $animal;
        $this->vacina = $vacina;
        $this->data = $data;
        $this->connect = new Conexao();
        $this->connect = $this->connect->Conectar();
    }
    public function getAnimal()
    {
        return $this->animal;
    }
    public function setAnimal($animal)
    {
        $this->animal = $animal;
    }

    public function getVacina()
    {
        return $this->vacina;
    }
    public function setVacina($vacina)
    {
        $this->vacina = $vacina;
    }

    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
    }

    public function Cadastrar()
    {
        $stmt = null;
        if ($this->data == null) {
            $sql = "INSERT INTO tb_vacinados(vacina, animal, data_vacinacao) VALUES(:vacina, :animal, now())";
            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(':vacina', $this->vacina);
            $stmt->bindValue(':animal', $this->animal);
        } else {
            $sql = "INSERT INTO tb_vacinados(vacina, animal, data_vacinacao) VALUES(:vacina, :animal, :data_vacinacao)";
            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(':vacina', $this->vacina);
            $stmt->bindValue(':animal', $this->animal);
            $stmt->bindValue(':data_vacinacao', $this->data);
        }

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Animal vacinado com sucesso!";
            header('Location: ../../vacinas/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao vacinar!";
            // echo $this->connect->error;
        }
    }

    public function Atualizar()
    {
        $sql = "UPDATE tb_vacinados SET vacina = :vacina, animal = :animal, data_vacinacao = :data_vacinacao WHERE id_vacinado = :id;";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(':vacina', $this->vacina);
        $stmt->bindValue(':animal', $this->animal);
        $stmt->bindValue(':data_vacinacao', $this->data);
        $stmt->bindValue(':id', $this->id);
        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../../vacinas/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            // echo $this->connect->error;
        }
    }
    public function Excluir()
    {
        $sql = "DELETE FROM tb_vacinados WHERE id_vacinado = :id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Excluído com sucesso!";
            header('Location: ../../vacinas/vizualizar.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Excluir!";
            // echo $this->connect->error;
        }
    }
}
