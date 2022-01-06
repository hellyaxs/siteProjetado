<?php
require_once '../CLASSES/classes.php';
$b=new usuario;



    $a=$_FILES['boletinB3'];
    var_dump($a['type']);

if($a['type']=='application/pdf')
    {
     
    $upload1=md5($a['name'].rand(1,999)).".pdf";
    var_dump($upload1);
    move_uploaded_file($a['tmp_name'],'../notas_arquivos/'.$upload1);
    $b->conectar();
    $b->enviarPDF($_POST['idaluno'],$upload1,'3',$_POST['ano']);
    
    switch ($_POST['ano']) {
      case '1_ano':
           $voltar=2;
          break;
          case '2_ano':
           $voltar=3;
          break;
          case '3_ano':
           $voltar=4;
          break;
          case '4_ano':
           $voltar=5;
          break;
          case '5_ano':
           $voltar=6;
          break;
  }
  header("location: area-privada-professor.php?funcao=".$voltar);
   }
else{

    ?>
   <script type="text/javascript">
       alert('apenas  arquivos pdf')
    </script>
    <meta name='refresh' content='5;url=area-privada-professor.php?funcao=<?php echo$voltar;?>' />
    <?php
      
       echo"<h1>apenas arquivos pdf<h1>";

   }

?>