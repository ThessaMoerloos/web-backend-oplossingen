<?php 


$dieren        = array( "kat", "hond", "muis","rat", "hamster", "vogel","leeuw");
$aantalDieren   = count($dieren); 

$dier           = "mus";
$teZoekenDier   = in_array($dier, $dieren);

$boodschap      = "Nog in te vullen.";

if($teZoekenDier) // is true
{
    $boodschap = "Het dier is gevonden in de array.";
}
else{//false 
    $boodschap = "Het dier is niet gevonden in de array.";    
}


$gesorteerdeArray = sort($dieren);

$zoogdieren        = array( "slak", "springmuis", "draak");

$dierenlijst = array_merge($dieren,$zoogdieren);
$aantalGecombineerdeDieren   = count($dierenlijst); 


?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht array functies</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            
            <h1>Opdracht array functies: deel 1</h1>

            <ul>
                <li>Maak een array waarin je meer dan 5 dieren plaatst</li>

                <li>Laat het script berekenen hoeveel elementen er in de array zitten en druk af naar het scherm</li>
                <p> <?php echo $aantalDieren?> </p>

                <li>Maak het mogelijk om met een variabele <code>$teZoekenDier</code> een dier te zoeken in de array, druk tevens een gepaste boodschap af (gevonden/niet gevonden).</li>
                <p>Je gaf in: <?php echo $dier ?>. <?php echo $boodschap ?> </p>

            </ul> 

            <h1 class="extra">Opdracht array functies: deel 2</h1>

            <ul>
                <li>Ga verder op deel 1 (maar maak er een aparte kopie voor, overschrijf het origineel niet!)</li>

                <li>Zorg ervoor dat de array volgens het alfabet gesorteerd wordt ( A -> Z )</li>
                

                <li>Maak een array <code>$zoogdieren</code> en plaats hier 3 dieren in, voeg vervolgens de 2 arrays met dieren samen in de array <code>$dierenLijst</code></li>
                <p>Er zitten nu in beide arrays samen: <?php echo $aantalGecombineerdeDieren ?> dieren.</p>
            </ul>


            <h1 class="extra">Opdracht array functies: deel 3</h1>

            <ul>
                <li>Maak een array met volgende waarden:
                    <p>8, 7, 8, 7, 3, 2, 1, 2, 4</p>
                </li>

                <li>Haal de duplicaten uit de array</li>

                <li>Sorteer de array van groot naar klein</li>

            </ul>

        </section>

    </body>
</html>
