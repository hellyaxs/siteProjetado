<?php

class conexao
{
    public static $acessoAoBD;

  public static function getConexao(){

      if (!isset(self::$acessoAoBD)){
          try {
              self::$acessoAoBD = new PDO("mysql:dbname=escolareinoinfantil;host=localhost","root","");

          }catch (PDOException $erro){
              echo $erro;
          }
      }
  }

}