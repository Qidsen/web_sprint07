<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data to XML</title>
</head>
<body>
<h1>Avenger Quote to XML</h1>

<?php
    function autoload($pClassName) {include(__DIR__. '/' . $pClassName. '.php');}
    spl_autoload_register("autoload");

    $avengerQuote1 = new AvengerQuote(1, " hdfgh", "asdbfasdf", ["sd","fd","hfg"]);
    $avengerQuote1->addComment("jfghjfh");
    $avengerQuote1->addComment("bsdg");
    $avengerQuote1->addComment("fhmjt!");

    $avengerQuote2 = new AvengerQuote(2, "hdfd g", "absdfa", ["hdfghdrth345ershf",]);
    $avengerQuote2->addComment("Wooose BBooBBBBBBBsfesooooW");
    $avengerQuote2->addComment("MMMMMsefsefMMM");

    $avengerQuote3 = new AvengerQuote(3, "gsdf", "hfgh basda", ["hdfghdrth345ershf",]);
    $avengerQuote3->addComment("Prrrrsef sef sefrrrrhfsefsefrulorem    lsfseorem    rrr");
    $avengerQuote3->addComment("bbb sef esfse brrrsef rrrrrrr");

    $listAvengerQuote = new ListAvengerQuotes();
    $listAvengerQuote->addAvengerQuote($avengerQuote1);
    $listAvengerQuote->addAvengerQuote($avengerQuote2);
    $listAvengerQuote->addAvengerQuote($avengerQuote3);

    $listAvengerQuote->toXML("file.xml");
    echo '<table border="1"><tr>';
    echo '<td><pre>'; 
    print_r($listAvengerQuote); 
    echo '</pre></td>';
    echo '<td><pre>'; 
    print_r($listAvengerQuote->fromXML("file.xml"));
    echo '</pre></td>';
    echo '</tr></table>';
?>
</body>
</html>
