<?php

require_once '../lib_php/Connexion.class.php';
require_once '../lib_php/Transaxion.class.php';
require_once '../daos/ProjetDAO.php';
require_once '../entities/Projet.php';

$pdo = Connexion::seConnecter("../conf/bd.ini");

$action = filter_input(INPUT_GET, "action");
if ($action == null) {
    $action = filter_input(INPUT_POST, "action");
}

$lsContenu = "";
$lsMessage = "";
$id = "";
$nom = "";

$idProjet = "";
$nomProjet = "";
$dateDebut = "";
$description = "";


//if ($action == null) {
//    $action = "selectAll";
//}

switch ($action) {
    case "ProjetSelectAll":
        $lsContenu = "";
        //....instanciation de l'objet ProjetDAO
        $projetDAO = new ProjetDAO($pdo);
        $tLines = $projetDAO->selectAll($pdo);
        //....on boucle sur chaque ligne et valorisation 
        foreach ($tLines as $line) {
            $lsContenu .= "<tr>\n";
            $lsContenu .= "<td class='borde'>" . $line->getIdProjet() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getNomProjet() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getDescription() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getDateDebut() . "</td>\n";
            $lsContenu .= "</tr>\n";
        }
        include '../boundaries/ProjetSelectAllIHM.php';
        break;

    case "ProjetInsert":
        include '../boundaries/ProjetInsertIHM.php';
        break;

    case "ProjetInsertValidation":
        /*
         * APPEL AU DAO
         */
        $idProjet = filter_input(INPUT_POST, "idProjet");
        $nomProjet = filter_input(INPUT_POST, "nomProjet");
        $dateDebut = filter_input(INPUT_POST, "dateDebut");
        $description = filter_input(INPUT_POST, "description");

        if ($idProjet != null && $nomProjet != null) {
            Transaxion::initialiser($pdo);
            $projetDAO = new ProjetDAO($pdo);
            $projet = new Projet($idProjet, $nomProjet, $dateDebut, $description);
            $lsMessage = $projetDAO->insert($projet) . " enregistrement ajouté";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/ProjetInsertIHM.php';
        break;


    case "ProjetDelete":
        $ProjetDAO = new ProjetDAO($pdo);
        $tLines = $ProjetDAO->selectAll();

        include '../boundaries/ProjetDeleteIHM.php';
        break;

    case "ProjetDeleteSelection":
        $ProjetDAO = new ProjetDAO($pdo);
        $tLines = $ProjetDAO->selectAll();

        /*
         * SELECT ONE
         */

        $listeProjets = filter_input(INPUT_POST, "listeProjets");

        $idProjet = $listeProjets;

        $projet = $ProjetDAO->selectOne($idProjet);

        $nomProjet = $projet->getNomProjet();

        $dateDebut = $projet->getDateDebut();

        $description = $projet->getDescription();

        //echo "<br>$idProjet";

        include '../boundaries/ProjetDeleteIHM.php';

        break;

    case "ProjetDeleteValidation":
        /*
         * APPEL AU DAO
         */


        $idProjet = filter_input(INPUT_POST, "idProjet");
        $nomProjet = filter_input(INPUT_POST, "nomProjet");
        $dateDebut = filter_input(INPUT_POST, "dateDebut");
        $description = filter_input(INPUT_POST, "description");
        if ($idProjet != null) {
            Transaxion::initialiser($pdo);
            $projetDAO = new ProjetDAO($pdo);
            $projet = new Projet($idProjet, $nomProjet, $dateDebut, $description);
            $lsMessage = $projetDAO->delete($projet) . " enregistrement supprimé";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/ProjetDeleteIHM.php';
        break;

        
    case "ProjetUpdate":
        $ProjetDAO = new ProjetDAO($pdo);
        $tLines = $ProjetDAO->selectAll();
        include '../boundaries/ProjetUpdateIHM.php';
        break;


    case "ProjetUpdateSelection":
 
        $ProjetDAO = new ProjetDAO($pdo);
        $tLines = $ProjetDAO->selectAll();

        /*
         * SELECT ONE
         */

        $listeProjets = filter_input(INPUT_POST, "listeProjets");

        $idProjet = $listeProjets;

        $projet = $ProjetDAO->selectOne($idProjet);

        $nomProjet = $projet->getNomProjet();

        $dateDebut = $projet->getDateDebut();

        $description = $projet->getDescription();

        //echo "<br>$idProjet";

        include '../boundaries/ProjetUpdateIHM.php';

        break;

    



    case "ProjetUpdateValidation":
        $ProjetDAO = new ProjetDAO($pdo);
        $tLines = $ProjetDAO->selectAll();
        /*
         * APPEL AU DAO
         */
        $idProjet = filter_input(INPUT_POST, "idProjet");
        $nomProjet = filter_input(INPUT_POST, "nomProjet");
        $dateDebut = filter_input(INPUT_POST, "dateDebut");
        $description = filter_input(INPUT_POST, "description");

        if ($idProjet != null && $nomProjet != null) {
            Transaxion::initialiser($pdo);
            $projetDAO = new ProjetDAO($pdo);
            $projet = new Projet($idProjet, $nomProjet, $dateDebut, $description);
            $lsMessage = $projetDAO->update($projet) . " enregistrement modifié";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/ProjetUpdateIHM.php';
        break;

   default:
        include '../boundaries/AccueilIHM.php';
       break;
}
?>
