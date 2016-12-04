<?php
//uitloggen:   cookie moet geunset worden voor elke echo, print of dump --> dus best bovenaan!
if (isset( $_GET ['logout']) ){

	setcookie( 'authenticated', '', time() - 1000 );
  header('location: opdracht-cookies.php');
}



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


      <div class="facade-minimal" data-url="http://www.app.local/opdracht-cookies-login.php">

          <h1>Dashboard</h1>

          <p>U bent ingelogd.</p>
          <a href="opdracht-cookies.php?logout=true">Uitloggen</a>
      </div>

  </body>
</html>
