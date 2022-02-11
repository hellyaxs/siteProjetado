<?php

class Aluno extends Pessoa
{
    private $dados = array(
        "reponsvel",
        "turma",
        "materias" => array(
            "portugues" => array(),
            "matematica"=> array(),
            "artes" => array()
        ),
        "materialEscolar" =>array(),
        "frequencia",
    );

    public function __construct()
    {
        conexao::getConexao();
    }


    public function Logar($email, $senha)
    {
        // TODO: Implement Logar() method.
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }


    public function logOff()
    {
        // TODO: Implement logOff() method.
    }
}