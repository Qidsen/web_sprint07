<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
  <form action="index.php" method="post">
    <input type="url" name="url" placeholder="url">
    <input type="submit" value="Go">
    <a href="" name="back">BACK</a>
  </form>
  <?php
    if(!$_POST['url']) echo "<p>Type an URL...</p>"; 
    else {
      echo $_POST['url'].'<br><br>';
      $body_inner_html = file_get_contents($_POST['url']);
      $body_inner_html = explode("<body", $body_inner_html)[1];
      $body_inner_html = explode("</body>", $body_inner_html)[0];
      $body_inner_html = "<body".$body_inner_html."</body>";
      $body_inner_html = str_replace("<", "&lt;", $body_inner_html);
      $body_inner_html = str_replace(">", "&gt;", $body_inner_html);
      $body_inner_html = nl2br($body_inner_html);
      echo $body_inner_html;
    }
    ?>
</body>
</html>
