<?php
require_once '../CLASSES/classes.php';
$t=new usuario;

$nome=$_POST['nome'];
$cpf=uniqid();
$telefone=$_POST['telefone'];
$email=$_POST['email'];
$turma=$_POST['turma'];

if(isset($_POST['turma']))
{

$t->conectar();
if($t->cadastrar($nome,$email,$telefone,$cpf,'1','aluno',$turma)){
    $res=1;
}else{
    $res=2;
}
header("location: area-privada-gestao.php?funcao=1".$res);
}else{

$t->conectar();
if($t->cadastrar($nome,$email,$telefone,$cpf,'2','professor',NULL)){
    $res=1;
}else{
    $res=2;
}
header("location: area-privada-gestao.php?funcao=2".$res);
}

 
?>