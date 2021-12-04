<?php 
if(array_key_exists("odeslat", $_POST))
{
    $jmeno = $_POST["jmeno"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $zprava = $_POST["zprava"];

    $teloEmailu = "
        Jmeno: $jmeno
        Email: $email
        Telefon: $zprava
        Zprava: $zprava
    ";

    mb_send_mail("jendacizu@email.cz", "Kontaktni formular", $teloEmailu);
    echo "odeslano";
    

}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Jmeno: <input type="text" name="jmeno">
        <br>
        Email: <input type="email" name="email">
        <br>
        Telefon: <input type="text" name="telefon">
        <br>
        Zprava: <textarea name="zprava"cols="80" rows="20"></textarea>
        <br>
        <button name="odeslat">Odeslat</button>
    </form>
</body>
</html>