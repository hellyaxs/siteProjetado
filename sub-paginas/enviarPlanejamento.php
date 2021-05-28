<?php
include_once '../CLASSES/classes.php';
$envio =new usuario;
 

if($_POST['turma']=='1_ano'){
  
    if($_FILES['planejamento1']['type']=='application/pdf'){
    $arquivo=md5($_FILES['planejamento1']['name'].rand(1,999)).'1_ano.pdf';
    move_uploaded_file($_FILES['planejamento1']['tmp_name'],'../planejamento/'.$arquivo); 
    var_dump($arquivo);
    $envio->conectar();
    $id= $envio->enviarPlanejamento($arquivo,'1_ano');
    }
}elseif($_POST['turma']=='2_ano') 
{
    if($_FILES['planejamento2']['type']=='application/pdf'){
    $arquivo=md5($_FILES['planejamento2']['name'].rand(1,999)).'2_ano.pdf';
    move_uploaded_file($_FILES['planejamento2']['tmp_name'],'../planejamento/'.$arquivo); 
    var_dump($arquivo);
    $envio->conectar();
    $id= $envio->enviarPlanejamento($arquivo,'2_ano');
    }

}elseif($_POST['turma']=='3_ano') 
{
    if($_FILES['planejamento3']['type']=='application/pdf'){
    $arquivo=md5($_FILES['planejamento3']['name'].rand(1,999)).'3_ano.pdf';
    move_uploaded_file($_FILES['planejamento3']['tmp_name'],'../planejamento/'.$arquivo); 
    var_dump($arquivo);
    $envio->conectar();
    $id= $envio->enviarPlanejamento($arquivo,'3_ano');
    }
}elseif($_POST['turma']=='4_ano') 
{
    if($_FILES['planejamento4']['type']=='application/pdf'){
    $arquivo=md5($_FILES['planejamento4']['name'].rand(1,999)).'4_ano.pdf';
    move_uploaded_file($_FILES['planejamento4']['tmp_name'],'../planejamento/'.$arquivo); 
    var_dump($arquivo);
    $envio->conectar();
    $id= $envio->enviarPlanejamento($arquivo,'4_ano');
    }
}elseif($_POST['turma']=='5_ano') 
{
    if($_FILES['planejamento5']['type']=='application/pdf'){
    $arquivo=md5($_FILES['planejamento5']['name'].rand(1,999)).'5_ano.pdf';
    move_uploaded_file($_FILES['planejamento5']['tmp_name'],'../planejamento/'.$arquivo); 
  
    $envio->conectar();
    $id= $envio->enviarPlanejamento($arquivo,'5_ano');
    }
}elseif($_POST['turma']=='1_infantil') 
{
    if($_FILES['planejamento1in']['type']=='application/pdf'){
    $arquivo=md5($_FILES['planejamento1in']['name'].rand(1,999)).'1_in.pdf';
    move_uploaded_file($_FILES['planejamento1in']['tmp_name'],'../planejamento/'.$arquivo); 
    $envio->conectar();
    $id= $envio->enviarPlanejamento($arquivo,'infantil_1');
    }
}elseif($_POST['turma']=='2_infantil') 
{
    if($_FILES['planejamento2in']['type']=='application/pdf'){
    $arquivo=md5($_FILES['planejamento2in']['name'].rand(1,999)).'2_in.pdf';
    move_uploaded_file($_FILES['planejamento2in']['tmp_name'],'../planejamento/'.$arquivo); 
    $envio->conectar();
    $id= $envio->enviarPlanejamento($arquivo,'infantil_2');
    }
}elseif($_POST['turma']=='3_infantil') 
{
    if($_FILES['planejamento3in']['type']=='application/pdf'){
    $arquivo=md5($_FILES['planejamento3in']['name'].rand(1,999)).'3_in.pdf';
    move_uploaded_file($_FILES['planejamento3in']['tmp_name'],'../planejamento/'.$arquivo); 
    $envio->conectar();
    $id= $envio->enviarPlanejamento($arquivo,'infantil_3');
    }
}

else{
    echo"<script>alert(ano foi possivel enviar o arquivo)</script>";
}
 header('location:area-privada-professor.php?funcao=1');
?>