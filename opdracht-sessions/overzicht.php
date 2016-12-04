<?php
session_start();


echo "post:";
var_dump( $_POST );

echo "en dump session:";
var_dump( $_SESSION );


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>overzicht</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
  </head>
  <body>


<h2>Overzichtspagina</h2>

<ul>
    <li>Deze pagina bevat alle gegevens die in de voorgaande pagina's ingevuld zijn. Deze ziet er als volgt uit:

        <div class="facade-minimal" data-url="http://www.app.local/opdracht-sessions-pagina-03-overzicht.php">

            <h1>Overzichtspagina</h1>
            <ul>
                <li>e-mail:    <?php echo ($_SESSION['email']) ;?> | <a href="sessionsdeel2.php">wijzig</a></li>
                <li>nickname:  <?php echo ($_SESSION['nickname']); ?> | <a href="sessionsdeel2.php">wijzig</a></li>
                <li>straat:    <?php echo ($_SESSION['straat']); ?> | <a href="sessionsdeel2.php">wijzig</a></li>
                <li>nummer:    <?php echo ($_SESSION['nummer']); ?>| <a href="sessionsdeel2.php">wijzig</a></li>
                <li>gemeente:  <?php echo ($_SESSION['gemeente']); ?> | <a href="sessionsdeel2.php">wijzig</a></li>
                <li>postcode:  <?php echo ($_SESSION['postcode']); ?> | <a href="sessionsdeel2.php">wijzig</a></li>
            </ul>
        </div>

    </li>
    <li>Voorzie een link "wijzig" bij elk gegeven. Wanneer er op deze link wordt geklikt, ga je naar de pagina waar het invulveld voor dit stukje informatie zich bevindt.</li>

    <li>Het te wijzigen veld wordt automatisch gefocust:

         <div class="facade-minimal" data-url="http://www.app.local/opdracht-sessions-pagina-02-adres.php">

            <h1>Registratiegegevens</h1>

            <ul>
                <li>e-mail: <?php echo ($_SESSION['email']) ?>  </li>
                <li>nickname: <?php echo ($_SESSION['nickname']) ?> </li>
            </ul>

            <h1>Deel 2: adres</h1>
            <form>
                <ul>
                    <li>
                        <label for="straat" >straat</label>
                        <input type="text" id="straat" value="Great America Parkway" class="emphasize" data-tooltip="Dit is automatisch gefocust">
                    </li>
                    <li>
                        <label for="nummer">nummer</label>
                        <input type="number" id="nummer" value="4401">
                    </li>
                    <li>
                        <label for="gemeente">gemeente</label>
                        <input type="text" id="gemeente" value="Palo Alto">
                    </li>
                    <li>
                        <label for="postcode">postcode</label>
                        <input type="text" id="postcode" value="CA 95054">
                    </li>
                </ul>
                <input type="submit" value="Volgende">
            </form>
        </div>

    </li>

  </body>
</html>
