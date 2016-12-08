<?php

  class Leeuw extends Animal
  {

    protected $species = " " ;


      public function __construct($namePar, $genderPar, $healthPar, $speciesPar)
      {
        // Deze constructor roept de constructor van de parent (=extended class) aan (parent::) en geeft de nodige argumenten mee
        parent::__construct($namePar, $genderPar, $healthPar);

        // Deze constructor kent de $species parameter toe aan de class member $species
        //de properties vullen met de parameters "wijfje"
        $this->species   = $speciesPar;
      }

      public function getSpecies ()
      {
        return $this->species;
      }


      public function doSpecialMove()
      {
        return "roaaar";
      }



  }

 ?>
