<?php

class Professor extends Pessoa
{

    private $dados= array(
        "turma",
        "alunos" => array()
    );



    public function logOff()
    {
       if(!isset($_SESSION["id"])){
           session_destroy();
       }
    }
}