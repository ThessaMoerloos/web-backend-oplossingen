<?php

$getal = 0;
$getalDoor3 = floor($getal / 3);

/*while( $getal >= 0 && $getal <=100 ) {
		echo $getal, ', ';
		++$getal;
	}
*/

$boodschappenlijstje	= 	array( "avocado", "appels", "salsa", "patatjes", "olijven" );
$i=0;


?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht while</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">  
        
        <h1>Opdracht while: deel 1</h1>

        <ul>

            <li>Druk alle getallen af van 0 tot 100 afgescheiden door een komma en 
            een spatie ' , '.</li>
            
            <?php while ( $getal >= 0 && $getal <=100 ): ?>

				<?php echo  $getal, ', ' ?>

				<?php ++$getal ?>

			<?php endwhile ?>

           
    
           
            <li>Op een volgende lijn druk je alle getallen af die deelbaar zijn door 3 én groter zijn dan 40 mààr kleiner zijn dan 80.</li>
            <?php while ( $getal > 40 && $getal < 80 && $getalDoor3 > 0): ?>

				<?php echo  $getal, ', ' ?>

				<?php ++$getal ?>

			<?php endwhile ?>

        </ul>

        <h1>Opdracht while: deel 2</h1>

        <ul>
             <li>Maak een array <code>$boodschappenlijstje</code> en plaats hierin enkele boodschapjes.</li>

            <li>Print deze boodschappen af in het HTML-gedeelte en plaats ze in <code>&lt;li&gt;</code>-elementen. Al deze <code>&lt;li&gt;</code>-elementen staan op hun beurt weer in één <code>&lt;ul&gt;</code>.</li>
            
           <ul>
			<?php while ( $boodschappenlijstje[$i] != null ): ?>

				<li><?php echo  $boodschappenlijstje[$i] ?></li>

				<?php ++$i ?>

			<?php endwhile ?>
		</ul>
            
            

            <li>Valideer je code met de <a href="http://validator.w3.org/">W3 Validator</a>. Dit doe je door de source-code van je document te bekijken <kbd>ctrl + u</kbd> / <kbd>⌘-Option-U</kbd>, deze te kopiëren en te plakken in de "direct input" tab.</li>

            <li>Als je code niet geldig is, maak je de nodige wijzigingen.</li>
        </ul>

    </body>
</html>
