<?php

class Professor extends Pessoa
{
    private $dados= array(
        "turma",
        "alunos" => array()
    );


    public function Logar($email, $senha)
    {
      $cmd = $this->con->prepare("SELECT * FROM docentes WHERE email = :e AND senha = :s");
      $cmd->bindValue(":e",$email);
      $cmd->bindValue(":s",$senha);
      $cmd->execute();
      $dados = $cmd->fetch(PDO::FETCH_ASSOC);
      if($cmd->rowCount() > 0){
          echo "logou como professor";
      }

       return $dados;
    }


    public function logOff()
    {
       if(!isset($_SESSION["id"])){
           session_destroy();
       }
    }
}