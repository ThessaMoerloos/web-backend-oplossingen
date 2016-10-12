<?php 
    $getal      = 1;
    $dag        = "onbekende dag" ;


    if($getal == 1)
    {
        $dag = "Maandag" ;
    }
   
   if($getal == 2)
    {
        $dag= "dinsdag"; 
    }
   if($getal == 3)
    {
        $dag= "woensdag" ;
    }
   if($getal == 4)
    {
        $dag= "donderdag" ;
    }
   if($getal == 5)
    {
        $dag= "vrijdag" ;
    }
    if ( $getal == 6 ) 
    { 
        $dag = "zaterdag"; 
    } 
    if ( $getal == 7 ) 
    { 
        $dag = "zondag"; 
    }   


    /*$lengteNaam     = strlen($volledigeNaam);*/
    
    $hoofdletterDag = strtoupper($dag);
    $a              = "a";
    $A              = "A";
    $replaceAinDag  = str_replace($A, $a, $hoofdletterDag);   /* geeft MaaNDaG terug  */

    $laatsteA       = strrpos($replaceAinDag, $a);    /* geeft positie terug van laatste A */
    $oef3           = substr_replace( $hoofdletterDag, 'a', $laatsteA, 1 ); 
/*vanaf LaatsteA */
/* 1 ==> voor een lengte/duur van 1 plaats/positie/letter */
    
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht conditional statements</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht conditional statements: deel 1</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li>
                <li>Maak een PHP-script dat aan de hand van een getal ( tussen 1 en 7 ) de bijhorende dag afprint in kleine letters (geen hoofdletters!)</li>
                <li>Bijvoorbeeld, wanneer <code>$getal</code> gelijk is aan 1 dan wordt de string <code>'maandag'</code> op het scherm getoond</li>
                
                <li>Het is vandaag <?php echo $dag ?> dat is dag nr: <?php echo $getal ?></li>
                
                
            </ul>  
            
             
             
             
             

    		<h1 class="extra">Opdracht conditional statements: deel 2</h1>

    		<ul>
                <li>Maak een kopie van deel 1</li>
    			<li>Zet de naam van de dag (bv <code>'maandag'</code>) doormiddel van een string-functie dan naar hoofdletters om (bv <code>'MAANDAG'</code>).</li>
                <li>Het is vandaag <?php echo $hoofdletterDag ?> dat is dag nr: <?php echo $getal ?></li>
                
                
                <li>Zet alle letters in hoofdletters, behalve de 'a'</li>
                 <li>Het is vandaag <?php echo $replaceAinDag ?> dat is dag nr: <?php echo $getal ?></li>
                 
                 
                <li>Zet alle letters in hoofdletters, behalve de laatste 'a'</li>
                <li>Het is vandaag <?php echo $oef3 ?>. De laatste 'a' staat op positie: <?php echo $laatsteA ?></li>
                
                
    		</ul>

        </section>

    </body>
</html>
