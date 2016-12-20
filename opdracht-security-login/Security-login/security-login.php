<?php

	session_start();

  if ( isset($_SESSION['password']) ) {
    
    $password = $_SESSION['password'];
  }
  else {
    $password = "";
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
    <form action="registratie-proces.php" method="post">
        <ul>
            <li>
                <label for="email">e-mail</label>
                <input type="text" id="email">
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
