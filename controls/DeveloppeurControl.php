<?php

require_once '../lib_php/Connexion.class.php';
require_once '../lib_php/Transaxion.class.php';
require_once '../daos/DeveloppeurDAO.php';
require_once '../entities/Developpeur.php';



//require_once '../';

$pdo = Connexion::seConnecter("../conf/bd.ini");


$action = filter_input(INPUT_GET, "action");
if ($action == null) {
    $action = filter_input(INPUT_POST, "action");
}

$DeveloppeurDAO = "";
$lsContenu = "";
$lsMessage = "";
$idDeveloppeur = "";
$nomDeveloppeur = "";
$id = "";
$lsNon = "";

//if ($action == null) {
//    $action = "selectAll";
//}
switch ($action) {

    //...cas de l'insert
    case "DeveloppeurInsert":
        include '../boundaries/DeveloppeurInsertIHM.php';
        break;

    //...cas de l'InsertValidation en hidden
    case "DeveloppeurInsertValidation":
        /*
         * APPEL AU DAO
         */
        $idDeveloppeur = filter_input(INPUT_POST, "idDeveloppeur");
        $nomDeveloppeur = filter_input(INPUT_POST, "nomDeveloppeur");

        if ($idDeveloppeur != null && $nomDeveloppeur != null) {
            Transaxion::initialiser($pdo);
            $DeveloppeurDAO = new DeveloppeurDAO($pdo);
            $Developpeur = new Developpeur($idDeveloppeur, $nomDeveloppeur);
            $lsMessage = $DeveloppeurDAO->insert($Developpeur) . " enregistrement ajouté";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/DeveloppeurInsertIHM.php';
        break;

    //...cas du selectAll
    case "DeveloppeurSelectAll":
        $lsContenu = "";
        //....instanciation de l'objet ProjetDAO
        $DeveloppeurDAO = new DeveloppeurDAO($pdo);
        $tLines = $DeveloppeurDAO->selectAll();
//        echo "<br><pre>";
//        var_dump($tLines);
//        echo "</pre><br>";
//        exit;
        //....on boucle sur chaque ligne et valorisation 
        foreach ($tLines as $line) {
            $lsContenu .= "<tr>\n";
            $lsContenu .= "<td class='borde'>" . $line->getIdDeveloppeur() . "</td>\n";
            $lsContenu .= "<td class='borde'>" . $line->getNomDeveloppeur() . "</td>\n";

            $lsContenu .= "</tr>\n";
        }
        include '../boundaries/DeveloppeurSelectAllIHM.php';
        break;

    //...cas du Delete
    case "DeveloppeurDelete":
        include '../boundaries/DeveloppeurDeleteIHM.php';
        break;

    //...cas du deleteValidation en hidden
    case "DeveloppeurDeleteValidation":
        /*
         * APPEL AU DAO
         */
        $idDeveloppeur = filter_input(INPUT_POST, "idDeveloppeur");
        $nomDeveloppeur = filter_input(INPUT_POST, "nomDeveloppeur");

        if ($idDeveloppeur != null) {
            Transaxion::initialiser($pdo);
            $DeveloppeurDAO = new DeveloppeurDAO($pdo);
            $Developpeur = new Developpeur($idDeveloppeur, $nomDeveloppeur);
            $lsMessage = $DeveloppeurDAO->delete($Developpeur) . " enregistrement supprimé";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/DeveloppeurDeleteIHM.php';
        break;

    case "DeveloppeurUpdate":

        $DeveloppeurDAO = new DeveloppeurDAO($pdo);
        $tLines = $DeveloppeurDAO->selectAll();

        include '../boundaries/DeveloppeurUpdateIHM.php';
        break;

    case "DeveloppeurUpdateSelection":
        //... partie affichage:
        
        //...on fait appel au DAO ( instanciation d'un objet de la classe DAO)
        $DeveloppeurDAO = new DeveloppeurDAO($pdo);
        //...génère la liste de tous les développeurs entrés dans la table
        //...via la methode selectAll de la classe DeveloppeurDAO
        $tLines = $DeveloppeurDAO->selectAll();

                //...Partie Update:
        
        //... on stocke la valeur de l'option selectionnée dans une variable $id
        $id = filter_input(INPUT_POST, "listeDeveloppeurs");
        
        //...on sollicite la methode selectOne pour récupérer l'objet Developpeur 
        //...correspondant à l'id en argument
        $dev = $DeveloppeurDAO->selectOne($id);
        
        //...on récupère le nom du développeur correspondant à l'objet $dev
        //...via le getter de la classe Developpeur
        $lsNon = $dev->getNomDeveloppeur();
        


        include '../boundaries/DeveloppeurUpdateIHM.php';
        break;

    //...cas du UpdateValidation en hidden
    case "DeveloppeurUpdateValidation":
        /*
         * APPEL AU DAO
         */
        // affiche la liste déroulante de façon permanente 
        $DeveloppeurDAO = new DeveloppeurDAO($pdo);
        $tLines = $DeveloppeurDAO->selectAll();


        $idDeveloppeur = filter_input(INPUT_POST, "idDeveloppeur");
        $nomDeveloppeur = filter_input(INPUT_POST, "nomDeveloppeur");


        if ($idDeveloppeur != null && $nomDeveloppeur != null) {
            Transaxion::initialiser($pdo);
            $DeveloppeurDAO = new DeveloppeurDAO($pdo);
            $Developpeur = new Developpeur($idDeveloppeur, $nomDeveloppeur);
            $lsMessage = $DeveloppeurDAO->update($Developpeur) . " enregistrement modifié";
            Transaxion::valider($pdo);
        } else {
            $lsMessage = "Toutes les saisies sont obligatoires";
        }
        include '../boundaries/DeveloppeurUpdateIHM.php';
        break;

    default:
        include '../boundaries/AccueilIHM.php';
        break;
}
?>    














