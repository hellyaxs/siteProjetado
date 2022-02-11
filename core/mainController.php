<?php

class mainController
{
    private $pages;
    public function __construct()
    {
        $this->pages = array("home","sobre","agende","Portifolio","login","servicos");
        $login = new Logar();
        $login->verificaLogin();
    }
      public function getPages(){
        return $this->pages;
    }

    public function runTemplate($nameView, $data = array())
    {
        $paginas = $this->pages;
        require "views/template.php";
    }

    public function runViewInTemplate($nameView, $data = array())
    {
        extract($data);
        require "views/" . $nameView . ".php";
    }
}