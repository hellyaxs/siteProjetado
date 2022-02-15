<?php

abstract class Pessoa
{
    protected $dados = array(
        "name",
        "email"
    );


    public function __get($name)
    {
        return $this->dados[$name];
    }





}