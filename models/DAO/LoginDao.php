<?php


class LoginDao
{
  private $conexao;

  public function __construct()
  {
      conexao::getConexao();
      $this->conexao = conexao::$acessoAoBD;
  }

    public function logar($email,$senha){

        $cmd = $this->conexao->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":s",$senha);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        return $dados;
    }

}