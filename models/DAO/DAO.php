<?php

class DAO
{
  protected $conexao;

  public function __construct()
  {
      conexao::getConexao();
    $this->conexao = conexao::$acessoAoBD;
  }
}