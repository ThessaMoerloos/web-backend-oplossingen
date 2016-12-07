<?php



  function __autoload( $className )
  {
      include 'classes/' . $className . '.php';
  }


  $percentObject = new Percent( 150 , 100);





 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Opdracht classes: begin</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
  </head>
  <body>

    <div class="facade-minimal table-result" data-url="http://www.app.local/application.php">
        <style>
            .table-result table
            {
                border:1px solid lightgrey;
                border-collapse:collapse;
                max-width:350px;
            }

            .table-result td
            {
                border:1px solid lightgrey;
                padding:12px;
            }
        </style>
        <table>
            <caption>Hoeveel procent is 150 van 100?</caption>
            <thead></thead>
            <tfoot></tfoot>
            <tbody>
                <tr>
                    <td>Absoluut</td>
                    <td>1.50</td>
                    <td>waarde van absoluut</td>
                </tr>
                <tr>
                    <td>Relatief</td>
                    <td>0.50</td>
                    <td>waarde van Relatief</td>
                </tr>
                <tr>
                    <td>Geheel getal</td>
                    <td>50%</td>
                    <td>waarde van %</td>
                </tr>
                <tr>
                    <td>Nominaal</td>
                    <td>positive</td>
                    <td>waarde van Nominaal</td>
                </tr>
            </tbody>
        </table>

    </div>





  </body>
</html>
