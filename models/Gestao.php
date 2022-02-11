<?php
require_once "models/DAO/AlunoDao.php";
class Gestao extends Pessoa
{
    private $aluno;
    private $professor;

    public function __construct()
    {
        $this->aluno = new AlunoDao();
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

    public function Logar($email, $senha)
    {
        // TODO: Implement Logar() method.
    }

    public function getDataBD()
    {
        // TODO: Implement getDataBD() method.
    }
    public function createAluno($name,$urlfoto,$dataNascimento,$turma,$email){


       $res = $this->aluno->create($name,$urlfoto,$dataNascimento,$turma,$email);
       return $res;
    }

    public function deleteAluno($id){

       $res = $this->aluno->delete($id);
       return $res;
    }
}