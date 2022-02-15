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

    public function createAluno($name,$urlfoto,$dataNascimento,$turma,$email){

       $res = $this->aluno->create($name,$urlfoto,$dataNascimento,$turma,$email);
       return $res;
    }

    public function deleteAluno($id){

       $res = $this->aluno->delete($id);
       return $res;
    }

    public function logOff()
    {
        // TODO: Implement logOff() method.
    }
}