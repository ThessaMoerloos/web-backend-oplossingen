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
    <form action="registratie-proces.php" method="POST">
        <ul>
            <li>
                <label for="email">e-mail</label>
                <input type="text" name="email" value="<?php echo $email ?>">
            </li>
            <li>
                <label for="password">paswoord</label>
                <input type="text" value="<?php echo $password ?>">
                <input type="submit" name="generatePassword" value="generatePassword">
            </li>
        </ul>

        <input type="submit" value="Registreer">

    </form>



  </body>
</html>
