<?php
require_once '../daos/CompetenceDAO.php';
require_once '../lib_php/Connexion.class.php';
require_once '../lib_php/Transaxion.class.php';
require_once '../entities/Competence.php';


$pdo = Connexion::seConnecter("../conf/bd.ini");

$action = filter_input(INPUT_GET, "action");
if ($action == null) {
    $action = filter_input(INPUT_POST, "action");
}
$CompetenceDAO = "";
$lsContenu = "";
$lsMessage = "";
$idCompetence;
$nomCompetence;
$lsNon = "";



switch ($action) {
;
    //...cas de l'insert
    case "CompetenceInsert":
        include '../boundaries/CompetenceInsertIHM.php';
        break;

    //...cas de l'InsertValidation en hidden
    case "CompetenceInsertValidation":
        /*
         * APPEL AU DAO
         */
        $idCompetence = filter_input(INPUT_POST, "idCompetence");
        $nomCompetence= filter_input(INPUT_POST, "nomCompetence");

        if (idCompetence != null && nomCompetence != null) {
            Transaxion::initialiser($pdo);
            $CompetenceDAO = new CompetenceDAO($pdo);
            $Competence = new Competence($idCompetence, $nomCompetence);
            $lsMessage = $CompetenceDAO->insert($Competence) . " enregistrement ajouté";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/CompetenceInsertIHM.php';
        break;

    //...cas du selectAll
    case "CompetenceSelectAll":
        $lsContenu = "";
        //....instanciation de l'objet
        $CompetenceDAO = new CompetenceDAO($pdo);
        $tLines = $CompetenceDAO->selectAll();

        //....on boucle sur chaque ligne et valorisation 
        foreach ($tLines as $line) {
            $lsContenu .= "<tr>\n";
            $lsContenu .= "<td class='borde'>" . $line->getIdCompetence() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getNomCompetence() . "</td>\n";

            $lsContenu .= "</tr>\n";
        }
        include '../boundaries/CompetenceSelectAllIHM.php';
        break;

    //...cas du Delete
    case "CompetenceDelete":
        include '../boundaries/CompetenceDeleteIHM.php';
        break;

    //...cas du deleteValidation en hidden
    case "CompetenceDeleteValidation":
        /*
         * APPEL AU DAO
         */
        $idCompetence = filter_input(INPUT_POST, "idCompetence");
        $nomCompetence= filter_input(INPUT_POST, "nomCompetence");

        if ($idCompetence != null) {
            Transaxion::initialiser($pdo);
            $CompetenceDAO = new CompetenceDAO($pdo);
            $Competence = new Competence($idCompetence, $nomCompetence);
            $lsMessage = $CompetenceDAO->delete($Competence) . " enregistrement supprimé";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/CompetenceDeleteIHM.php';
        break;

    case "CompetenceUpdate":

        $CompetenceDAO= new CompetenceDAO($pdo);
        $tLines = $CompetenceDAO->selectAll();

        include '../boundaries/CompetenceUpdateIHM.php';
        break;

    case "CompetenceUpdateSelection":
        
        $CompetenceDAO = new CompetenceDAO($pdo);
        
        $tLines = $CompetenceDAO->selectAll();

                
        
        //... on stocke la valeur de l'option selectionnée dans une variable $id
        $id = filter_input(INPUT_POST, "listeCompetence");
   
        $dev = $CompetenceDAO->selectOne($id);
        
       
        $lsNon = $dev->getNomCompetence();
        


        include '../boundaries/CompetenceUpdateIHM.php';
        break;

    //...cas du UpdateValidation en hidden
    case "CompetenceUpdateValidation":
        /*
         * APPEL AU DAO
         */
        // affiche la liste déroulante de façon permanente 
        $CompetenceDAO = new CompetenceDAO($pdo);
        $tLines = $CompetenceDAO->selectAll();


        $idCompetence = filter_input(INPUT_POST, "idCompetence");
        $nomCompetence = filter_input(INPUT_POST, "nomCompetence");


        if ($idCompetence != null && $nomCompetence != null) {
            Transaxion::initialiser($pdo);
            $CompetenceDAO = new CompetenceDAO($pdo);
            $Competence = new Competence($idCompetence, $nomCompetence);
            $lsMessage = $CompetenceDAO->update($Competence) . " enregistrement modifié";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/CompetenceUpdateIHM.php';
        break;

    default:
        include '../boundaries/AccueilIHM.php';
        break;
}
?>    














