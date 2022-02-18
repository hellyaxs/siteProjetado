<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../banco-de-imagem/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lato:ital@1&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/output.css">
   <!-- <link rel="stylesheet" href="<?="assets/css/".$data["css"].".css"?>">-->

    <title>Escola Reino Infantil</title>
</head>
<body class="dark:bg-black">

<input type="checkbox" id="bt_menu" checked>
<label for="bt_menu">&#9776;</label>

<section class="menu" id="menu">
    <img src=" banco-de-imagem/favicon_io/favicon.ico" alt="logo-do-site">
    <div class="flex w-full bg-sky-600 py-3 justify-between px-8">
        <div class="flex">
            <p class="mx-3"> Mestre,Vitalino</p>
            <p>(81) 99142-6794</p>
        </div>
        <ul class="felx">
            <li class="bg-pink-500 ">i</li>

        </ul>
    </div>

    <nav class="flex w-full py-3 px-16 text-red-600  justify-evenly ">
        <h1 class="w-1/3 py-4 font-semibold">Escola Reino Infatil</h1>
        <ul class="flex py-4 justify-end w-2/3 container ">
            <?php
            foreach($paginas as $values){?>
                <a href="<?=$values?>" rel="nofollow" class="px-3"><li><?=$values?></li></a>
                <?php
            } ?>
        </ul>
    </nav>
</section>

 <?php
 //$test = new Gestao();
//$res = $test->deleteAluno(1);
//echo $res;

 //$this->runViewInTemplate($nameView,$data);
 ?>

<footer class="bg-sky-600">
    <div class="flex flex-row mx-auto ">
        <div class="basis-1/2 bg-white py-3 p-36">
            <h1 class="pb-2 font-semibold">Escola Reino Infatil</h1>
            <p class="my-5">texo</p>

                <ul class="flex">
                    <li class="bg-pink-500 circle mx-3">f</li>
                    <li class="bg-pink-500 circle mx-3">i</li>
                    <li class="bg-pink-500 circle mx-3">w</li>
                </ul>

        </div>
        <div class="basis-1/4 bg-rose-500">
            <h1>Class LInks</h1>
        </div>
        <div class="basis-1/4 bg-pink-500">
            <h1>about Us</h1>
        </div>
    </div>

    <p class="py-3 text-center">Copyright &copy;2022  desenvolvedor || Elias Vitor <a  href="#menu">volta ao topo</a></p>
</footer>

<script src="assets/js/theme.js"></script>
</body>
</html>