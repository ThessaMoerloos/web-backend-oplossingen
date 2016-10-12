<?php

		$dieren1 	= 	array( "Kat", "Hond", "muis","Rat", "hamster", "vogel","leeuw", "slak", "springmuis", "draak" );

         $dieren[]   =  "kat";
         $dieren[]   =  "Hond";
         $dieren[]   =  "muis";
         $dieren[]   =  "Rat";
         $dieren[]   =  "hamster";

		$dieren2 	= 	array(  "Kat"	    => 	"loopt",
                                "Hond"	    => 	"loopt",
                                "muis"	    => 	"hupst",
                                "Rat"	    => 	"hupst",
                                "hamster"	=> 	"rolt",
                                "vogel"	    => 	"vliegt",
                                "leeuw"	    => 	"loopt",
                                "slak"	    => 	"flubbert",
                                "springmuis"=> 	"hupst",
                                "draak" 	=> 	"vliegt"
                             );

    $voertuigen    =    array(  "landvoertuigen"    => 	array("jeep", 
                                                              "fiets"),
                              
                                "watervoertuigen"   =>  array("jacht", 
                                                              "zeilboot"),
                              
                                "luchtvoertuigen"   =>  array("drone", 
                                                              "vliegtuig")   
                             );


/*$vardumpArray = var_dump($voertuigen);     Werkt niet op deze manier */
/*$print_r = print_r($voertuigen);*/

?>




<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht arrays basis</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht arrays basis: deel 1</h1>

            <ul>

                <li>Maak een array waarin je 10 dieren opslaat( doe dit op 2 verschillende manieren )</li>

                <li>Maak een nieuwe array met daarin 5 voertuigen, zorg er voor dat je kan bepalen om welke categorie van voertuig het gaat ( 2-dimensionele array), zoals 'landvoertuigen', 'watervoertuigen', 'luchtvoertuigen'. 
                <p>Wanneer je een <code>var_dump</code> van deze array doet, ziet het resultaat er ongeveer als volgt uit:</p>
                    
                    <ul class="array-notation pre">
                        <li>
                            [ 'landvoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'Vespa'</li>
                                <li>[ 1 ] => 'fiets'</li>
                            </ul>
                        </li>
                        <li>
                            [ 'watervoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'surfplank'</li>
                                <li>[ 1 ] => 'vlot'</li>
                                <li>[ 2 ] => 'schoener'</li>
                                <li>[ 3 ] => 'driemaster'</li>
                            </ul>
                        </li>
                        <li>
                            [ 'luchtvoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'luchtballon'</li>
                                <li>[ 1 ] => 'helicopter'</li>
                                <li>[ 2 ] => 'B52'</li>
                            </ul>
                        </li>
                    </ul>

                </li>

            </ul> 
            
            <pre> <?php echo var_dump($voertuigen) ?> </pre>
            
            

            <h1 class="extra">Opdracht arrays basis: deel 2</h1>

            <ul>
                <li>Maak een array waarin je de getallen 1, 2, 3, 4, 5 in plaatst</li>

                <li>Vermenigvuldig alle getallen met elkaar en druk af naar het scherm</li>

                <li>Druk de oneven getallen af (controle in script, niet zelf selecteren welke je afdrukt)</li>

                <li>Maak een tweede array waarin je de getallen 5, 4, 3, 2, 1 in plaatst</li>

                <li>Tel de getallen uit beide arrays met dezelfde index met elkaar op</li>
            </ul>
        
        </section>

    </body>
</html>
