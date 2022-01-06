<?php
require_once '../CLASSES/classes.php';
$b=new usuario;
   
     $a=array();
     $a=$_FILES['boletinB1'];
     $voltar=$_POST['ano'];
     switch ($voltar) {
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

     if($a['type']=='application/pdf'){
     $upload1=md5($a['name'].rand(1,999)).".pdf";
     move_uploaded_file($a['tmp_name'],'../notas_arquivos/'.$upload1);
     $b->conectar();
     $b->enviarPDF($_POST['idaluno'],$upload1,'1',$_POST['ano']);
     
     
       header("location: area-privada-professor.php?funcao=".$voltar);
    }else{
        ?>
      <script type="text/javascript">
       alert('apenas arquivos pdf')
    </script>
    <meta name='refresh' content='5;url=area-privada-professor.php?funcao=<?php echo$voltar;?>#' />
        <?php

    }
     
?>