<?php
    // strip_tags($_POST[xxx]) ????


	session_start();

	$isValid	=	false; // standaard zetten dat hij niet juist is, de kortingscode


try
{
  if (isset($_POST["submit"])) {

      // checken of er iets getypt is
      if ( isset($_POST["code"])  )  {

        // checken = code correct (= een lengte van 8 karakters)
        if ( strlen($_POST["code"]) == 8 ) {
            echo "Goedgekeurd";
            $isValid	=	true; // zo kan je form weg laten vallen
        }
        else { // nieuwe exception
          throw new Exception ( 'VALIDATION-CODE-LENGTH' );
        }

      } // einde if code

  } //einde if submit

  else { // nieuwe exception
    throw new Exception( 'SUBMIT-ERROR' );
  }

} // einde try

catch (Exception $e)
{
  // spreekt de exeption class aan en vangt de error code
  $messageCode	=	$e->getMessage();

  $message	=	array(); // $message[xxx]

  $createMessage	=	false; // basis op false zetten




  switch( $messageCode )
  {
    // als de messagecode submit error is:
    case 	'SUBMIT-ERROR':
      $message[ 'type' ]	=	'Error';
      $message[ 'text' ]	=	'Het juiste veld ontbreekt';

      break;
    // als de messagecode VALIDATION-CODE-LENGTH is:
    case	'VALIDATION-CODE-LENGTH':
      $message[ 'type' ]	=	'Error';
      $message[ 'text' ]	=	'De kortingscode heeft een foute lengte';

      $createMessage	=	true;

      break;
  } // einde switch

} //einde catch

//als create message hier boven op true komt te staan: create message() in de session
function createMessage( $message )
{
  $_SESSION['message']	=	$message;
}



function logToFile( $message )
{
  //de datum ophalen
  $date	=	'[' . date( 'H:i:s', time() ).']';

  // het ip adres ophalen
  $ip	=	$_SERVER['REMOTE_ADDR'];

  // maken van errorstring datum + ip + type error [ ] + error bericht
  $errorString	=	$date . ' - ' . $ip . ' - type:[' . $message['type'] . '] ' . $message[ 'text' ] . "\n\r";

  // Write a string to a file
  // schrijf in error.log,  deze error string, en voeg het toe, overschrijf het niet
  file_put_contents( 'error.log', $errorString, FILE_APPEND );
}



function showMessage()
{
  $message	=	FALSE;

  if (isset($_SESSION["message"]) ) {
    # code...

  }

}



 ?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht error handling: try catch</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

        <section class="body">

          <h1>Geef uw kortingscode op</h1>

          <form action="#" method="post">
              <ul>
                  <li>
                      <label for="code">Kortingscode</label>
                      <input type="text" id="code" name="code">
                  </li>
              </ul>

              <input type="submit">
          </form>


        </section>

    </body>
  </html>
