<?php

class conexao
{
  private static $acessoAoBD;

  public static function getConexao(){

      if (isset(self::$acessoAoBD)){
          try {
              self::$acessoAoBD = new PDO("mysql:dbname=escolainfantilbd;host=localhost","root","");

          }catch (PDOException $erro){
              echo $erro;
          }
      }

  }

}