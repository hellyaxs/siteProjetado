<?php

class loginController extends mainController {

    public function index(){

        $dado = array("css" => "login");
        $this->runTemplate('login',$dado);
    }

    function activeLogin($acesso){
        session_start();
        if(!isset($_SESSION['id']) || $_SESSION['usuario'] != $acesso){

            header(" location: login.php");
            exit();
        }
    }

    public function logar(){
        $login = new Logar();
        $login->logar();


        header("location: http://localhost/siteProjetado/sistema");
    }
}

?>