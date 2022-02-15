<?php

class Aluno extends Pessoa
{
    private $alunoDao;

    private $dadosAluno = array(
        "materias" => array(
            "portugues" => array(1.2, 3.4, 4.5, 1.3),
        ),

    );

    public function __construct($idAluno, $name)
    {
        $this->alunoDao = new AlunoDao();
        $this->dados["name"] = $name;
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
       $novoAluno = $this->consutaBD($id);
       foreach ($novoAluno as $key => $value){
           $this->__set($key,$value);
       }

    }

    private function consutaBD($id)
    {
        return $this->alunoDao->get($id);
    }



}