<?php
  $public_key = "becc6662b0a6ae9e382cb5b3b5c46ad6";
  $privat_key = "1acced835f9516dd1fd4f45f6bea45120afa00db";
  $time = time();
  $hash = md5($time.$privat_key.$public_key);
  $url = "http://gateway.marvel.com/v1/public/comics?ts=". $time . "&apikey=" . $public_key . "&hash=" . $hash;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($curl);
  curl_close($curl);
  $json = json_decode($response, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
  <?php
    function parser($json) {
    echo "<div class='json'>";
    foreach($json as $key => $value) {
      if (!is_array($value)) echo "<div class='row'>$key: <span>" . $value . "</span></div>";
      else {
        echo "<p class='title'>" . $key . "</p>";
        parser($json[$key]);
      }
    }
    echo "</div>";
  }
  parser($json);
?>
</body>
</html>
