<?php

class Materia
{
    private $dados = array();

    public function __construct($idAluno,$nomeMateria)
    {
        $this->obterDados($idAluno,$nomeMateria);
    }


    public function calcularMedia()
    {

    }

    private function obterDados($idAluno,$nomeMateria){

        $materiasDao = new MateriaDao();
       $materias = $materiasDao->get($idAluno,$nomeMateria);
       $this->dados = $materias;
       return $this->dados;
    }

    public function __set($name, $value)
    {
        $this->dados[$name] = $value;
    }


}