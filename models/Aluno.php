<?php

class Aluno extends Pessoa
{
    private $alunoDao;
    const materias = array("portugues");
    private $dadosAluno = array();

    public function __construct($idAluno, $name)
    {
        $this->alunoDao = new AlunoDao();
        $this->preenchendoDados($idAluno);

    }

    public function getdados()
    {
        return $this->dadosAluno;
    }

    public function __set($name, $value)
    {
        $this->dadosAluno[$name] = $value;
    }

    private function preenchendoDados($id){


       foreach ($this->consutaBD($id) as $key => $value){
           $this->__set($key,$value);
       }

       foreach (self::materias as $materia){
         $this->__set($materia,new Materia($id,$materia));
       }

    }

    private function consutaBD($id)
    {
        return $this->alunoDao->get($id);
    }



}