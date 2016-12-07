<?php

/**
 *
 */
class Percent
{

    public $absolute ;
    public $relative;
    public $hundred;
    public $nominal = " ";


    public function __construct($new, $unit)
    {
      $absolute = formatNumber($new / $unit);

      $absolute = formatNumber($absolute – 1);

      $hundred  = formatNumber($absolute * 100);

      if ($absolute > 1) {
          $nominal = "positive";
      }

      if ($absolute == 1) {
          $nominal = "status-quo";
      }

      if ($absolute < 1) {
          $nominal = "negative";
      }

    return $nominal ;

    }


    public function formatNumber ($number)
    {
    $shortNumber = number_format($number, 2);
    return $shortNumber;

    }

}














?>
