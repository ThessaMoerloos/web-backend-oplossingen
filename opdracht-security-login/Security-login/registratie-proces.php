<?php

	session_start();

$password = array();
$passwordString = "";



  if ( isset( $_POST[ 'generatePassword' ] ) )
  {
      $passwordString = GeneratePassword();
      $_SESSION['password'] = $passwordString;

      //zodat hij terug gaat naar security-login nadat hij het password gegenereerd heeft
      // anders blijft hij na het maken vn het pw op deze pagina.
      header("location: security-login.php" );
  }



 function GeneratePassword(){

    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $alphabetLength = strlen($alphabet) - 1; // -1 omdat we met indexen werken

    //pasword heeft een lengte van 10
    for ($i = 0; $i < 10 ; $i++) {
           $eenLetterOfCijfer = rand(0, $alphabetLength);
           $password[] = $alphabet[$eenLetterOfCijfer];
    }

    //var_dump($password);

    $passwordString = implode($password);

    return $passwordString; //turn the array into a string

  }



 ?>
