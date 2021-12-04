<?php
require_once "data.php";

//pokud byla nejaka stranka vybana
if(array_key_exists("stranka", $_GET))
{
    $stranka = $_GET["stranka"];

    //zkontrolujeme zda li stranka existuje
    if(array_key_exists($stranka, $stranky) == false)
    {
        $stranka = "404";
        //rekneme i vyhledavaci, ze stranka neexistuje
        http_response_code(404);
    }
    
}
else{
    //pokud uzivatel prisel na index aniz by cokoliv zvolil tak mu zobrazime vychozi stranku domu
    $stranka = "domu";
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css1/style.css">
    <link rel="stylesheet" href="css1/all.min.css">
    <link rel="stylesheet" href="media.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <title> <?php echo $stranky[$stranka] -> getTitulek(); ?> </title>
</head>
<body>
    <header>
        <div class="container">
            <div class="headerKontakty">
                <a href="tel:+420111222333" class="tel">(+420) 111 222 333  
                </a>
                <div class="ikony">
                    <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram-square"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
                </div>
            </div>
            <a href="#" class="logo">Prima<br />Penzion</a>
            <div class="menu">
                <ul>
                    <?php 
                        foreach ($stranky as $page => $detaily) 
                        {
                            if ($detaily -> getMenu() != "")
                            echo "<li><a href='$page'>{$detaily -> getMenu()}</a></li>";
                        }
                    ?>
                <!--<li><a href="?stranka=domu">Domů</a></li>
                    <li><a href="?stranka=kontakt">Kontakt</a></li>
                    <li><a href="?stranka=rezervace">rezervace</a></li>
                    <li><a href="?stranka=galerie">galerie</a></li>-->
                </ul>
            </div>
        </div>
        <img src="img/primapenzion-main.jpg" alt="Penzion">
    </header>

    <section>
    <?php 
    include "$stranka.html"
    ?>
    </section>

    <footer>
        <div class="pata">

            <div class="menu">
                <ul>
                    <?php 
                        foreach ($stranky as $page => $detaily) 
                        {   
                            {
                                if ($detaily -> getMenu() != "")
                                echo "<li><a href='$page'>{$detaily -> getMenu()}</a></li>";
                            }
                        }
                    ?>
                    <!--<li><a href="?stranka=domu">Domů</a></li>
                    <li><a href="?stranka=kontakt">Kontakt</a></li>
                    <li><a href="?stranka=rezervace">rezervace</a></li>
                    <li><a href="?stranka=galerie">galerie</a></li>-->
                </ul>
            </div>

            <a href="index.html" class="logo">Prima<br />Penzion</a>

            <p>
                <i class="fas fa-map-pin"></i>
                <a href="https://goo.gl/maps/9YJAU6gy8v5ejah29" target="_blank"><strong> PrimaPenzion</strong>, Jablonského 2, Praha 7</a>
            </p>
            <p>
                <i class="fas fa-phone-alt"></i>
                <a class="tel" href="tel:+420606123456">(+420) 606 123 456</a>
            </p>
            <p>
                <i class="far fa-envelope fa-spin"></i>
                <b>info@primapenzion.cz</b>
            </p>

            <div class="ikony">
                <a href="#" target="_blank">
                    <i class="fab fa-facebook-square"></i></a>
                <a href="#" target="_blank">
                    <i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank">
                    <i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <div class="copy">
            &copy; Copyright 2021
        </div>

        <a href="#" class="btn">
            <i class="fas fa-angle-double-up"></i>
        </a>
    </footer>
</body>
</html>





