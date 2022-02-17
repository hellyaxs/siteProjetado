<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../banco-de-imagem/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lato:ital@1&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="<?="assets/css/".$data["css"].".css"?>">

    <title>Escola Reino Infantil</title>
</head>
<body>

<input type="checkbox" id="bt_menu" checked>
<label for="bt_menu">&#9776;</label>

<section class="menu" id="menu">
    <img src=" banco-de-imagem/favicon_io/favicon.ico" alt="logo-do-site">
    <nav>
        <ul>
            <?php
            foreach($paginas as $values){?>
                <a href="<?=$values?>" rel="nofollow"><li><?=$values?></li></a>
                <?php
            } ?>
        </ul>
    </nav>
</section>

 <?php
 //$test = new Gestao();
//$res = $test->deleteAluno(1);
//echo $res;

 $this->runViewInTemplate($nameView,$data);
 ?>
<h1 class="text-red-600">hallo word</h1>
<footer>
    Copyright   &copy;2021  desenvolvedor || Elias Vitor <a  href="#menu">volta ao topo</a>
</footer>

<script src="assets/js/theme.js"></script>
</body>
</html>