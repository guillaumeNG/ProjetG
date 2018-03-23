<?php

//...crée la classe Competence
class Competence {

    //...attributs de la classe 
    private $nomCompetence;
    private $idCompetence;

    //... Constructeur
    function __construct($idCompetence = "", $nomCompetence = "") {
        $this->idCompetence = $idCompetence;
        $this->nomCompetence = $nomCompetence;

    }

    //...GETTERS & SETTERS
    public function getNomCompetence() {
        return $this->nomCompetence;
    }

    public function getIdCompetence() {
        return $this->idCompetence;
    }

    public function setNomCompetence($nomCompetence) {
        $this->nomCompetence = $nomCompetence;
    }

    public function setIdCompetence($idCompetence) {
        $this->idCompetence = $idCompetence;
    }



}
?> 

