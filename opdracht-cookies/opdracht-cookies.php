<?php

//uitloggen:   cookie moet geunset worden voor elke echo, print of dump --> dus best bovenaan!
if (isset( $_GET ['logout']) ){

  //unset( $_COOKIE['authenticated'] );
  setcookie( 'authenticated', '', time() - 1000 );
  header('location: opdracht-cookies.php');
}



              //systeem functie van php
$bestandInfo	=	file_get_contents( 'cookieUser.txt' );
              // gaat alles in de file splitsen na een , en in user data zetten als array
$userInfo		=	explode( ',', $bestandInfo ); // $userInfo[0] = jan , [1] = paswoord


$bericht =" ";
$inlogBericht = "Gelieve je in te loggen:";



  //als er geklikt is op submit = vergelijken of het overeenkomt met jan en zijn paswoord01
  if ( isset( $_POST['submit'] ) ){
    //    wat er hieronder in html is getyped== $userInfo[0] = jan  && zelfde vergelijken met passwoord
    if ( $_POST['username'] == $userInfo[0] && $_POST['password'] == $userInfo[1] )
    {
      // cookie aanmaken 'authenticated'
      setcookie( 'authenticated', true, time()+ 3600 );
      header( 'location: opdracht-cookies-login.php' );
      $bericht = 'Succesvol ingelogd!';
    }
    else
    { $bericht = 'Oei dat klopt niet, probeer nog eens.'; }
  }



if (isset( $_COOKIE['authenticated']) ){
  $inlogBericht = "Je bent ingelogd";

}





var_dump($userInfo);


 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht cookies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">

    <section class="body">
        <h1>Opdracht cookies: deel 1</h1>

        <ul>
                <div class="facade-minimal" data-url="http://www.app.local/opdracht-cookies-login.php">

                    <h1>Inloggen</h1>

                    <p><?php echo $inlogBericht ?></p>
                    <p><?php echo $bericht ?></p>

                    <form  method="post">
                        <ul>
                            <li>
                                <label for="gebruikersnaam">gebruikersnaam</label>
                                <input type="text" id="gebruikersnaam" name="username">
                            </li>
                            <li>
                                <label for="paswoord">paswoord</label>
                                <input type="text" id="paswoord" name="password">
                            </li>
                        </ul>
                        <input type="submit" name="submit" value="Log in">
                    </form>

                    <a href="opdracht-cookies.php?logout=true">Uitloggen</a>
                </div>


            <li>Maak een .txt-bestand aan met als inhoud: jan,paswoord01 <span class="tip">Vermijd spaties en/of line breaks op het einde van deze string</span></li>

            <li>Zorg ervoor dat dit .txt-bestand wordt ingeladen via PHP</li>

            <li>Zet de inhoud van het .txt-bestand in een array. Gebruik hiervoor de functie <code>explode()</code> op basis van de komma of maak gebruik van een JSON-notatie in combinatie met <code>json_decode()</code></li>

            <li>
                Zorg er nu voor dat wanneer er op verzenden wordt gedrukt er gecontroleerd wordt of de gebruikersnaam EN het paswoord gelijk zijn aan die in het .txt-bestand

                <p>Dit betekent dat als je de gegevens in het text-bestand wijzigt, je dus met deze gewijzigde gegevens moet inloggen</p>
            </li>

            <li>Wanneer paswoord en/of gebruikersnaam niet gelijk zijn, moet de volgende boodschap verschijnen:

                 <div class="facade-minimal" data-url="http://www.app.local/opdracht-cookies-login.php">

                    <h1>Inloggen</h1>

                    <div class="modal error">
                        Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.
                    </div>

                    <form>
                        <ul>
                            <li>
                                <label for="gebruikersnaam">gebruikersnaam</label>
                                <input type="text" id="gebruikersnaam" name="username">
                            </li>
                            <li>
                                <label for="paswoord">paswoord</label>
                                <input type="text" id="paswoord" name="password">
                            </li>
                        </ul>
                        <input type="submit" name="submit">
                    </form>
                </div>
            </li>

            <li>Wanneer deze wél gelijk zijn, moet een cookie geset worden met een expiration date van 6 minuten.</li>

            <li>Als de cookie geset is en de gebruiker dus correct ingelogd is, moet de volgende pagina getoond worden:

                <div class="facade-minimal" data-url="http://www.app.local/opdracht-cookies-login.php">

                    <h1>Dashboard</h1>

                    <p>U bent ingelogd.</p>
                    <p><a href="#">Uitloggen</a></p>
                </div>

            </li>

            <li>Wanneer er op "uitloggen" wordt geklikt moet de cookie verwijderd worden. <span class="tip">Maak gebruik van een get-variabele</span></li>
            <li>Wanneer de browser binnen de 6 minuten gesloten en weer geopend wordt moet het dashboard nog steeds zichtbaar zijn.</li>
        </ul>


    </section>
  </body>
</html>
