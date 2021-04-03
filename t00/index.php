<?php
if($_COOKIE['value']) setcookie("value", $_COOKIE['value']+1, time()+60); else setcookie("value", 1, time()+60);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie counter</title>
</head>
<body>
    <h1>Cookie counter</h1>
    <p><?php echo "This page was loaded ";?><b><?php echo $_COOKIE['value'];?></b><?php echo " time(s) in last minute";?></p>
</body>
</html>
