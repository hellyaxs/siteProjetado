<?php

class Logar
{


    public function verificaLogin(){

    }

    public function logar(){
     $dados = array();
        if(isset($_POST['email']) || isset($_POST["senha"])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

           $acesso = new LoginDao();
           $dados =  $acesso->logar($email,$senha);

           session_start();
           $_SESSION["id"] = $dados["id"];
           $_SESSION["name"] = $dados["name"];
           $_SESSION["funcao"] = $dados["funcao"];

            return $dados;
        }
        else{
            echo "senha ou email incorretos";
            return $dados;
        }

    }




}