
    <?php
    include_once "../componets/head.php";
    ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/Agende-folha.css">
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