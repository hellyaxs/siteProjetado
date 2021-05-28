<?php
 session_start();
 if(!isset($_SESSION['id']) || $_SESSION['usuario'] != 'gestao'){

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
    <style> h2{  margin-top:30px;color:blue;} </style>
    <title>Gereciamento dos alunos</title>
</head>
<body>
      
    <input type="checkbox" id="bt_menu" checked>
    <label for="bt_menu">&#9776;</label>

    <section class="menu" id="menu">
            <img src="../banco-de-imagem/favicon_io/favicon.ico" alt="logo-do-site">
            <nav>
                <ul>
                    <a href="../index.html" rel="nofollow"><li>Home</li></a>
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
              <img src="../banco-de-imagem/jeane perfil escolar.jpg" alt="ex" id="user">
          </div>

              <p><?php echo$_SESSION['nome'];?></p>

                <ul class="bimestre" id="bimestre">

                    <a href="?funcao=1"><li><div id="icon"><img src="../minha-coleçao/198-add-user.png" ></div>cadastrar novo aluno</li></a>

                    <a href="?funcao=2"><li><div id="icon"><img src="../minha-coleçao/219-user-17.png"></div>cadastrar professor</li></a>

                    <a href="?funcao=31"><li><div id="icon"><img src="../minha-coleçao/055-curriculum.png"></div>listar alunos</li></a>

                    <a href="?funcao=4"><li><div id="icon"><img src="../minha-coleçao/210-contact-information.png"></div>solicitação de historico</li></a>

                    <a href="?funcao=5"><li><div id="icon"><img src="../minha-coleçao/009-archive.png"></div>Professores cadastrados</li></a>

                    <a href="?funcao=6"><li><div id="icon"><img src="../minha-coleçao/212-user-11.png"></div>horarios Marcados</li></a>

                    <a href="sair.php"><li><div id="icon"><img src="../minha-coleçao/in.png"></div>sair</li></a>
                </ul>
        </div>


        <div id="notas">
           
        <?php
          require_once '../CLASSES/classes.php';
          $l= new usuario;
          $l->conectar();
        if(!isset($_GET['funcao'])){

            echo" <h1>Selecione um dos campos</h1>";
        }
        else{
              switch ($v=$_GET['funcao'][0]) {
                    case '1':
                       ?>
                       <h1>preencha os dados do aluno</h1>
                       <form action="novo-aluno.php" method="post" style="margin-top: 40px;">
                           <input type="text" name="nome" placeholder="Nome" maxlength="44">
                           <input type="email" name="email" required placeholder="E-mail"  required>
                           <input type="tel"  name="telefone"placeholder="(99)9 99999-9999" maxlength="15">
                           <select name="turma" required>
                            <option disabled selected>turma</option>
                            <option value="infantil_1">Infantil 1</option>
                            <option value="infantil_2">Infantil 2</option>
                            <option value="infantil_3">Infantil 3</option>
                            <option value="1_ano">1º ano</option>
                            <option value="2_ano">2º ano</option>
                            <option value="3_ano">3º ano</option>
                            <option value="4_ano">4º ano</option>
                            <option value="5_ano">5º ano</option>
                           </select><br>
                           <button type="submit">enviar</button>
                       </form>      
                       <?php
                       if(isset($_GET['funcao'][1])&&$_GET['funcao'][1]=='1'){
                           ?>
                           <h2>Aluno cadastrado</h2><img src="../minha-coleçao/008-tick.png">
                           <?php
                          
                       }else if(isset($_GET['funcao'][1])){
                         ?>
                           <h2 style="color:red;">Aluno não cadastrado</h2><img src="../minha-coleçao/032-cancel.png">
                           <?php
                       }
                    break;

                    case '2':
                        ?>
                        <h1>Preencha os dados do Professor</h1>
                        <form action="novo-aluno.php" method="post" style="margin-top: 40px;">
                            <input type="text" name="nome" placeholder="Nome">
                            <input type="email" name="email" required placeholder="E-mail"  required>
                            <input type="tel" name="telefone" placeholder="(99)9 99999-9999" maxlength="15">
                            <input type="text" name="cpf" placeholder="CPF " maxlength="11"  required>
                            <button type="submit">enviar</button>
                        </form>
                        <?php
                         if(isset($_GET['funcao'][1])&&$_GET['funcao'][1]=='1'){
                            ?>
                            <h2>Professor cadastrado</h2><img src="../minha-coleçao/008-tick.png">
                            <?php
                        }else if(isset($_GET['funcao'][1])){
                            ?>
                           <h2 style="color:red;">Professor não cadastrado</h2><img src="../minha-coleçao/032-cancel.png">
                           <?php
                        }
                    break;

                    case '3':
                           ?>
                            <div class="anos">
                                <div><a href="?funcao=3&infantil=1">infantil1</a></div>
                                <div><a href="?funcao=3&infantil=2">infantil2</a></div>
                                <div><a href="?funcao=3&infantil=3">infantil3</a></div>
                                <div><a href="?funcao=31"> 1ºano</a></div>
                                <div><a href="?funcao=32">2ºano</a></div>
                                <div><a href="?funcao=33">3ºano</a></div>
                                <div><a href="?funcao=34">4ºano</a></div>
                                <div><a href="?funcao=35">5ºano</a></div>
                            </div>
                            <h1>Alunos</h1>
                            <table style="margin-top: 30px;">
                         <tr>
                             <td style="padding:20px;">Nome</td>
                             <td style="padding:20px;">Codigo de Acesso</td>
                             <td style="padding:20px;">Telefone</td>
                             <td style="padding:20px;">ação</td>
                             
                         </tr>
                           <?php
                           
                            if (isset($_GET['funcao'][1]) || isset($_GET['infantil'])){
                                if(isset($_GET['infantil'])){
                                    $alunos = $l->listaralunos('infantil_'.$_GET['infantil']);
                                }else{
                                    $alunos = $l->listaralunos($_GET['funcao'][1].'_ano');
                                }
                           
                          for($i=0 ;$i <count($alunos) ;$i++){
                              echo"<tr>";
                            foreach ($alunos[$i] as $key => $value) {
                                echo"<td>".$value."</td>";
                                
                             }
                            ?>
                            <td><?php
                            if(isset($_GET['infantil'])){
                                ?>
                                <a href="?funcao=3<?php echo$_GET['infantil'];?>&delete=<?php echo $alunos[$i]['idAluno'];?>" style="color:tomato">excluir</a></td>

                                  <?php
                            }else{
                                ?>
                                <a href="?funcao=3<?php echo$_GET['funcao'][1];?>&delete=<?php echo $alunos[$i]['idAluno'];?>" style="color:tomato">excluir</a></td>
            
                                  <?php
                            }
                               
                              ?>
                              </td>
                            </tr>
                            <?php
                             if(isset($_GET['delete'])){
                                 if(isset($_GET['infantil'])){
                                    $l->excluirAluno('infantil_'.$_GET['infantil'],$_GET['delete']);
                                 }else{
                                    $l->excluirAluno($_GET['funcao'][1].'_ano',$_GET['delete']);
                                 }
                                ?>
                                <meta HTTP-EQUIV='refresh' CONTENT='0;URL=area-privada-gestao.php?funcao=3<?php echo$_GET['funcao'][1];?>'>
                                <?php
                            }
                            
                            }
                            }
                          ?>
                          </table>
                          <?php
                    break; 

                    case '4':
                         echo"<h1>Em desenvolvimento</h1>";
                    break;
                    
                    case '5':
                        ?>
                        <h1>Professores</h1>
                          <table style="margin-top: 30px;">
                          <tr >
                             <td style="padding:20px;">Nome</td>
                             <td style="padding:20px;">E-mail</td>
                             <td style="padding:20px;">telefone</td>
                             <td style="padding:20px;">codigo de Acesso</td>
                             <td style="padding:20px;">deletar</td>
                             <td style="padding:20px;">bloquear acesso</td>
                             </tr>
                       <?php
                          $professor=$l->listarProfessor('professor');
                          for ($i=0; $i < count($professor) ; $i++) { 
                              echo"<tr>";
                              foreach ($professor[$i] as $key => $value) {
                                   if($key != 'id' && $key !='permissao'){
                                       if($key=='Numero'){
                                        ?>
                                        <td style="padding:20px;"><a href="tel:+55 <?php echo$value?>"><?php echo $value; ?></a></td>
                                      <?php

                                       }else{
                                        ?>
                                        <td style="padding:20px;"><?php echo $value; ?></td>
                                      <?php
                                       }
                                 
                                }
                              }
                              ?>
                              <td><a href="?funcao=5&delete=<?php echo$professor[$i]['id'];?>"><img src="../minha-coleçao/032-cancel.png"></a></td> 
                              <td>
                              <?php
                                $l->jaBloqueado($professor[$i]['id'],$_GET['funcao'][0]);
                                    if(isset($_GET['block'])){
                                        $l->bloquearAcesso($_GET['block'],$professor[$i]['permissao']);
                                       
                                       echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=area-privada-gestao.php?funcao=5'>";
                                    }
                                    if(isset($_GET['onlock'])){
                                        $l->bloquearAcesso($_GET['onlock'],$professor[$i]['permissao']);
                                       
                                       echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=area-privada-gestao.php?funcao=5'>";
                                    }
                                  
                              ?>
                              </td>
                              </tr>
                              <?php
                              if(isset($_GET['delete'])){
                                  $l->excluirProfessor($_GET['delete']);
                                  echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=area-privada-gestao.php?funcao=5'>";
                              }
                          }
                          ?>
                           </table>
                         <?php
                    break;
                    
                    case '6':
                        echo"<h1>Em desenvolvimento</h1>";
                    break;
                    

              }


        }
        ?>
           
        </div>
</div>
   
<footer>
 Copyright  &copy;2021  desenvolvedor || Elias Vitor
</footer>
</body>
</html>
