<?php 

    $getal      = 6;
    $dag        = "onbekende dag" ;


    switch ($getal)
    {
        case 1:
            $dag = "Maandag" ;
            break;
    
        case 2:
            $dag= "Dinsdag"; 
            break;

        case 3:
            $dag = "woensdag" ;
            break;

        case 4:
            $dag= "Donderdag"; 
            break;
            
        case 5:
            $dag = "vriJdag" ;
            break;
    
        case 6:
            $dag= "zaTerdag"; 
            break;
            
        case 7:
            $dag = "Zondag" ;
            break;
            
        default:
            $dag= "Pannekoeken-zondag"; 
            break;
    }

$kleineLetterDag = strtolower($dag);

    
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht switch</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht switch: deel 1</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li>
                <li>Maak een PHP-script dat aan de hand van een getal ( tussen 1 en 7 ) de bijhorende dag afprint in kleine letters (geen hoofdletters!)</li>
                <li>Maak gebruik van een switch en probeer alles te herschrijven i.p.v. te kopiëren.</li>
                <p>Vandaag is het: <?php echo $kleineLetterDag ?>. Dat is de <?php echo $getal ?>e dag van de week.</p>
            </ul>  

        </section>

    </body>
</html>
