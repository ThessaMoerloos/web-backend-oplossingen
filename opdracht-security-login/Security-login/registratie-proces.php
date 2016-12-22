<?php

	session_start();

	$password = array();
	$passwordString = "";





  if ( isset( $_POST[ 'generatePassword' ] ) )
  {
      $passwordString = GeneratePassword();
      $_SESSION['password'] = $passwordString;

			if ( isset($_POST["email"]) ) {

					 $_SESSION["email"]  =  $_POST["email"];
			 }

      //zodat hij terug gaat naar security-login nadat hij het password gegenereerd heeft
      // anders blijft hij na het maken van het pw op deze pagina.
      header("location: security-login.php" );
  	}

		//als op registreer knop wordt gedrukt
	  if ( isset($_POST["register"]) ) {

	      //SESSION[] password en email wissen
	      session_destroy();

	      //nieuwe session
	      session_start();

				$message = "Registratie knop werkt";

	      if ( isset($_POST["email"]) ) {

	          $email = $_POST["email"];
	          //$password = $_POST["password"];
						$wachtwoord = $_POST['wachtwoord'];

						//session pw

						// als de email ok is
					 if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {

						 //email is valid
						  $_SESSION['notification'] = "";

							try {
                $db     =  new PDO("mysql:host=localhost;dbname=opdracht-security-login", "root", "root");

                $checkEmailQuery   = "SELECT * FROM users
																		 WHERE email = :emailForm";

                $statementCheckEmail = $db->prepare( $checkEmailQuery );

                $statementCheckEmail->bindValue(":emailForm", $email);

                $userMailFound = $statementCheckEmail->execute();

							}
							catch (Exception $e) {
                  //verbinging niet gelukt, foutboodschap + redirect registreerpagina
                  $_SESSION['notification'] = "Er was een probleem met de verbinding met de database.";
                  header( 'location: opdracht-security-login.php' );
              }






					 } // einde validate email

					 else {
					 	$_SESSION['notification'] = "Het email adres is niet juist.";
						header( 'location: security-login.php' ); // terug naar form op security login
					 }



















		 	} // einde if email is in post

	 } // einde isset post register



 function GeneratePassword(){

    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $alphabetLength = strlen($alphabet) - 1; // -1 omdat we met indexen werken

    //pasword heeft een lengte van 10
    for ($i = 0; $i < 10 ; $i++) {
           $eenLetterOfCijfer = rand(0, $alphabetLength);
           $password[] = $alphabet[$eenLetterOfCijfer];
    }

    //var_dump($password);

    $passwordString = implode($password); //turn the array into a string

    return $passwordString;

  }



 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>


				<?php if ( $message ): ?>
				        <?php echo $message ?>
				<?php endif; ?>

	</body>
</html>
