<?php

class Logar
{
    private $profile;
    public function __construct()
    {
        $this->profile = new LoginDao();
    }


    private function verificaLogin($profile,$id){

       return $this->profile->returnProfile($profile,$id);

    }

    public function logar(){
     $dados = array();
        if(isset($_POST['email']) || isset($_POST["senha"])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $dados =  $this->profile->retornaLogin($email,$senha);

           if(count($dados) <= 0){
               echo "erro de solicitação";
           }
           else
           {
               session_start();
               $_SESSION["id"] = $dados["id"];
               $_SESSION["name"] = $dados["name"];
               $_SESSION["funcao"] = $dados["funcao"];

               //$this->verificaLogin($_SESSION["funcao"],$_SESSION["id"]);
           }

            return $dados;
        }
        else{
            echo "senha ou email incorretos";
            return $dados;
        }

    }




}