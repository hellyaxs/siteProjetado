<?php


class sistemaProfessorController extends mainController
{
    private $professor;
    public function __construct()
    {
        session_start();
        $this->professor = new Professor();
    }


    public function index(){



        $this->runTemplate('sistemadocente',$data,$this->aluno->getdados());
    }

}