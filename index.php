<?php
include_once "componets/head.php";
include "controller/pages.php";

if ($_GET['controller']!=null && $_GET['active']!=null) 
{
    $controll =$_GET['controller'];
    $getpage =$_GET['active'];
}

$pages = new $controll;
$pages->$getpage();
?>
     
