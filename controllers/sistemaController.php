<?php
require_once "models/CLASSES/classes.php";

class sistemaController extends mainController
{

    public function index(){
        session_start();
        $profile = $_SESSION["funcao"]."Start";
        $dado = array("css"=>"home");

       $dataUsuario = $this->$profile($_SESSION["id"],$_SESSION["name"],$dado);


    }

 private function dicenteStart($idAluno,$name,$data){

     $aluno = new Aluno($idAluno,$name);

     print_r($aluno->getdados());
     foreach ($aluno->getdados() as $item =>$value) {
         echo "<pre>".var_dump($item)."=>".var_dump($value)."</pre>";
     }
      $this->runTemplate('sistemadicente',$data,$aluno->getdados());

     }

 private function docenteStart($idProfessor,$name,$data){
     echo "funcao que inicia Professor";
     $this->runTemplate('sistemadocente',$data,$aluno->getdados());
     }

 public function logOff(){
        session_start();
        unset($_SESSION['id']);
        header("location: ../login");
      }


}