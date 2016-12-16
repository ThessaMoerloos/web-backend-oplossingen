<?php

// basic error message = leeg
  $message = " ";

try {

	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
  // Connectie maken met de 'bieren' DATABASE


  // Zorg ervoor dat wanneer er niet kan geconnecteerd worden met de database, er een custom foutboodschap verschijnt, inclusief de specifieke fout
  if (!$db) {
    // stop met proberen connecteren
      die('Not connected : ' . mysql_error());
  }


    //selecteer alles uit de tabel bieren die gelinkt is aan de tabel brouwers waarvan de naam van het bier begint met du en de brouwernaam een a bevat.
    // de query klaarmaken
    $queryString = 'SELECT * FROM bieren bi
    JOIN brouwers br
    ON (bi.brouwernr = br.brouwernr)
    WHERE bi.naam LIKE "du%"
    AND br.brnaam LIKE "%a%" '
    ;

  $statement = $db->prepare( $queryString );
  $statement->execute( );


    $bierenAsAr = array();

// hier gaat hij per 1 rij die fetchen/uit de db halen, en zolang er rijen zijn, die in de bieren steken [0] = 1e rij, [1] = 2e rij
// binnen zo een [0],[1],.. kan je dan kolomnaam aanspreken daarom ASSOC-array
  while ( $queryResultaat = $statement->fetch(PDO::FETCH_ASSOC) )
  {
    //hier in de bieren associative array zitten alle resultaten/rijen van u query in: [0], [1], [2] en [3] kolomnamen => gegevens
    $bierenAsAr[] =	$queryResultaat;
                      // [0],[1],[2] en [3]
  }



//KOLOMNAMEN

  $kolomnamenArray = array();

// eerste kolomnaam is leeg, zit net in de query, das u 1,2,3,4 en die heeft geen kolomnaam in de array, begint pas vanaf biernr
  $kolomnamenArray[]	=	'#';

// we gaan 0 gebruiken, kan evengoed [1],2 of 3 gebruiken, die hebben allemaal de kolomnamen
// $kolomnaam => $kolomInhoud  hier geven we de opmaak mee van de array rij [0] de eerste inhoud/rij
  foreach( $bierenAsAr[0] as $kolomnaam => $kolomInhoud )
  {
    //we hebben enkel de kolomnamen nodig, dus die spreken we hier aan, kolominhoud hebben we niet nodig
    // en die kolomnamen steken 1 voor 1 we in de globale var $kolomnamenArray[]
    $kolomnamenArray[]	=	$kolomnaam;
  }


} // einde try





catch (Exception $e) {
  //specifieke error message
  $message = "Er is een probleem met de connectie " . $e->getmessage();
}




 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Opdracht CRUD query</title>
         <link rel="stylesheet" href="http://web-backend.local/css/global.css">
         <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
         <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
     </head>
     <body class="web-backend-opdracht">

       <h1>Overzicht van de bieren</h1>


       <table>

           <thead>
               <tr><!-- Een voor 1 uit de $kolomnamenArray, de kolomnaam invullen in de th (hier geen specieke opmaak meegeven wqnt er zit maar 1 ding in de array)-->
                   <?php foreach ($kolomnamenArray as $kolomnaam): ?>
                     <th><?php echo $kolomnaam ?></th>
                   <?php endforeach ?>
               </tr>
           </thead>

           <tbody>

             <!-- weer de opmaak meegeven van de array inhoud [0,1,2,3]-->
             <!-- eerste foreach: 1 volledige rij maken eerst [0], dan [1]],...  -->
             <?php foreach ($bierenAsAr as $indexNr => $rijInhoudArray): ?>


              <tr>
                <!-- eerste kolom per rij = indexNr + 1 om 1,2,3,4 te krijgen -->
                <td><?= ($indexNr + 1) ?></td>

                <!-- per for each kunnen we 1 niveau lager gaan in de array -->
                <!-- terug opmaak geven van de rijInhoudArray en de kolomInhoud nemen en in td steken -->
                <?php foreach ($rijInhoudArray as $kolomnaam => $kolomInhoud ): ?>
                  <td><?= $kolomInhoud ?></td>
                <?php endforeach ?>

              </tr>


            <?php endforeach ?>

           </tbody>
       </table>

  </body>
 </html>
