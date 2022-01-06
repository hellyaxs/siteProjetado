<?php
class Pages {
    
    function Home(){
        include "views/home.php";
    }
    function QuemSomos(){
        include "views/quemSomos.php";
    }
    function agendeOnline(){
        include "views/AgendeOnline.php";
    }
    function Portifolio(){
        include "views/porfolio.php";
    }
    function login(){
        include "views/login.php";
    }
    function servicos(){
        include "views/servicos.php";
    }
   
}

?>