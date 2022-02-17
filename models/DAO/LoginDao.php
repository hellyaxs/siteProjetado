<?php


class LoginDao extends DAO
{

    public function retornaLogin($email,$senha){

        $cmd = $this->conexao->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":s",$senha);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function returnProfile($table,$id){

      $cmd = $this->conexao->query("SELECT * FROM {$table} WHERE IdAluno = {$id}");
      $dados = $cmd->fetch(PDO::FETCH_ASSOC);
      return $dados;
    }

}