<?php


// standaard op false: user mag nog niet gevalideert zijn: eerst checken
  $userIsValidated = false;

  $userEmailInfoArray = array();


  // als cookie login geset is en dus bestaat
  if ( isset( $_COOKIE['login'] ) ) {

      $userEmailInfoArray = explode( ',', $_COOKIE['login'] );
      $email              =   $userEmailInfoArray[0];
      $gehashedEmail      =   $userEmailInfoArray[1];

      try {
            $db     =  new PDO("mysql:host=localhost;dbname=opdracht-security-login", "root", "root");

            $queryGetSalt     = "SELECT salt FROM users
                                WHERE email = :emailForm";

            $statementGetSalt = $db->prepare( $queryGetSalt );

            $statementGetSalt->bindValue( ':emailForm', $email );

            $SaltHasBeenFound = $statementGetSalt->execute();

            //de salt uit de database halen: array klaarmaken om in te steken
            $arraySaltFound  = array();

            //de salt uit de database halen en in array steken
            while ( $querySaltFound =  $statementGetSalt->fetch(PDO::FETCH_ASSOC))
            {
                $arraySaltFound[] = $querySaltFound;
            }

            foreach ($arraySaltFound[0] as $key => $value) {
                $salt = $value;
              }

            // samengestelde email+hash+salt = gehashedtemail van database
            $databaseUserHash = hash( 'sha512', $email . $salt );

            // als de cookie hetzelfde als als de database waarde
            if ($gehashedEmail == $databaseUserHash {

              // de user is goedgekeurd
              $userIsValidated = true;
            }
            else
            {
                unset( $_COOKIE['login'] );
                header( 'location: login-form.php' );
            }

      }

      catch (PDOException $e) {
        $message = "Verbinding met de database is mislukt, " . $e->getMessage();
      }



  } // einde if
  else {

      $_SESSION['notification'] = "u moet eerst inloggen";
      header( 'location: security-login.php' );
  }



?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>


  <body>


     <?php if ($salt): ?>
       <?= $salt ?>
     <?php endif; ?>


     <?php if ($message): ?>
       <?= $message ?>
     <?php endif; ?>

     <?php if ( $userIsValidated ): ?>
     <h2>Dashboard</h2>

     <a href="dashboard.php?cookie=delete">Uitloggen</a>
     <?php endif; ?>

   </body>
</html>
