<?php

class Vacinacao{
    public $animal;
    public $vacina;
    public $data;
    public $id;
    public $connect;

    public function __construct($id, $animal, $vacina, $data)
    {
        $this->connect = new mysqli("localhost", "wiris", "1+1Wiris1+1", "MyFarm");
        $this->connect->set_charset("utf8");
        $this->id = $this->connect->escape_string($id);
        $this->animal = $this->connect->escape_string($animal);
        $this->vacina =  $this->connect->escape_string($vacina);
        $this->data =  $this->connect->escape_string($data);
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
        if($this->data == null){
            $sql = "INSERT INTO tb_vacinados(vacina, animal, data_vacinacao) VALUES('$this->vacina', '$this->animal', now())";
        }else{
            $sql = "INSERT INTO tb_vacinados(vacina, animal, data_vacinacao) VALUES('$this->vacina', '$this->animal', '$this->data')";
        }
    
        if($this->connect->query($sql)){
            $_SESSION['mensagem']= "Animal vacinado com sucesso!";
            header('Location: ../../index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao vacinar!";
            echo $this->connect->error;
        }
    }

    public function Atualizar()
    {
        $sql = "UPDATE tb_vacinados SET vacina = '$this->vacina', animal = '$this->animal', data_vacinacao = '$this->data' WHERE id_vacinado='$this->id';";
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
        $sql = "DELETE FROM tb_vacinados WHERE id_vacinado = '$this->id'";

        if($this->connect->query($sql)){
            $_SESSION['mensagem']= "Excluído com sucesso!";
            header('Location: ../../index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao Excluir!";
            echo $this->connect->error;
        }
    }

}
