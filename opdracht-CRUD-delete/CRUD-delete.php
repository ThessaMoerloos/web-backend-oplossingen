<?php

  $message = " ";

  try {

    // Connectie maken met de 'bieren' DATABASE
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');


  /*  if (isset($_POST['confirm'] )) {
      $deleteConfirm	=	true;
    }
    */


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
        <title>Opdracht CRUD delete</title>
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

            .delete
            {
                width:16px;
                height:16px;
                background: url("http://web-backend.local/img/icon-delete.png") no-repeat;
            }
        </style>

        <section class="body">

            <h1>Opdracht CRUD delete </h1>

          <!-- <?php var_dump($brouwersAsAr) ?> -->

            <h3>Overzicht van de brouwers</h3>

            <?php if ( $message ): ?>
              <?php echo $message ?>
            <?php endif ?>

<!--
            <?php if ( $deleteConfirm ): ?>
          		<div>
          			Bent u zeker dat u deze datarij wil verwijderen?
          			<form action="CRUD-delete.php" method="POST">

          				<button type="submit" name="confirm" value=" <?php echo $deleteId ?> "> Ja </button>

          				<button type="submit"> Nee </button>

          			</form>
          		</div>
          	<?php endif ?>
  -->

            <form action="CRUD-delete.php" method="POST">

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

                         <td> <!-- nog een kolom toevoegen -->
             							<!-- button toevoegen die kan submitten met als value de nummer van de brouwer = brouwernr-->
                          <!-- POST gaat hier uit 'name' = delete de value pakken en die in het verwijder query steken-->
             							<button type="submit" name="delete" value="<?php echo $rijInhoudArray['brouwernr'] ?>" class="delete-button">
             								<img src="icon-delete.png" alt="Verwijder knop">
             							</button>
             						</td>

                     </tr>


                   <?php endforeach ?>

                  </tbody>
              </table>
          </form>

                                        <table>

                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>brouwernr</th>
                                                    <th>brnaam</th>
                                                    <th>adres</th>
                                                    <th>postcode</th>
                                                    <th>gemeente</th>
                                                    <th>omzet</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>Achouffe</td>
                                                    <td>Route du Village 32</td>
                                                    <td>6666</td>
                                                    <td>Achouffe-Wibrin</td>
                                                    <td>10000</td>
                                                    <td><input type="submit" class="input-icon-button delete"></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>2</td>
                                                    <td>Alken</td>
                                                    <td>Stationstraat 2</td>
                                                    <td>3570</td>
                                                    <td>Alken</td>
                                                    <td>950000</td>
                                                    <td><input type="submit" class="input-icon-button delete"></td>
                                                </tr>
                                                <tr >
                                                   <td>3</td>
                                                    <td>3</td>
                                                    <td>Ambly</td>
                                                    <td>Rue Principale 45</td>
                                                    <td>6953</td>
                                                    <td>Ambly-Nassogne</td>
                                                    <td>500</td>
                                                    <td><input type="submit" class="input-icon-button delete"></td>
                                                </tr>
                                                <tr >
                                                    <td>4</td>
                                                    <td>4</td>
                                                    <td>Anker</td>
                                                    <td>Guido Gezellelaan 49</td>
                                                    <td>2800</td>
                                                    <td>Mechelen</td>
                                                    <td>3000</td>
                                                    <td><input type="submit" class="input-icon-button delete"></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                <li>Wanneer er op de verwijderknop wordt gedrukt, moet de datarij verwijderd worden.
                                    <ul>
                                        <li>Dus, een nieuwe query, ditmaal met een delete.</li>

                                        <li>Wanneer de query succesvol is uitgvoerd, moet er een boodschap getoond worden: 'De datarij werd goed verwijderd.'</li>

                                        <li>Wanneer dit niet lukt moet de volgende boodschap getoond worden: 'De datarij kon niet verwijderd worden. Probeer opnieuw.'</li>

                                        <li><span class="remark">Lukt het niet om iets te submitten? Zoja ben je misschien iets vergeten op HTML-niveau (<code>&lt;form&gt;</code>?)</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

            <h1>Opdracht CRUD delete: deel 2</h1>

            <ul>
                <li>Zorg voor een modal confirmation message alvorens de delete wordt uitgevoerd</li>

                <li>Wanneer iemand op delete drukt, moet er bovenaan eerst een bevestiging komen:

                    <div class="facade-minimal voorbeeld-query-01" data-url="http://www.app.local/index.php">

                        <h1>Overzicht van de bieren</h1>

                        <div class="modal error">
                            Bent u zeker dat u deze datarij wil verwijderen?
                            <form>
                                <input type="submit" value="Ja!">
                                <input type="submit" value="Néééééé!">
                            </form>
                        </div>

                        <table>

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>brouwernr</th>
                                    <th>brnaam</th>
                                    <th>adres</th>
                                    <th>postcode</th>
                                    <th>gemeente</th>
                                    <th>omzet</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="odd">
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Achouffe</td>
                                    <td>Route du Village 32</td>
                                    <td>6666</td>
                                    <td>Achouffe-Wibrin</td>
                                    <td>10000</td>
                                    <td><input type="submit" class="input-icon-button delete"></td>
                                </tr>
                                <tr class="deletion">
                                    <td>2</td>
                                    <td>2</td>
                                    <td>Alken</td>
                                    <td>Stationstraat 2</td>
                                    <td>3570</td>
                                    <td>Alken</td>
                                    <td>950000</td>
                                    <td><input type="submit" class="input-icon-button delete"></td>
                                </tr>
                                <tr class="odd">
                                    <td>3</td>
                                    <td>3</td>
                                    <td>Ambly</td>
                                    <td>Rue Principale 45</td>
                                    <td>6953</td>
                                    <td>Ambly-Nassogne</td>
                                    <td>500</td>
                                    <td><input type="submit" class="input-icon-button delete"></td>
                                </tr>
                                <tr class="">
                                    <td>4</td>
                                    <td>4</td>
                                    <td>Anker</td>
                                    <td>Guido Gezellelaan 49</td>
                                    <td>2800</td>
                                    <td>Mechelen</td>
                                    <td>3000</td>
                                    <td><input type="submit" class="input-icon-button delete"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </li>

                <li>Pas wanneer de gebruiker bevestigt dat hij de rij wil verwijderen, mag de datarij voorgoed verwijderd worden.</li>

                <li>Wanneer de gebruiker op ongedaan maken klikt, verdwijnt de boodschap.</li>

                <li><span class="remark">Normaal gebeurt deze confirmatie enkel via JavaScript, maar dit kan perfect via PHP.</span></li>

                <li><span class="extension">zorg ervoor dat wanneer een gebruiker een rij wil verwijderen, deze rij rood wordt opgelicht.</span></li>
            </ul>

        </section>

    </body>
</html>
