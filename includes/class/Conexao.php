<?php
class Conexao
{
    private static $senha = "";
    private static $servidor = "";
    private static $usuario = "";
    private static $banco = "";
    private static $connection = null;

    public static function Conectar()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/env.php';
        self::$senha = $password;
        self::$servidor = $server;
        self::$usuario = $user;
        self::$banco = $db;

        try {
            self::$connection = new PDO("mysql:host=" . self::$servidor . ";dbname=" . self::$banco, self::$usuario, self::$senha);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
        }

        return self::$connection;
    }
}
