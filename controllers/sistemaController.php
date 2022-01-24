<?php
require_once "models/CLASSES/classes.php";

class sistemaController extends mainController
{

 public function index(){

     $dado = array("css"=>"home");
     if(isset($_POST['E-mail'])){
         $email = addslashes($_POST['E-mail']);
         $senha = addslashes($_POST['Senha']);
         $user = addslashes($_POST['usuario']);

         $acesso = new usuario();
         $dado += $acesso->logar($email,$senha,$user);
     }

     if(!isset($_SESSION["id"])  ){
         echo "voce nao tem acesso a este sistema";
     }
     else{
         print_r($dado);
         $this->runTemplate('sistema',$dado);
     }

 }
 public function logOff(){
     session_start();
     unset($_SESSION['id']);
     header("location: ../login");

 }

}