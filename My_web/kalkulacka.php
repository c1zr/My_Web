<?php include "_partials/header.php" ?>
<body class="aplikace">
<?php
    $cenaPiva = null;
    $spropitne = null;
    $vklad = null;

    $pocet = 1;
    $cena = 0;
    $tuzer = 0;
    $tabulka = null;
    $celkem = 0;
    $barva = null;

    if(array_key_exists("pocitej", $_GET))
    {
        $cenaPiva = intval($_GET["cenaPiva"]);
        $spropitne = intval($_GET["spropitne"]);
        $vklad = intval($_GET["vklad"]);

        $tabulka = "<table><tr><th>Počet piv</th><th>Cena piv</th><th>Spropitné</th><th>Celkem v Kč</th></tr>";
        if($cenaPiva > 0 && $spropitne >= 0 && $vklad > 0)
        {
            while($celkem <= $vklad)
            {
            $cena = $pocet * $cenaPiva;
            $tuzer = $cena * $spropitne / 100;
            $celkem = $cena + $tuzer;
            if($celkem <= $vklad)
            {
                $barva = "zelena";
            }
            else{
                $barva = "cervena";
            }
            $tabulka = $tabulka . "<tr class=$barva><td>$pocet</td><td>$cena</td><td>$tuzer</td><td>$celkem</td></tr>";
            $pocet++; 
            }

        }
        elseif($cenaPiva <= 0)
        {
            $tabulka = $tabulka . "<tr class=cervena><td colspan=4>Cena piva musí být větší než 0.</td></tr>";
        }
        elseif($spropitne < 0)
        {
            $tabulka = $tabulka . "<tr class=cervena><td colspan=4>Spropitné musí být alespoň 0 %.</td></tr>";
        }
        else
        {
            $tabulka = $tabulka . "<tr class=cervena><td colspan=4>Bez peněz do hospody nelez.</td></tr>";
        }
        
        $tabulka = $tabulka . "</table>";
    }
    
?>
    <div class="aplikace-table">
        <form method="get">
            <p class="aplikace-p">🍺Cena piva🍺</p> <input type="number" name="cenaPiva" value="<?php echo $cenaPiva ?>" placeholder="cena za kus" step="any">
            <p class="aplikace-p">Spropitné v %</p> <input type="number" name="spropitne" value="<?php echo $spropitne ?>" placeholder="Tip pro obsluhu" step="any">
            <p class="aplikace-p">💲💲 Tvé peníze 💲💲</p> <input type="number" name="vklad" value="<?php echo $vklad ?>" placeholder="Kolik mám" step="any" ><br>
            <button name="pocitej">Vypočítat</button>
        </form>
        <?php echo $tabulka; ?>
    </div>

    <script src="script.js"></script>
</html>

