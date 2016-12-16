<?php

  $message = " ";
  $notFoundMessage = " ";

  try {

    // Connectie maken met de 'bieren' DATABASE
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');


    if (isset( $_POST['delete'] ))
    {
      //ophalen van brouwernr uit form met post
      $brouwernr = $_POST['delete'];

      $deleteQuery	=	'DELETE FROM brouwers
    								   WHERE brouwernr = :brouwernr';

      $statement = $db->prepare( $deleteQuery );

      // hierboven wordt :brouwernr aangespreoken om te verwijderen
      // die :brouwernr is wat er in de form wordt doorgestuurd als POST-name:delete=> value
      $statement->bindValue( ':brouwernr', $brouwernr );

      $isVerwijderd	=	$statement->execute();


      if ($isVerwijderd) {
        $message = "De brouwer met nummer: " . $brouwernr . " is succesvol verwijderd.";
      }
      else {
        $message = "Er was een probleem bij het verwijderen van de brouwer. Probeer opnieuw.";
      }

    }

    if ( isset( $_POST['edit'] ) ) {

      // de meegegeven brouwerid bij klikken van edit in $brouwernr steken
        $brouwernr = $_POST['edit'];

        // in de db zoeken naar de brouwer met de brouwerid van $brouwernr
        $findQuery  = 'SELECT * FROM brouwers
                       WHERE brouwernr = :brouwernr';

        $statementFind = $db->prepare( $findQuery );

        // zorgen dat in de findQuery de brouwernr uit de form zit.
        $statementFind->bindValue(":brouwernr", $brouwernr);

        $brouwerFound = $statementFind->execute();


        // als er een resultaat is bij de SELECT - find brouwer query
        if ( $brouwerFound ) {

          //array klaarzetten om de gegevens in op te vangen van de brouwer
          $brouwerFoundArray  = array();

          //zolang er data [0], [1],... is gaat hij die als rijen steken in brouwerFoundArray
          while ( $queryBrouwerFound =  $statementFind->fetch(PDO::FETCH_ASSOC)) {
              $brouwerFoundArray[] = $queryBrouwerFound;
                                    // hier enkel [0] = 1 rij
          }
        }
        else {
          $notFoundMessage = "De brouwerij kon niet worden gevonden.";
        }

    }



    if ( isset($_POST['wijzigen'])) {

      $id       = $_POST['id'];
      $brnaam   = $_POST['brnaam'];
      $adres    = $_POST['adres'];
      $postcode = $_POST['postcode'];
      $gemeente = $_POST['gemeente'];
      $omzet    = $_POST['omzet'];

      try {
        $queryUpdate  = 'UPDATE brouwers
                         SET brnaam = :brnaam, adres = :adres, postcode = :postcode, gemeente = :gemeente, omzet = :omzet
                         WHERE brouwernr = :id';

        $statementUpdate   = $db->prepare($queryUpdate);


        $statementUpdate->bindValue(":id", $id);
        $statementUpdate->bindValue(":brnaam", $brnaam);
        $statementUpdate->bindValue(":adres", $adres);
        $statementUpdate->bindValue(":postcode", $postcode);
        $statementUpdate->bindValue(":gemeente", $gemeente);
        $statementUpdate->bindValue(":omzet", $omzet);


        $brouwerUpdated =   $statementUpdate->execute();

        if ( $brouwerUpdated ) {
          $message      = "Brouwerij succesvol aangepast.";

        }

      }
      catch (PDOException $e) {
        $message = "Er ging iets fout bij het wijzigen.";
      }
}





    $queryString	=	'SELECT * FROM brouwers';

    $statement = $db->prepare( $queryString );

    $statement->execute( );


    $brouwersAsAr = array();


    // hier gaat hij per 1 rij die fetchen/uit de db halen, en zolang er rijen zijn, die in de brouwers steken [0] = 1e rij, [1] = 2e rij
    // binnen zo een [0],[1],.. kan je dan kolomnaam aanspreken daarom ASSOC-array
      while ( $queryResultaat = $statement->fetch(PDO::FETCH_ASSOC) )
      {
        //hier in de bieren associative array zitten alle resultaten/rijen van u query in: [0], [1], [2],.. [124] kolomnamen => gegevens
        $brouwersAsAr[] =	$queryResultaat;
                          // [0],[1],[2],...[124]
      }


      //KOLOMNAMEN ophalen

        $kolomnamenArray = array();

      // eerste kolomnaam is leeg, zit net in de query, das u 1,2,3,4 en die heeft geen kolomnaam in de array, begint pas vanaf biernr
        $kolomnamenArray[]	=	'#';

        // we gaan 0 gebruiken, kan evengoed [1],2 of 3 gebruiken, die hebben allemaal de kolomnamen
        // $kolomnaam => $kolomInhoud  hier geven we de opmaak mee van de array rij [0] de eerste inhoud/rij
        foreach( $brouwersAsAr[0] as $kolomnaam => $kolomInhoud )
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
        <title>CRUD Update</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

        <style>

            .input-icon-button
            {
                border: none;
                background-color:transparent;
                cursor:pointer;
                text-indent:-1000px;
            }

            .delete-button
      			{
      				background-color	:	transparent;
      				border				    :	none;
      				padding				    :	0px;
      				cursor				    :	pointer;
      			}
        </style>

        <section class="body">

            <h1>Opdracht CRUD delete </h1>

          <?php if ( $brouwerFound ): ?>
            <?php var_dump($brouwerFoundArray) ?>
          <?php endif ?>


            <?php if ( $message ): ?>
              <?php echo $message ?>
            <?php endif ?>


            <h3>Brouwer <?= $brouwerFoundArray[0]['brnaam'] ?> ( #<?= $brouwerFoundArray[0]['brouwernr'] ?> ) wijzigen:</h3>

            <form action="CRUD-update.php" method="POST">
                <ul>

                    <li><input type="hidden" name="id" value="<?= $brouwerFoundArray[0]['brouwernr'] ?>"></li>

                    <li>
                        <label for="brnaam">Brouwernaam</label>
                        <input type="text" id="brnaam" name="brnaam" value= "<?= $brouwerFoundArray[0]['brnaam'] ?>" >
                    </li>
                    <li>
                        <label for="adres">adres</label>
                        <input type="text" id="adres" name="adres" value= "<?= $brouwerFoundArray[0]['adres'] ?>">
                    </li>
                    <li>
                        <label for="postcode">postcode</label>
                        <input type="text" id="postcode" name="postcode" value= "<?= $brouwerFoundArray[0]['postcode'] ?>">
                    </li>
                    <li>
                        <label for="gemeente">gemeente</label>
                        <input type="text" id="gemeente" name="gemeente" value= "<?= $brouwerFoundArray[0]['gemeente'] ?>">
                    </li>
                    <li>
                        <label for="omzet">omzet</label>
                        <input type="text" id="omzet" name="omzet" value= "<?= $brouwerFoundArray[0]['omzet'] ?>">
                    </li>
                </ul>
                <input type="submit" value="Wijzigen" name="wijzigen" >
            </form>


          <br>

          <h3>Overzicht van de brouwers</h3>


            <form action="CRUD-update.php" method="POST">

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
                    <?php foreach ($brouwersAsAr as $indexNr => $rijInhoudArray): ?>


                     <tr>
                         <!-- eerste kolom per rij = indexNr + 1 om 1,2,3,4 te krijgen -->
                         <td><?= ($indexNr + 1) ?></td>

                         <!-- per for each kunnen we 1 niveau lager gaan in de array -->
                         <!-- terug opmaak geven van de rijInhoudArray en de kolomInhoud nemen en in td steken -->
                         <?php foreach ($rijInhoudArray as $kolomnaam => $kolomInhoud ): ?>
                           <td><?= $kolomInhoud ?></td>
                         <?php endforeach ?>

                         <td> <!-- nog een kolom toevoegen = DELETE -->
             							<!-- button toevoegen die kan submitten met als value de nummer van de brouwer = brouwernr-->
                          <!-- POST gaat hier uit 'name' = delete de value pakken en die in het verwijder query steken-->
             							<button type="submit" name="delete" value="<?php echo $rijInhoudArray['brouwernr'] ?>" class="delete-button">
             								<img src="icon-delete.png" alt="Verwijder knop">
             							</button>
             						</td>

                        <td> <!-- nog een kolom toevoegen = EDIT -->
                         <!-- button toevoegen die kan submitten met als value de nummer van de brouwer = brouwernr-->
                         <!-- POST gaat hier uit 'name' = edit de value pakken en die in het edit query steken-->
                         <button type="submit" name="edit" value="<?php echo $rijInhoudArray['brouwernr'] ?>" class="edit-button">
                           <img src="icon-edit.png" alt="Bewerken knop">
                         </button>
                        </td>
                     </tr>


                   <?php endforeach ?>

                  </tbody>
              </table>
          </form>

        </section>

    </body>
</html>
