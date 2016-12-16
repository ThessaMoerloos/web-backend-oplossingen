<?php

  $message = " ";
  $boodschap = " " ;

  // checken of er al gesubmit is, anders krijg je error voor de lege velden -> insert
  if ( isset( $_POST[ 'submit' ] ) )
  {
    try {

    	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
      // Connectie maken met de 'bieren' DATABASE



      $queryString	=	'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
                       VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet )';


      $statement = $db->prepare( $queryString );

      // hier ga je de ingevulde waarde van de form linken aan de database plaatsen, waar het in moet gezet worden
      // Link: wat je gaat doorgeven aan de query IntlPartsIterator
      // Rechts:wat er in het form staat ingevuld ophalen
      $statement->bindValue( ':brnaam', $_POST[ 'brnaam' ] );
      $statement->bindValue( ':adres', $_POST[ 'adres' ] );
      $statement->bindValue( ':postcode', $_POST[ 'postcode' ] );
      $statement->bindValue( ':gemeente', $_POST[ 'gemeente' ] );
      $statement->bindValue( ':omzet', $_POST[ 'omzet' ] );

      // check: geeft terug of het gelukt is = true/false 0 of 1
      $isUitgevoerd = $statement->execute( );


      //Boodschap => Brouwerij succesvol toegevoegd.
      if ($isUitgevoerd) { // als het 1 is
        $id			   =	$db->lastInsertId();
        $boodschap = "Succesvol toegevoegd! Het nummer van deze brouwerij = " . $id;
      }
      else { // als het 0 is
        $boodschap = "Er was een probleem bij het toevoegen.";
      }


  } // einde try


  catch (Exception $e) {
    //specifieke error message
    $message = "Er is een probleem met de connectie " . $e->getmessage();
  }

  }
  else {
    echo "Vul de velden in.";
  }

 ?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD insert</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

        <section class="body">

            <h1>Opdracht CRUD insert</h1>

                    <h3>Voeg een brouwer toe</h3>

                    <form action="CRUD-insert.php" method="POST">
                        <ul>
                            <li>
                                <label for="brnaam">Brouwernaam</label>
                                <input type="text" id="brnaam" name="brnaam">
                            </li>
                            <li>
                                <label for="adres">adres</label>
                                <input type="text" id="adres" name="adres">
                            </li>
                            <li>
                                <label for="postcode">postcode</label>
                                <input type="text" id="postcode" name="postcode">
                            </li>
                            <li>
                                <label for="gemeente">gemeente</label>
                                <input type="text" id="gemeente" name="gemeente">
                            </li>
                            <li>
                                <label for="omzet">omzet</label>
                                <input type="text" id="omzet" name="omzet">
                            </li>
                        </ul>
                        <input type="submit" value="Voeg toe" name="submit">
                    </form>

                    <?php echo $boodschap?>

                </div>

        </section>
    </body>
</html>
