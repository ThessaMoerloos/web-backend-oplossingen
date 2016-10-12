<?php 
    $getal          = 100;
    $eersteCijfer   = substr ($getal, 0, 1); 
    $tientallen     = "Tussen welke tientallen.";

    
if($getal > 0  && $getal < 100)
{
    
    if($eersteCijfer == 0 )  // is true/false
    {
        $tientallen =  "Het getal ligt tussen 0 en 10.";
    }
   	elseif ($eersteCijfer == 1  ) 
    {
			 $tientallen =  "Het getal ligt tussen 10 en 20.";
    } 
	elseif ($eersteCijfer == 2 ) 
    {
			 $tientallen =  "Het getal ligt tussen 20 en 230.";
    } 
	elseif ($eersteCijfer == 3 ) 
    {
			 $tientallen =  "Het getal ligt tussen 30 en 40.";
    } 
	elseif ($eersteCijfer == 4 ) 
    {
			 $tientallen =  "Het getal ligt tussen 40 en 50.";
    } 
	elseif ($eersteCijfer == 5 ) 
    {
			 $tientallen =  "Het getal ligt tussen 50 en 60.";
    } 
	elseif ($eersteCijfer == 6 ) 
    {
			 $tientallen =  "Het getal ligt tussen 60 en 70.";
    } 
	elseif ($eersteCijfer == 7 ) 
    {
			 $tientallen =  "Het getal ligt tussen 70 en 80.";
    } 
	elseif ($eersteCijfer == 8 ) 
    {
			 $tientallen =  "Het getal ligt tussen 80 en 90.";
    } 
	elseif ($eersteCijfer == 9 ) 
    {
			 $tientallen =  "Het getal ligt tussen 90 en 100.";
    } 
    else 
    {
        $tientallen =  "Het getal ligt niet tussen 0 en 100.";
    }
    
}
else
{
      $tientallen =  "Het getal ligt niet tussen 0 en 100.";   
        
}

    $omgekeerdeZin = strrev($tientallen);
    
?>




<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else if</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht if else if: deel 1</h1>

            <ul>
                <li>Maak een getal met een waarde tussen 1-100</li>
                <li>Zorg ervoor dat het script kan zeggen tussen welke tientallen het getal ligt, bv 'Het getal ligt tussen 20 en 30'.</li>
                <li>Zorg er vervolgens voor dat de boodschap omgekeerd afgedrukt wordt, bv '03 ne 02 nessut tgil lateg teH'.</li>
                <p><?php echo  $getal ?></p>
                <p><?php echo  $eersteCijfer ?></p>
                <p><?php echo  $tientallen ?></p>
                 <p><?php echo  $omgekeerdeZin ?></p>
            </ul>  
        
        </section>

    </body>
</html>
