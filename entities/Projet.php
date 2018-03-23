<?php

/*
 * LE DTO DE LA TABLE [Projet] DE LA BD [GestionProjet]
 */

class Projet {

    // ATTRIBUTS
    private $idProjet;
    private $nomProjet;
    private $dateDebut;
    private $description;

    // CONSTRUCTEUR
    function __construct($idProjet = "", $nomProjet = "", $dateDebut = "", $description = "") {
        $this->idProjet = $idProjet;
        $this->nomProjet = $nomProjet;
        $this->dateDebut = $dateDebut;
        $this->description = $description;
    }

    // GETTERS AND SETTERS
    public function setIdProjet($idProjet) {
        $this->idProjet = $idProjet;
    }

    public function setNomProjet($nomProjet) {
        $this->nomProjet = $nomProjet;
    }

    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getIdProjet() {
        return $this->idProjet;
    }

    public function getNomProjet() {
        return $this->nomProjet;
    }

    public function getDateDebut() {
        return $this->dateDebut;
    }

    public function getDescription() {
        return $this->description;
    }

}

// / class Projet
?>
