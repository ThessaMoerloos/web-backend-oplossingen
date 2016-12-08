<?php

function __autoload( $className )
{
    include 'classes/' . $className . '.php';
}

// Maak enkele instanties/object aan van 3 dieren naar keuze.
  $cat = new Animal( "Olijf", "female", 90 );
  $rat = new Animal( "Dikkie", "female", 50 );
  $hond = new Animal( "Snow", "male", 80 );

  $rat->changeHealth(-15);


//deel2: maak instanties van Leeuw
  $Kiara = new Leeuw ("Kiara", "female", 80, "Leeuw");
  $Mufasa = new Leeuw ("Mufasa", "male", 10, "Leeuw");

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dieren</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
  </head>
  <body>

    <h1>Stap 1:</h1>

    <!-- // Print van ieder dier de name, gender en health members door gebruik te maken van de getters -->
    <p> <?php  echo $cat->getName() ?> is een cat met het geslacht: <?php echo $cat->getGender()?> en heeft <?php echo $cat->getHealth()?> health. Special move = <?php echo $cat->doSpecialMove() ?>.</p>
    <p> <?php  echo $rat->getName() ?> is een rat met het geslacht: <?php echo $rat->getGender()?> en heeft <?php echo $rat->getHealth()?> health. Special move = <?php echo $rat->doSpecialMove() ?>.</p>
    <p> <?php  echo $hond->getName() ?> is een hond met het geslacht: <?php echo $hond->getGender()?> en heeft <?php echo $hond->getHealth()?> health. Special move = <?php echo $hond->doSpecialMove() ?>.</p>

    <h1>Stap 2:</h1>
    <p> <?php  echo $Kiara->getName() ?> is een <?php echo $Kiara->getSpecies() ?> met het geslacht: <?php echo $Kiara->getGender()?> en heeft <?php echo $Kiara->getHealth()?> health. Special move = <?php echo $Kiara->doSpecialMove() ?>.</p>
    <p> <?php  echo $Mufasa->getName() ?> is een <?php echo $Mufasa->getSpecies() ?>  met het geslacht: <?php echo $Mufasa->getGender()?> en heeft <?php echo $Mufasa->getHealth()?> health. Special move = <?php echo $Mufasa->doSpecialMove() ?>.</p>

    <h1>Stap 2:</h1>
    <p>Zebra neemt de special move() over van de parent(Animal). Aangezien hij zelf als child geen specifieke special move() heeft.</p>
  </body>
</html>
