<?php


class MateriaDao
{
    private $conexao;
    public function __construct()
    {
        conexao::getConexao();
        $this->conexao = conexao::$acessoAoBD;
    }

    public function create($idAluno,$nomeMateria,$nota1,$nota2,$nota3,$nota4,$fequencia)
    {
        $cmd = $this->conexao->query("INSERT INTO");

    }
    public function get(){}
    public function put(){}
    public function delete(){}
}