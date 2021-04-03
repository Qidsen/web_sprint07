<?php session_start(); $hash = "";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hack it!</title>
</head>
<body>
    <h1>Password <? echo $hash ?></h1>
    <? if(!isset($_POST["save"])) { ?>
        <form action="index.php" method="post">
            <p>Password not saved at session</p>
            <p>Password for saving to session
            <input type="text" name="password" placeholder="Password to session" autofocus></p>
            <p>Salt for saving to session
            <input type="text" name="salt" placeholder="Salt to session" autofocus></p>
            <input type="submit" name="save">
        </form>
    <? } else { 
            $_SESSION["hash"] = crypt($_POST["password"], $_POST["salt"])?>
            <form action="index.php" method="post">
            <p>Password saved at session</p>
            <p>Hash is <? echo $_SESSION["hash"];?></p>
            <p>Try to guess: 
            <input type="text" name="password" placeholder="Password to session" autofocus>
            <input type="submit" name="check"></p>
            <input type="reset" name="clear">
            <?if(isset($_POST["check"]) && $_POST["check"] == $_POST["password"]) $hash = "HACKED!";
        } ?>
    </form>
</body> 
</html>
