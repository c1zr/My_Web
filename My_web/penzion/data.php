<?php
class Stranka {
    //zde definujeme sadu vlastnosti objektu 
    protected $id;
    protected $titulek;
    protected $menu;

    function __construct($argId, $argTitulek, $argMenu)
    {
        $this -> id = $argId;
        $this -> menu = $argMenu;
        $this -> titulek = $argTitulek;
    }

    //Getter
    public function getTitulek ()
    {
        //zde pred tim returnem muzeme mit nejakou logiku
        //napr. muzeme predtim nez returneme titulek udelat zazanam do databaze ze nekdo tuto vlastnot pouzil a jeho IP adresu
        //nebo muzeme ten titulek jeste nejak modifikovat

        return $this->titulek;
    }


    public function getMenu ()
    {
        return $this -> menu;
    }


    public function getId ()
    {
        return $this -> id;
    }


    public function getObsah ()
    {   //file_get_content prijma jeden paramentr a tim je cesta k souboru
        //prootze nase html soubory jsou ve stejne slozce jako data.php tak nemusime uvadet cestu, ale staci nazev souboru 
        //nazev souboru jsme ziskali tim, ze jsme vzali ID a prilepili k tomu .html
        $obsahHtmlSouboru = file_get_contents($this -> id.".html");

        return $obsahHtmlSouboru;
    }

    //setter
    public function setObsah ($argNovyObsah)
    {

        file_put_contents($this -> id.".html", $argNovyObsah);
    } 
}


//pole  instanci(objektu)
$stranky = [
    "domu" => new Stranka("domu", "Penzion - O nás", "Domů"),
    "kontakt" => new Stranka("kontakt", "Jak nás kontaktujete", "Kontakt"),
    "rezervace" => new Stranka("rezervace", "Rezervace poojů", "Rezervace" ),
    "galerie" => new Stranka("galerie", "Fotky penzionu", "Galerie"),
    "404" => new Stranka("404", "Stránka nenalezena", ""),
];



//pole poli 
/*
$stranky = [
    "domu" => [
        "titulek" => "Penzion - O nás",
        "menu" => "domu",
    ],
    "kontakt" => [
        "titulek" => "Jak nás kontaktujete",
        "menu" => "kontakt",
    ],
    "rezervace" => [
        "titulek" => "Rezervace poojů",
        "menu" => "Rezervace",
    ],
    "galerie" => [
        "titulek" => "Fotky penzionu",
        "menu" => "Galerie",
    ],
    "404" => [
        "titulek" => "Stránka nenalezena",
        "menu"    => "", 
    ],
];
*/

?>