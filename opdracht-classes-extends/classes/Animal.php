<?php

class Animal
{

//properties= variabele in een klasse
  protected $name   = " ";
  protected $gender = " ";
  protected $health = 0  ;


// $name = een parameter, geen property
  public function __construct($namePar, $genderPar, $healthPar)
  {
    // Deze constructor kent de parameter-waarden toe aan de class members

    //de properties vullen met de parameters "wijfje"
    $this->name   = $namePar;
    $this->gender = $genderPar;
    $this->health = $healthPar;
    //LET OP: zet na de $this->  geen $ meer !!!
  }

//getters
  public function getName (){

    /// Returnt de class member $name bv "wijfje"
    return $this->name;
    //$this-> wordt gebruikt zodat de functie weet dat het over een (altijd)globale property/var is, en geen lokale var
  }

  public function getGender (){
    // Returnt de class member $gender
    return $this->gender;
  }

  public function getHealth (){

    // Returnt de class member $health
    return $this->health;

  }



  //De waarde van $healthPoints kan zowel positief als negatief zijn.
                          // bv +5 er bij of bv -15 er af
  public function changeHealth ($healthPoints ) {

    // Telt de parameter-waarde op bij de class member $health
    //bv rat= 50  -->    50 + - 15  = 35
    $this->health = $this->health + $healthPoints;

    return $this->health;
    // LET OP: als je iets returned MOET het u golobale property zijn! geen variabele van in een lokale functie.
  }


  public function doSpecialMove (){

    // Returnt de string 'walk'
    return "walk";
  }



}
