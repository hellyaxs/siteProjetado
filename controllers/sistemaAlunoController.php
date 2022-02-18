<?php


class sistemaAlunoController extends mainController
{
    private $aluno;
    private $data;

    public function __construct()
    {
        session_start();
        $this->aluno = new Aluno($_SESSION["id"],$_SESSION["name"]);
    }

    public function index(){

        print_r($this->aluno->getdados());
        //foreach ($this->aluno->getdados() as $item => $value){
        //echo "<pre>".var_dump($item)."=>".var_dump($value)."</pre>";
        //}
        $this->runTemplate('sistemadicente',$this->data,$this->aluno->getdados());
    }



}