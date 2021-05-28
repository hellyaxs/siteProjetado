<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../banco-de-imagem/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="../css/Agende-folha.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lato:ital@1&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agende Online</title>
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
            <a href="login.php" rel="nofollow"><li>Login</li></a>
            <a href="nossos-serviços.html" rel="nofollow"><li>Nossos serviços</li></a>
        </ul>
    </nav>
</section>

<section>
    
    <form action="marcarHorario.php" method="POST">
        
        <h1>Agende seu horario <br> de atendimento</h1>

        <input type="text" placeholder="Nome" maxlength="33" name="nome">
        <input type="email" placeholder="E-mail" required maxlength="50" name="email">
        <input type="tel" name="number" placeholder="(99)9 9999-9999" maxlength="14" minlength="11">
        <div class="radio">
      
             <h2>Interessado em:</h2>
            <input type="radio" name="envio" id="1" checked value="consultoria">
            <label for="1">consultorias</label><br>
    
            <input type="radio" name="envio" id="2" value="Matricula">
            <label for="2">martricula</label><br>
    
            <input type="radio" name="envio" id="3" value="mais sobre a escola">
            <label for="3">outro</label><br>

        
        </div>
       
         <button type="submit">marcar horario</button>
    </form>
</section>

<section id="contato">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.6258359234785!2d-36.415247485839124!3d-8.33992388630362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7a9c640f1f1c58d%3A0xb8330e6b9f697006!2sR.%20Mte.%20Vitalino%2C%2052%20-%20COHAB%20I%2C%20Belo%20Jardim%20-%20PE%2C%2055158-790!5e0!3m2!1spt-BR!2sbr!4v1609275513648!5m2!1spt-BR!2sbr" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</section>

<footer>
    Copyright  &copy;2021  desenvolvedor || Elias Vitor
</footer>
   <?php   
      if (isset($_GET['status'])) {
           if ($_GET['status']=='sucesso') {
              
            echo"<script>alert('email enviado com sucesso')</script>";

           }else{
            echo"<script>alert('email não pode ser enviado ')</script>";
           }
      }
   ?>
</body>
</html>