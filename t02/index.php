<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hack it!</title>
</head>
<body>
    <h1>Password</h1>
    <? 
    if(isset($_POST['clear']))
    {
        session_destroy();
        $_SESSION["hacked"] = false;
        $_SESSION["not_hacked"] = false;
    }
    if(isset($_POST['check'])) {   
        if(hash_equals($_SESSION["hash"], crypt($_POST['hashed'], $_SESSION['salt']))) { $_SESSION['hacked'] = true; $_SESSION['not_hacked'] = false; }
        else { $_SESSION['hacked'] = false; $_SESSION['not_hacked'] = true; }
        unset($_POST['check']);
        unset($_POST['save']);
    }
    if(!isset($_POST["save"])) { ?>
        <form action="index.php" method="post"> <?
            if($_SESSION['hacked']) echo "<p style='color:green'>Hacked!</p>";
            else if($_SESSION['not_hacked']) echo "<p style='color:red'>Access denied!</p>"; ?>
            <p>Password not saved at session</p>
            <p>Password for saving to session
            <input type="text" name="password" placeholder="Password to session" autofocus></p>
            <p>Salt for saving to session
            <input type="text" name="salt" placeholder="Salt to session" autofocus></p>
            <input type="submit" name="save">
        </form>
    <? } else {  ?>
            <form action="index.php" method="post">
                <? $_SESSION["hash"] = crypt($_POST["password"], $_POST["salt"]);
                $_SESSION["salt"] = $_POST["salt"];?>
                <p>Password saved at session</p>
                <p>Hash is <? echo $_SESSION["hash"];?></p>
                <p>Try to guess: 
                <input type="text" name="hashed" placeholder="Password to session" autofocus>
                <input type="submit" name="check"></p>
                <button type="submit" name="clear">CLEAR</button>
            </form>
    <? } ?>
</body> 
</html>
