
<?php

  $password     = "123";
  $username     = "an";
  $Vergelijking = "";

  // checken of form gesubmit is
  if (isset($_POST["submit"])) {

    //check of $username == $_POST["username"]
      if ($username == $_POST["username"] && $password == $_POST["password"] ) {
          $Vergelijking = "Welkom!";
      }
      else {
        $Vergelijking = "Er ging iets mis bij het inloggen, probeer opnieuw.";
      }

  }


 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht post</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>

    <body>

        <h1>Oefening POST</h1>

        <form action="opdracht-post.php" method="post">

    			<ul>

    				<li>
    					<label for="username">Name:</label>
    					<input type="text" name="username" id="username">
    				</li>


    				<li>
    					<label for="password">Paswoord:</label>
    					<input type="password" name="password" id="password">
    				</li>

    			</ul>

    			<input type="submit" value="Verzenden" name = "submit">

    		</form>


        <p>Inhoud van $_POST: <pre><?php print_r( $_POST ) ?></pre></p>
    		<?php echo $Vergelijking ?>


    </body>
</html>
