<?php

abstract class Pessoa
{
    protected $con;
    private $dados = array(
        "name",
        "email"
    );
    public function __construct()
    {
        conexao::getConexao();
        $this->con = conexao::$acessoAoBD;
    }


    public function __get($name)
    {
        return $this->dados[$name];
        // TODO: Implement __get() method.
    }

    public abstract function Logar($email,$senha);
    public abstract function logOff();


}