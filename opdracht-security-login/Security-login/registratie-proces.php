<?php

	session_start();

	$password = array();
	$passwordString = "";
	$message="";
	$email="standaard";




	// paswoord maken en doorsturen naar securoity login
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

				//$message = "Registratie knop werkt";

	      if ( isset($_POST["email"]) ) {

	          $email = $_POST["email"];
	          //$password = $_POST["password"];
						$wachtwoord = $_POST['wachtwoord'];

						//session pw

						// als de email ok is
					 if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {

						 //email is valid
						  $_SESSION['notification'] = "";

							// selecteren van email
							try {
                $db     =  new PDO("mysql:host=localhost;dbname=opdracht-security-login", "root", "root");

                $checkEmailQuery   = "SELECT * FROM users
																		 WHERE email = :emailForm";

                $statementCheckEmail = $db->prepare( $checkEmailQuery );


								// Links: wat je gaat doorgeven aan de query $checkEmailQuery
								// Rechts:wat er in het form staat ingevuld ophalen
                $statementCheckEmail->bindValue(":emailForm", $email);

                $userMailFound = $statementCheckEmail->execute();

								//CHECKEN of de user zijn email al in de database zit met $userMailFound
								// is de query leeg = user mail nog niet aanwezig = mag aangemaakt worden;
								// zit er wel iets in: gaat hij hier true geven: en volgende code uitvoeren
								if ($userMailFound) {

									$userMailFoundArray = array();

									while ( $userMailFound = $statementCheckEmail->fetch(PDO::FETCH_ASSOC) )
								  {
								    $userMailFoundArray[] =	$userMailFound;
								  }

									// is de QUERY LEEG = user mail nog niet aanwezig = mag aangemaakt worden in db;
									//$var is either 0, empty, or not set at all; niet hetzelfde als isset want isset gaat 0 wel zien als iets
									if ( empty($userMailFoundArray) ) {


										// aanmaken van email in db
										try {


											//$message 				= "geraken in try." . $email;
											$salt         	=  uniqid(mt_rand(), true);
                      $wachtwoordSalt =  $wachtwoord . $salt;
                      $hashedWwSalted =  hash( 'sha512', $wachtwoordSalt );
                      $lastloginTime	=  "NOW()";



											$db2 =  new PDO("mysql:host=localhost;dbname=opdracht-security-login", "root", "root");
											// Connectie maken met de DATABASE

											$insertEmailQuery	=	"INSERT INTO users ( email, hashed_password, last_login_time, salt )
																			 		 VALUES ( :emailForm, :hashed_password, :last_login_time, :salt   )";

											$insertEmailStatement = $db2->prepare( $insertEmailQuery );

											// hier ga je de ingevulde waarde van de form linken aan de database plaatsen, waar het in moet gezet worden
											// Links: wat je gaat doorgeven aan/in de query $insertEmailQuery =
											// Rechts:wat er in het form staat ingevuld ophalen
											$insertEmailStatement->bindValue( ':emailForm', $email );
											$insertEmailStatement->bindValue( ':hashed_password', $hashedWwSalted );
											$insertEmailStatement->bindValue( ':last_login_time', $lastloginTime );
											$insertEmailStatement->bindValue( ':salt', $salt );

											// check: geeft terug of het gelukt is = true/false 0 of 1
											$emailIsGeinsert = $insertEmailStatement->execute();


											if ($emailIsGeinsert) {

													$message = "Email ingevoegd: " . $email . "      hashedWwSalted:   " . $hashedWwSalted . "    salt: " . $salt . "     wachtwoord : " . $wachtwoord;

													// Als value krijgt dit het e-mailadres geconcateneerd met een ',' en gevolgd door de SHA512 hash van het e-mailadres geconcateneerd met de salt
													// we hangen de waardes aan elkaar dmv een , 
													$valueCookie  =  $email . ',' . hash( 'sha512', $email . $randomSalt );
													setcookie( 'login', $valueCookie, time() + 360 );

													// als de email in toegevoegd aan de database en dus geregistreerd is => dashboard
													header( 'location: dashboard.php' );

											}

											else {

												$message = "Insert is niet gelukt, false";

											}


										} // einde try na is empty = aanmaken email in DB


										catch (Exception $e)
										{
											//specifieke error message
											$message = "Er is een probleem met de connectie " . $e->getmessage();
										}

									} // einde if user mail is empty

									// als er wel iets zit in de user email: bestaat de email al
									else {
										$message = "Het email adres bestaat al ";
									}

							} //einde if user mail found

						} // einde try ophalen van email in db

						catch (Exception $e)
						{
	              //verbinging niet gelukt, foutboodschap + redirect registreerpagina
	              $_SESSION['notification'] = "Er was een probleem met de verbinding met de database.";
	              header( 'location: opdracht-security-login.php' );
            }





					} //einde if validate mail

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



	 if ( $message )
	 {
					echo $message;

	}

 ?>
