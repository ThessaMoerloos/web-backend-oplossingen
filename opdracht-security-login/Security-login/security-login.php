<?php

	session_start();


// als er al een sessie bestaat waar een email in zit
	if ( isset($_SESSION['email']) ) {
		// steek de inhoud van email in het form
		$email = $_SESSION['email'];
	}
	else {
		$email = "";
	}

// als er op de knop genereer paswoord is geduwd en een sessie var paswoord bevat
  if ( isset($_SESSION['password']) ) {

    $password = $_SESSION['password'];
  }
  else {
    $password = " ";
  }

	// als het email adres (niet) geldig is :notificatie
	  if ( isset($_SESSION['notification']) ) {

	    $notification = $_SESSION['notification'];
	  }
	  else {
	    $notification = " ";
	  }


 ?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Security-login</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>


  <body>


    <h1>Registreren</h1>

		<?php if ( $notification ): ?>
		      <?php echo $notification ?>
		<?php endif; ?>


    <form action="registratie-proces.php" method="POST">
        <ul>
            <li>
                <label for="email">E-mail</label>
                <input type="text" name="email" value="<?php echo $email ?>">
            </li>
            <li>
                <label for="password">Paswoord</label>
                <input type="text"  name="wachtwoord" value="<?php echo $password ?>">
                <input type="submit" name="generatePassword" value="Genereer Paswoord">
            </li>
        </ul>

        <input type="submit" name="register" value="Registreer">

    </form>



  </body>
</html>
