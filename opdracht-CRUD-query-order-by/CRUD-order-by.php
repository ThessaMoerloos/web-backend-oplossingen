<?php

// basic error message = leeg
  $message = " ";

    try {

    	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
      // Connectie maken met de 'bieren' DATABASE

      $orderColumn	=	'bieren.biernr';
  		$order			=	'ASC';

      // 1, 5, 9, 13, 17, 21
      if (isset( $_POST['asc'] ))
      {
        $order =	'ASC';


      }

      // 25, 21, 17, 13, 9, 1
      if (isset( $_POST['desc'] ))
      {
        $order =	'DESC';

      }
      /*
      //wanneer orderBy wordt opgevangen uit de QUERY
      //??????
      if ( isset( $_GET[ 'orderBy' ] ) )
      {
        //              explode() = Split a string by string
        $orderArray		=	explode( '-', $_GET[ 'orderBy' ] );
        //??????
        $orderColumn	=	$orderArray[ 0 ];
        $order		=	$orderArray[ 1 ];
      }
*/

      // hier ga je de laatste lijn van de query opvoorhand klaarmaken omdat die niet elke keer hetzelde gaat zijn
      $orderQuery		=	'ORDER BY ' . $orderColumn . ' ' . $order;



      $query	=	'SELECT bieren.biernr,
          							    bieren.naam,
          							    brouwers.brnaam,
          							    soorten.soort,
          							    bieren.alcohol
  						      FROM bieren
  							    INNER JOIN brouwers
  							    ON bieren.brouwernr	= brouwers.brouwernr
  							    INNER JOIN soorten
  							    ON bieren.soortnr = soorten.soortnr '
  							    . $orderQuery;

      $statement = $db->prepare($query);
      $statement->execute( );


      $bierenOrderArray = array();

      // ophalen van de query inhoud/steken in de bierenOrderArray
      while ( $queryResult = $statement->fetch(PDO::FETCH_ASSOC) )
      {
                $bierenOrderArray[] = $queryResult;
      }


      //KOLOMNAMEN ophalen en in kolomnamenArray zetten

        $kolomnamenArray = array();

      // we gaan 0 gebruiken, kan evengoed [1],2 of 3 gebruiken, die hebben allemaal de kolomnamen
      // $kolomnaam => $kolomInhoud  hier geven we de opmaak mee van de array rij [0] de eerste inhoud/rij
        foreach( $bierenOrderArray[0] as $kolomnaam => $kolomInhoud )
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
        <title> CRUD query - order by</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

      <h1>Overzicht van de bieren</h1>

      <?php if ($message): ?>
             <?= $message ?>
           <?php endif; ?>

           <!--<?php var_dump($bierenOrderArray) ?>-->


      <form action="CRUD-order-by.php" method="POST">

        <table>

            <thead>
                <tr><!-- Een voor 1 uit de $kolomnamenArray, de kolomnaam invullen in de th (hier geen specieke opmaak meegeven wqnt er zit maar 1 ding in de array)-->
                    <?php foreach ($kolomnamenArray as $kolomnaam): ?>
                      <th>
                        <?php echo $kolomnaam ?>
                        <button type="submit" name="asc" value="<?php echo "asc"?>" >
                          <img src="icon-asc.png" alt="icon-asc knop">
                        </button>
                        <button type="submit" name="desc" value="<?php echo "desc"?>" >
                          <img src="icon-desc.png" alt="icon-desc knop">
                        </button>
                      </th>
                    <?php endforeach ?>
                </tr>
            </thead>

            <tbody>

              <!-- weer de opmaak meegeven van de array inhoud [0,1,2,3]-->
              <!-- eerste foreach: 1 volledige rij maken eerst [0], dan [1]],...  -->
              <?php foreach ($bierenOrderArray as $indexNr => $rijInhoudArray): ?>


               <tr>
                 <!-- per for each kunnen we 1 niveau lager gaan in de array -->
                 <!-- terug opmaak geven van de rijInhoudArray en de kolomInhoud nemen en in td steken -->
                 <?php foreach ($rijInhoudArray as $kolomnaam => $kolomInhoud ): ?>
                   <td><?= $kolomInhoud ?></td>
                 <?php endforeach ?>


              </tr>


             <?php endforeach ?>

            </tbody>
      </table>

    </form>


</body>
</html>
