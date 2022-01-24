
<div class="boletim">

    <div id="bimestre">
        <div id="voltar">
            <img src="../minha-coleçao/do-utilizador (1).png" id="user">
        </div>
        <p><?php echo$_SESSION['nome'];?></p>

        <ul class="bimestre" id="bimestre">

            <a href="?bimestre=5"><li><div id="icon"><img src="../minha-coleçao/150-book-1.png" ></div>Planejamento 2021</li></a>

            <a href="?bimestre=1"><li><div id="icon"><img src="../minha-coleçao/150-book-1.png" ></div>1ª Bimastre</li></a>

            <a href="?bimestre=2"><li><div id="icon"><img src="../minha-coleçao/150-book-1.png" ></div>2ª Bimastre</li></a>

            <a href="?bimestre=3"><li><div id="icon"><img src="../minha-coleçao/150-book-1.png" ></div>3ª Bimastre</li></a>

            <a href="?bimestre=4"><li><div id="icon"><img src="../minha-coleçao/150-book-1.png"></div>4ª Bimastre</li></a>

            <a href="sistema/logOff"><li><div id="icon"><img src="../minha-coleçao/in.png"></div>sair</li></a>

        </ul>
    </div>
    <div id="notas">

        <?php
        require_once '../CLASSES/classes.php';
        $a =new usuario;
        $aluno=$_SESSION['id'];

        if($_SESSION['permissao']=='123'){

            ?><h1>Seu acesso foi bloqueado pelo administrador</h1><?php
        }else{

            if(!isset($_GET['bimestre'])){

                echo"<h1>Selecione um dos campos a sua esquerda</h1>";

            }
            else{
                switch ($get=$_GET['bimestre']) {

                    case '1':
                        echo"<h1>1º Bimestre</h1>";
                        $a->conectar();
                        $notas= $a->verNotas($aluno,'1');
                        if($notas['1_bimestre']==NULL){
                            echo"<h1>Ainda não há notas cadastradas sistema</h1>";
                        }else{

                            ?>
                            <embed src="../notas_arquivos/<?php echo$notas['1_bimestre'];?>" width="97%" height="87%" />
                            <a href="../notas_arquivos/<?php echo$notas['1_bimestre'];?>"  download="<?php echo$notas['1_bimestre'];?>" type="application/pdf"id="prof">baixar agora</a>
                            <?php
                        }
                        break;

                    case '2':
                        echo"<h1>2º Bimestre</h1>";
                        $a->conectar();
                        $notas= $a->verNotas($aluno,'2');
                        if($notas['2_bimestre']==NULL){
                            echo"<h1>Ainda não há notas cadastradas sistema</h1>";
                        }else{
                            ?>
                            <embed src="../notas_arquivos/<?php echo$notas['2_bimestre'];?>" width="97%" height="87%" />
                            <a href="../notas_arquivos/<?php echo$notas['2_bimestre'];?>"  download="<?php echo$notas['2_bimestre'];?>" type="application/pdf"id="prof">baixar agora</a>
                            <?php
                        }

                        break;

                    case '3':
                        echo"<h1>3º Bimestre</h1>";
                        $a->conectar();
                        $notas= $a->verNotas($aluno,'3');
                        if($notas['3_bimestre']==NULL){
                            echo"<h1>Ainda não há notas cadastradas sistema</h1>";
                        }else{
                            ?>
                            <embed src="../notas_arquivos/<?php echo$notas['3_bimestre'];?>" width="97%" height="87%" />
                            <a href="../notas_arquivos/<?php echo$notas['3_bimestre'];?>"  download="<?php echo$notas['3_bimestre'];?>" type="application/pdf"id="prof">baixar agora</a>
                            <?php
                        }
                        break;

                    case '4':
                        echo"<h1>4º Bimestre</h1>";
                        $a->conectar();
                        $notas= $a->verNotas($aluno,'4');
                        if($notas['4_bimestre']==NULL){
                            echo"<h1>Ainda não há notas cadastradas sistema</h1>";
                        }else{
                            ?>
                            <embed src="../notas_arquivos/<?php echo$notas['4_bimestre'];?>" width="97%" height="87%" />
                            <a href="../notas_arquivos/<?php echo$notas['4_bimestre'];?>"  download="<?php echo$notas['4_bimestre'];?>" type="application/pdf"id="prof">baixar agora</a>
                            <?php
                        }
                        break;

                    case '5':
                        echo"<h1>Planejamento anual</h1>";
                        $a->conectar();
                        $notas= $a->verPlanejamneto($aluno);
                        if($notas==NULL){
                            echo"<h1>Ainda não há notas cadastradas sistema</h1>";
                        }else{
                            ?>
                            <embed src="../planejamento/<?php echo$notas['planoPDF'];?>" width="97%" height="87%"/>
                            <a href="../planejamento/<?php echo$notas['planoPDF']?>" download="<?php echo$notas['planoPDF'];?>" type="application/pdf" id="prof">baixar agora</a>
                            <?php
                        }
                        break;
                }
            }
        }
        ?>
    </div>
</div>