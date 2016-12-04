<?php

	session_start();

// in de link opdracht-sessions.php?session=destroy
	if ( isset( $_GET['session'] ) )
		{
				if ( $_GET['session']  == 'destroy' )
				{
						session_destroy( );
						header( 'location: opdracht-sessions.php' );
				}
		}
//van input velden id= email en nickname
//$emailInput = $_POST["email"];
//$nicknameInput = $_POST["nickname"];

//moet hier staan anders komt error: undefined
//$emailInput= "";
//$nicknameInput="";

//als er op volgende is geklikt:
if (isset($_POST['submit'])) {

	// de session-variable genaamd $email = de waarde die in de input velden staat
	//$_SESSION['$email'] = $emailInput;
	//$_SESSION['$nickname'] = $nicknameInput;

	$_SESSION['email'] 		= $_POST['emailinput'];
	$_SESSION['nickname'] = $_POST['nicknameinput'];

}
else {
	echo "Voer je gegevens in.";
}

 ?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht sessions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">

        <h1>Opdracht sessions: deel 1</h1>

        <ul>
            <li>
                <h2>Registratiepagina</h2>
                        <div class="facade-minimal" data-url="http://www.app.local/opdracht-sessions-pagina-01-registratie.php">
                            <h1>Deel 1: registratiegegevens</h1>

                            <form action="registratiegegevens.php" method="post">
                                <ul>
                                    <li>
                                        <label for="email">e-mail</label>
                                        <input type="text" name="emailinput" >
                                    </li>
                                    <li>
                                        <label for="nickname">nickname</label>
                                        <input type="text" name="nicknameinput" >
                                    </li>
                                </ul>
                                <input type="submit" name="submit" value="Registreren">
                            </form>

														<a href="opdracht-sessions.php?session=destroy">Verwijder deze Sessie</a>
                        </div>

                    <li>Werk via een POST-methode</li>
                    <li>De action is ingesteld op de adresgegevens pagina</li>
                    <li>Wanneer er op volgende wordt gedrukt moeten de values van de input elementen opgeslagen worden in de session.</li>
            </li>
        </ul>

    </body>
</html>
