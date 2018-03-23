<?php

require_once '../entities/Developpeur.php';

//....instatiatiation de la classe DeveloppeurDAO
//class DeveloppeurDAO 



$tintin = new Developpeur();

$tintin->setIdDeveloppeur(25);
$tintin->setNomDeveloppeur("Tintin");
echo "Id : " . $tintin->getIdDeveloppeur() . "<br>";
echo "Nom : " . $tintin->getNomDeveloppeur() . "<br>";
?>
