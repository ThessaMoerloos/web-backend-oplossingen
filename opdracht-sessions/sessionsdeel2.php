<?php




 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Deel2: wijzig</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
  </head>
  <body>



 <h1>Deel 2: adres</h1>
 <form>
     <ul>
         <li>

             <label for="straat" >straat</label>
             <input type="text" id="straat" value=value="<?php echo $_SESSION['straat'];?>" class="emphasize" data-tooltip="Dit is automatisch gefocust">
         </li>
         <li>
             <label for="nummer">nummer</label>
             <input type="number" id="nummer" value=value="<?php echo $_SESSION['nummer'];?>">
         </li>
         <li>
             <label for="gemeente">gemeente</label>
             <input type="text" id="gemeente" value=value="<?php echo $_SESSION['gemeente'];?>">
         </li>
         <li>
             <label for="postcode">postcode</label>
             <input type="text" id="postcode" value=value="<?php echo $_SESSION['postcode'];?>">
         </li>
     </ul>
     <input type="submit" value="Volgende">
 </form>

</body>
</html>
