<?php

class Materia
{
  private $dados = array();

  public function calcularMedia(){

  }

  public function __set($name, $value)
  {
     $this->dados[$name] = $value;
  }

  public function __get($name)
  {
     return $name == null ? $this->dados : $this->dados[$name];
  }


}