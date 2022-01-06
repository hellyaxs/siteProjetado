<?php

require_once 'CLASSES/classes.php';
$u =new usuario;
?>
<link rel="stylesheet" type="text/css" href="css/login-folha.css">
    <section>
            <form method="POST">
            
                <div><img src="banco-de-imagem/favicon_io/android-chrome-192x192.png" alt="logo-do-site"></div>
    
                <aside>
                        <h1>Meu boletin</h1>               
                        <input type="email" name="E-mail" id="E-mail" placeholder="Digite seu E-mail" required maxlength="80"> <br>
                        <input type="password" name="Senha" id="Senha" placeholder="Digite sa senha" required maxlength="15"> <br>
                        <select name="usuario" id="usuario" required>
                        <option disabled selected>user</option>
                        <option value="aluno">aluno</option>
                        <option value="professor">Professor</option>
                        <option value="gestao" >Gestão</option>                           
                        </select><br>
                        <button type="submit">logar</button><br>
                        <a href="esqueci-senha.php"><h3>esqueceu a senha?</h3></a>                    
                </aside>


            </form>
    </section>

<section id="contato">

    <div class="contato">
            <p>Para colaborações, patrocínios ou caso queira saber mais <br>sobre a Escola, entre em contato.</p>
            <address> R. Mte. Vitalino, 52 - COHAB I, Belo Jardim - PE, 55158-790, Brazil</address>
            <p> <a href="mailto:jeanebatista2014@gmail.com" style="color:blue">jeanebatista2014@gmail.com</a></p>
            <p><a href="tel:+55 (81)992963417" style="color:blue">(81) 99296-3417</a></p>

            <ul class="social">
                <li><a href="https://www.facebook.com/gmailReinoInfantil15anos/photos/?ref=page_internal" target="_blank"><img src="../social-media/minha-coleçao/png/001-facebook.png" alt="midia-social-facebook"></a></li>
                <li><a href="https://www.instagram.com/jeane_892/" target="_blank"><img src="../social-media/minha-coleçao/png/instagram.png" alt="midia-social-instagram"></a></li>
                <li><a href="#" target="_blank"><img src="../social-media/minha-coleçao/png/002-whatsapp.png" alt="midia-social-whatsapp"></a></li>
                <li><a href="https://goo.gl/maps/kid7Nx4TipNuRizR7" target="_blank"><img src="../social-media/minha-coleçao/png/003-periscopio.png" alt="midia-social-localizaçao"></a></li>
            </ul>
    </div>
</section>

<footer>
  Copyright  &copy;2021  desenvolvedor || Elias Vitor
   </footer>
 <?php  
if(isset($_POST['E-mail'])){

$email = addslashes($_POST['E-mail']);
$senha = addslashes($_POST['Senha']);
$user = addslashes($_POST['usuario']);

if(!empty($email) && !empty($senha)){

    $u->conectar();

   if($u->logar($email,$senha,$user)){
    
    if($user == 'gestao'){

        header("location: area-privada-gestao.php?funcao=1");

    }else if($user =='professor'){


        header("location: area-privada-professor.php?funcao=1");
    }
    else{
        header("location: area-privada.php?bimestre=1");
    }
   }
   else{
       ?>
<script>
     alert('E-mail ou senha invalidos tente novamente')
</script>

       <?php
   
   }
}
else{
    ?>
     <div id="msg-erro">prencha todos os campos!!!</div>
    <?php

    }
}
?>

</body>
</html>