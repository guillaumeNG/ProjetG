<?php

//...crée la classe Developpeur
class Developpeur {

    //...attributs de la classe Developpeur
    private $idDeveloppeur;
    private $nomDeveloppeur;

    //... Constructeur
    function __construct($idDeveloppeur = "", $nomDeveloppeur = "") {
        $this->idDeveloppeur = $idDeveloppeur;
        $this->nomDeveloppeur = $nomDeveloppeur;

    }

    //...GETTERS & SETTERS
    public function getNomDeveloppeur() {
        return $this->nomDeveloppeur;
    }

    public function getIdDeveloppeur() {
        return $this->idDeveloppeur;
    }



    public function setNomDeveloppeur($nomDeveloppeur) {
        $this->nomDeveloppeur = $nomDeveloppeur;
    }

    public function setIdDeveloppeur($idDeveloppeur) {
        $this->idDeveloppeur = $idDeveloppeur;
    }


    //...Classe Developpeur !!!!
}
?> 

