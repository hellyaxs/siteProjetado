<?php
 session_start();
 if(!isset($_SESSION['id'])||$_SESSION['usuario'] != 'professor'){

    header(" location: login.php");
    exit();
 }
 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="meu-boletim.php">
    <link rel="shortcut icon" href="../banco-de-imagem/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lato:ital@1&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambiemte professor</title>
</head>
<body>

    
<input type="checkbox" id="bt_menu" checked>
    <label for="bt_menu">&#9776;</label>

    <section class="menu" id="menu">
    <img src="../banco-de-imagem/favicon_io/favicon.ico" alt="logo-do-site">
    <nav>
        <ul>
            <a href="../index.php" rel="nofollow"><li>Home</li></a>
            <a href="quem-somos.html" rel="nofollow"> <li>Quem somos</li></a>
            <a href="agende-online.php" rel="nofollow"><li>Agende Online</li></a>
            <a href="portifolio.html" rel="nofollow"><li>Portifolio</li></a>
            <a href="nossos-serviços.html" rel="nofollow"><li>Nossos serviços</li></a>
        </ul>
    </nav>
</section>

<div class="boletim">
       
       <div id="bimestre">
          <div id="voltar">
              <img src="../minha-coleçao/do-utilizador (1).png" alt="ex" id="user">
          </div>
           <p><?php echo$_SESSION['nome'];?></p>
           <ul class="bimestre" id="bimestre">
               <a href="area-privada-professor.php?funcao=1"><li><div id="icon">
                   <img src="../minha-coleçao/194-upload-1.png" >
               </div>Planejamento 2021</li></a>

               <a href="area-privada-professor.php?funcao=7"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png" ></div>Diagnostico infantil 1</li></a>

               <a href="area-privada-professor.php?funcao=8"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png" ></div>Diagnostico infantil 2</li></a>

               <a href="area-privada-professor.php?funcao=9"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png" ></div>Diagnostico infantil 3</li></a>

               <a href="area-privada-professor.php?funcao=2"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png" ></div>Notas 1ºano</li></a>

               <a href="area-privada-professor.php?funcao=3"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png"></div>Notas 2ºano</li></a>

               <a href="area-privada-professor.php?funcao=4"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png"></div>Notas 3ºano</li></a>

               <a href="area-privada-professor.php?funcao=5"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png"></div>Notas 4ºano</li></a>

               <a href="area-privada-professor.php?funcao=6"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png"></div>Notas 5ºano</li></a>


               <a href="sair.php"><li><div id="icon"><img src="../minha-coleçao/in.png"></div>sair</li></a>
           </ul>
       </div>
       <div id="notas">
          

       
  <?php 
  if($_SESSION['permissao']=='123'){

     ?><h1>Seu acesso foi bloqueado pelo administrador</h1><?php
  }else{
          require_once '../CLASSES/classes.php';
          $l= new usuario;

          if(!isset($_GET['funcao'])){
              echo"<h1>selecione um dos campos a esquerda</h1>";
              
          }
          else{
              $bimestre=0;
              $voltar= false;
          switch ($funcao=$_GET['funcao'][0]) {
              case '1':
                    $bimestre="plano";
                  break;
              case '2':
                   $bimestre='1_ano';
                break;
             case '3':
                $bimestre='2_ano';
                    break;
             case '4':
                $bimestre='3_ano';
                    break;
             case '5':
                $bimestre='4_ano';
                    break;
             case '6':
                $bimestre='5_ano';
                    break;
               case '7':
                  $bimestre='infantil_1';
                    break;
                case '8':
                  $bimestre='infantil_2';
                    break;
                case '9':
                  $bimestre='infantil_3';
                    break;
              default:
                  echo"<h1>selecione um dos campos a esquerda</h1>";
                  break;
          }
          
          $l->conectar();
          $dados= $l->listaralunos($bimestre);
          if($bimestre=='plano'){
 
            echo"<h1>insira o planejamento da sua turma </h1>";
            ?>
            
            <table>
                 <tr>
                <?php
       for ($i=1 ; $i < 4; $i++ ) { 
                       ?>
                 <td>
                      <div id="icon" ><img src="../minha-coleçao/222-verified.png"></div><strong><?php echo$i;?>º infantil</strong>
                      <form action="enviarPlanejamento.php" method="post" enctype="multipart/form-data" >
                      <input type="file" name="planejamento<?php echo$i;?>in">
                      <input type="text" name="turma" style="visibility: hidden; width:1px; position:absolute;"  value="<?php echo$i;?>_infantil">

               <?php 
                
                if($l->planejamentoExiste($i.'_infa')){
                  ?>
                  <h3> enviado <br></h3>
                  <a href="area-privada-professor.php?funcao=<?php echo "1".$i;?>" id="prof">excluir</a>
                  <?php
                }else{
                  ?>
                  <button type="submit" id="prof">enviar</button>
                  <?php
                }
                 if(isset($_GET['funcao'][1])&& $_GET['funcao'][1]==$i){
                     $l->excluirPanejamento($i.'_infa');
                     echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=area-privada-professor.php?funcao=1'>";
                 }
          ?>
              </form>               
                </td>
                  <?php  }?>
                  </tr>
            </table>

            <table style="margin-top: -9px;">
                <tr>
                    <?php for ($i=1 ; $i < 6; $i++ ) { 
                       ?> 
                       <td>

                         <div id="icon"><img src="../minha-coleçao/222-verified.png"></div><strong><?php echo $i;?>º ano</strong>
                         <form action="enviarPlanejamento.php" method="post" enctype="multipart/form-data" >
                         <input type="file" name="planejamento<?php echo $i;?>">
                         <input type="text" name="turma" style="visibility: hidden; width:1px; position:absolute;" value="<?php echo $i;?>_ano">
           <?php 
                
                  if($l->planejamentoExiste($i.'_ano')){
                    $notas= $l->verPlanejamnetoP($i.'_ano');
                    ?>
                    <h3> enviado <br></h3>
                    <a href="area-privada-professor.php?funcao=<?php echo "1".$i;?>" id="prof">excluir</a><br>
                    <a href="../planejamento/<?php echo$notas['planoPDF']?>" type="application/pdf" target="_blank" style="color: green;">abrir</a>
                    <?php
                  }else{
                    ?>
                    <button type="submit" id="prof">enviar</button>
                    <?php
                  }
                   if(isset($_GET['funcao'][1])&& $_GET['funcao'][1]==$i){
                       $l->excluirPanejamento($i.'_ano');
                       echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=area-privada-professor.php?funcao=1'>";
                   }
                ?>
                </form>
                </td>   
                  <?php }?>
                </tr> 
                </table> 

            <?php
            
          }else{
          ?>
          <h1> Alunos</h1>
 
          <table>
                 <tr>
                     <td><h3>Nome</h3></td>
                      <td><h3>1ºBimestre<h3></td>
                      <td><h3>2ºBimestre<h3></td>
                      <td><h3>3ºBimestre<h3></td>
                      <td><h3>4ºBimestre<h3></td>
                 </tr>
          <?php
          for ($i=0; $i <count($dados) ;$i++ ) { 
              echo"<tr>";
             foreach ($dados[$i] as $key => $value) {
              
              if($key !="id" && $key!="idAluno"){
                 echo"<td>".$value."</td>";
              }
             } 
              
             ?>                    
        <td>
            <form method="post" action="enviarBoletim.php" enctype="multipart/form-data"> 
                <input type="file" name="boletinB1">
                <input type="text" name="idaluno" value="<?php echo$dados[$i]['idAluno']?>" style="visibility:hidden;position:absolute; width:10px;">
                <input type="text" name="ano" value="<?php echo$bimestre?>" style="visibility:hidden;position:absolute; width:10px;">
                <?php $l->jaexite('1',$dados[$i]['idAluno'],$bimestre,$funcao);
            
                if(isset($_GET['funcao'][1]) && $_GET['funcao'][1]=='1'&& $_GET['funcao'][2].$_GET['funcao'][3]==$dados[$i]['idAluno'])
                {
                  $voltar= $l->excluir('1',$_GET['funcao'][2].$_GET['funcao'][3],$bimestre);
                 
                }
                if($voltar){
                    ?><meta HTTP-EQUIV='refresh'><?php
                    ?><meta HTTP-EQUIV='refresh' content='0.1'><?php
                    $voltar=false;
                }
                ?>   
            </form>
        </td>
            
              
        <td>
              <form method="post" action="enviarBoletim2.php" enctype="multipart/form-data"> 
                  <input type="file" name="boletinB2">
                  <input type="text" name="idaluno" value="<?php echo$dados[$i]['idAluno']?>"style="visibility:hidden;position:absolute; width:10px;">
                  <input type="text" name="ano" value="<?php echo$bimestre?>" style="visibility:hidden;position:absolute; width:10px;">
            <?php 
                  $l->jaexite('2',$dados[$i]['idAluno'],$bimestre,$funcao);
                  
                    if(isset($_GET['funcao'][1]) && $_GET['funcao'][1]=='2' && $_GET['funcao'][2].$_GET['funcao'][3]==$dados[$i]['idAluno'])
                    {
                      $voltar= $l->excluir('2',$_GET['funcao'][2].$_GET['funcao'][3],$bimestre);
                    }  
                    if($voltar){
                        ?><meta HTTP-EQUIV='refresh'><?php
                        ?><meta HTTP-EQUIV='refresh' content='0.1'><?php
                        $voltar=false;
                    }
            ?>
                  
              </form>
        </td>

        <td>
              <form method="post" action="enviarBoletim3.php" enctype="multipart/form-data"> 
                  <input type="file" name="boletinB3" >
                  <input type="text" name="idaluno" value="<?php echo$dados[$i]['idAluno']?>"style="visibility:hidden;position:absolute; width:10px;">
                  <input type="text" name="ano" value="<?php echo$bimestre?>" style="visibility:hidden;position:absolute; width:10px;">
                <?php 
                    $l->jaexite('3',$dados[$i]['idAluno'],$bimestre,$funcao); 
                    if(isset($_GET['funcao'][1]) && $_GET['funcao'][1]=='3' && $_GET['funcao'][2].$_GET['funcao'][3]==$dados[$i]['idAluno'])
                    {
                      $voltar= $l->excluir('3',$_GET['funcao'][2].$_GET['funcao'][3],$bimestre);
                    }
                    if($voltar){
                        ?><meta HTTP-EQUIV='refresh'><?php
                        ?><meta HTTP-EQUIV='refresh' content='0.1'><?php
                        $voltar=false;
                    }
                 ?>
                  
              </form>
        </td>

        <td>
              <form method="post" action="enviarBoletim4.php" enctype="multipart/form-data">    
                  <input type="file" name="boletinB4" >
                  <input type="text" name="idaluno" value="<?php echo$dados[$i]['idAluno']?>"style="visibility:hidden;position:absolute; width:10px;">
                  <input type="text" name="ano" value="<?php echo$bimestre?>" style="visibility:hidden;position:absolute; width:10px;">
            <?php  $l->jaexite('4',$dados[$i]['idAluno'],$bimestre,$funcao); 
                 if(isset($_GET['funcao'][1]) && $_GET['funcao'][1]=='4' && $_GET['funcao'][2].$_GET['funcao'][3]==$dados[$i]['idAluno'])
                {
                   $voltar= $l->excluir('4',$_GET['funcao'][2].$_GET['funcao'][3],$bimestre);

                }
                if($voltar){
                    ?><meta HTTP-EQUIV='refresh'><?php
                    ?><meta HTTP-EQUIV='refresh' content='0.1'><?php
                    $voltar=false;
                }
                ?>
                
              </form>
        </td></tr>
             <?php
          }
             echo"</table>";
          }
        } 
      }
          ?>
       </div>
   </div>

   <footer>
         Copyright  &copy;  2021  desenvolvedor || Elias Vitor
   </footer>


</body>
</html>
