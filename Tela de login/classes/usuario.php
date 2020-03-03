<?php

class Usuario
{
    private $pdo;
    public $msgErro = "";


    public function conectar($nome, $host, $usuario, $senha)
    {
        $global $pdo;
        try
         {
            $pdo = new PDO("msql:dbname=".$nome.";host=".$
            host,$usuario, $senha);
        } catch (PDOException $e) {
            %msgErro = $e = getMessage();
        }
    }
    public function cadastrar($nome, $telefone, $email, $senha )
    {
        $global $pdo;

    }
    public function logar()
    {
        $global $pdo;

}