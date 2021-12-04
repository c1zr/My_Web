<?php 
session_start();
require_once "data.php";

if (array_key_exists("prihlaseni-submit", $_POST)) {
    //vytahneme si data ktera uzivatel zadal do inputu
    $prihlasovaciJmeno = $_POST["prihlasovaci-jmeno"];
    $heslo = $_POST["heslo"];

    //kontrola spravnosti
    if ($prihlasovaciJmeno == "admin" && $heslo == "papousek123") 
    {   //uzivatel zadal spravne jmeno a heslo, vytvorime mu session
        $_SESSION["prihlasenyUzivatel"] = $prihlasovaciJmeno;
    }
}

//uzivatel se chce odhlasit

if (array_key_exists("logout", $_GET))
{
    //smazeme session a odhlasime uzivatele
    unset($_SESSION["prihlasenyUzivatel"]);
    //vycistime url aby tam uz nebyo ?logout=true
    header("location: ?");
}

//uzivatel chce editovat
if(array_key_exists("edit", $_GET))
{   
    //zjistime ID
    $idStrankyKEditaci = $_GET["edit"];
    //pouzijeme ID  abychm se dostali k nejake konkretni instanci
    $aktivniInstance = $stranky["$idStrankyKEditaci"];
}

//uzicatel chce aktualizovat webu
if(array_key_exists("editace-submit", $_POST))
{
    $novyObsahStranky = $_POST["obsah-stranky"];
    $aktivniInstance -> setObsah($novyObsahStranky);
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin sekce</title>
</head>
<body>
<?php
        if (array_key_exists("prihlasenyUzivatel", $_SESSION)) 
        {
            echo "Jste přihlášen";
            echo "<br>";
            echo "<a href='?logout=true'>Odhlasit se </a> ";

            echo "<ul>";
                foreach ($stranky as $page => $detaily) 
                {
                    echo "<li><a href='?edit={$page}'>{$detaily -> getId()}</a></li>";
                }
            echo "</ul>";

            
        
            if (isset($aktivniInstance))
            {

            
            ?>
            <form action="" method="post">
                <textarea name="obsah-stranky" id="delfin" cols="30" rows="30"><?php echo htmlspecialchars($aktivniInstance -> getObsah()); ?></textarea>
                <input type="submit" name='editace-submit' value="Aktualizovat web">
            </form>
            <script src="./vendor/tinymce/js/tinymce/tinymce.min.js"></script>

            <script>
                    tinymce.init({
                            selector: "#delfin",
                            plugins: [
                                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                                    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                            ],
                            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                            image_advtab: true ,
                            external_filemanager_path:"vendor/filemanager/",
                            external_plugins: { "filemanager" : "plugins/responsivefilemanager/plugin.min.js"},
                            filemanager_title:"Responsive Filemanager",
                            entity_encoding:'raw',
                            verify_html: false,
                            content_css:"./css/style.css"
                    });
            </script>

            <?php
            }
        }
        else
        {
            ?>

            <!-- form:post>label+input:text+label+input:password+input:submit -->
            <form action="" method="post">
                <label for="">Uživatelské jméno</label>
                <input type="text" name="prihlasovaci-jmeno" id="">
                <label for="">Heslo</label>
                <input type="password" name="heslo" id="">
                <input type="submit" name="prihlaseni-submit" value="Přihlásit se">
            </form>

            <?php
        }
    ?>

    
</body>
</html>