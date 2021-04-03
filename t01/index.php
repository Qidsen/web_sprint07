<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session for new</title>
</head>
<style>
    form {
	    border: 2px solid gray;
	    padding: 20px;
    }
    .pubilicity label{
        text-transform: capitalize;
    }
}
</style>
<body>
    <h1>Session for new</h1>
    <? if(!isset($_POST["btn4"])) { ?>
        <form action="index.php" method="post">
        <fieldset>
                <legend>About the Superhero</legend>
                <label>Real Name</label>
                <input type="text" name="real_name" placeholder="Superhero real name" autofocus>
                <label>Current Alias</label>
                <input type="text" name="superhero_name" placeholder="Superhero alias">
                <label>Age</label>
                <input type="number" name="age" min="1" max="999">
                <p><label>About</label>
                <textarea rows="5" cols="70" name="description" maxlength="500" placeholder="Information about the superhero, max 500 symbols"></textarea></p>
                <label>Photo:</label>
                <input type="file" id="choose_file" name="choose_file">
            </fieldset>
            <fieldset>
                <legend>Powers</legend>
                <input type="checkbox" name="btn1[]" value="1">
                <label>Strength</label>
                <input type="checkbox" name="btn1[]" value="2">
                <label>Speed</label>
                <input type="checkbox" name="btn1[]" value="3">
                <label>Intelligence</label>
                <input type="checkbox" name="btn1[]" value="4">
                <label>Teleportation</label>
                <input type="checkbox" name="btn1[]" value="5">
                <label>Immortal</label>
                <input type="checkbox" name="btn1[]" value="6">
                <label>Another</label>
                <p><label>Level of control:</label>
                <input type="range" name="slider" class="slider" name="mySlider" min="0" max="10" step="1" value="1"></p>
            </fieldset>
            <fieldset class="pubilicity">
                <legend>Pubilicity</legend>
                <input type="radio" name="btn2" value="0">
                <label>Unknown</label>
                <input type="radio" name="btn2" value="1">
                <label>Like a ghost</label>
                <input type="radio" name="btn2" value="2">
                <label>I am in comics</label>
                <input type="radio" name="btn2" value="3">
                <label>I have fun club</label>
                <input type="radio" name="btn2" value="4">
                <label>Superstar</label>
            </fieldset>
                <p><input type="reset" name="btn3" value="CLEAR">
                <input type="submit" name="btn4" value="SEND"></p>
        </form>
    <? } else {
        $arr = [
            "name:" => $_POST["real_name"],
            "alias" => $_POST["superhero_name"],
            "age" => $_POST["age"],
            "description" => $_POST["description"],
            "photo" => $_POST["choose_file"],
            "powers" => count($_POST["btn1"]),
            "level: " => $_POST["slider"],
            "purpose: " => $_POST["btn2"]
        ]; foreach($arr as $elem) echo "<p>$elem</p>";?>
        <form action="index.php" method="post">
            <input type="reset" name="btn5" value="FORGET"></p>
            <? if(isset($_POST["btn5"])) session_destroy(); ?>
        </form>
    <? } ?>
</body>
</html>
