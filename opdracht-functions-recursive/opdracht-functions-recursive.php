<?php

$beginbedrag    = 100000;
$intrestpercent = 8;
$aantalJaar     = 10;
$percentage     = $intrestpercent /100 ; // 0.08
$jaar           = 0;
$bedrag         = 0;

$array = array();

/*
*  100 000 * 0.08 = 8000 = 1e jaar
*  => 108 000 = eerste jaar
*  108 000 * 0.08 = 8640
*  => 108 000 + 8640 = 116 640 = tweede jaar
*/



//Loop 10 keer doorgaan


 //functie die zichzelf  -gebruikt ->

// functie maken
function $berekening( bedrag  percentage jaar){
  static $bedrag ;

  if($jaar == 0)
  {
 // bedrag  = 100 000 + ( 100 000     *    0.08    )  = 100 000 + 8 000   = 108 000
    $bedrag = $bedrag + ($beginbedrag * $percentage);
    array_push($array, $bedrag);
  }
  else {
 // bedrag  = 108 000 + ( 108 000 * 0.08      )  = 108 000 + 8 640   = 116 640
    $bedrag = $bedrag + ($bedrag * $percentage);
    array_push($array, $bedrag);
  }

//$berekening oproepen hier

}




 ?>





<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht recursive</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

        <section class="body">

            <style>
                img
                {
                    display:block;
                    padding:6px;
                    margin:24px auto;
                }
            </style>

            <h1>Opdracht recursive: deel 1</h1>

            <ul>
                <li>Een old school vraagstuk!</p>
                </li>

                <li>Hans heeft 100 000€ geërfd. Hij kan zijn geld aan de bank geven tegen een rentevoet van 8%. Als hij dat doet is hij wel verplicht om zijn geld 10 jaar op de bank te laten staan. Hans wil weten hoeveel geld hij na 10 jaar zal overhouden.</li>

                <li>Maak gebruik van een recursieve functie om te berekenen hoeveel geld Hans na 10 jaar zal overhouden</li>

                <li>Zorg er ook voor dat Hans kan ziet hoeveel zijn geld na elk jaar waard is. Rond daarbij alle getallen af naar beneden.</li>

                <li>Je mag hiervoor -voorlopig- met static variabelen werken</li>

                <?php print_r($array) ?>

                <li>
                    Als je je verbonden voelt met de onderstaande meme, vraag dan even wat uitleg om je op weg te helpen.
                    <img src="http://web-backend.local/img/opdracht-recursive-meme.png" alt="Math problems meme">
                </li>

            </ul>

            <h1>Opdracht recursive: deel 2</h1>

            <ul>
                <li>Probeer nu de statics (moest je die gebruikt hebben), volledig weg te werken zodat je op dezelfde pagina voor meerdere personen een individueel interestplan kan berekenen</li>

                <li>Je kan hiervoor de statics verplaatsen naar een paramter, of je kan, zoals in JavaScript vaak het geval is, alle parameters in een array steken en deze array als parameter opgeven in de functie.</li>

                <li>Op het einde van de berekening krijg je dan de volledige array met alle informatie terug.</li>
            </ul>

        </section>

    </body>
</html>
