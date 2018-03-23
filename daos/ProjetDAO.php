<?php

/*
  ProjetDAO.php
 */
/*
  LE DAO de la table [Projet] de la BD [GestionProjet]
 */
require_once '../entities/Projet.php';

//....instatiatiation de la classe ProjetDAO
class ProjetDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function selectAll() {
        $liste = array();
        try {
            // ....requête SQL qui sera à executer: $lrs= local record set
            // ....$lrs = curseur = matrice rectangulaire avec lignes et 
            //....colonnes
            $sql = 'SELECT * FROM GestionProjet.Projet';
            //....on instancie l'objet PDO par la methode query
            $lrs = $this->pdo->query($sql);
            //.... on passe en fetchMode :
            //.... on parcourt un tableau associatif
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                //....instanciation de l'objet  projet ayant les attributs
                //....idProjet - nomProjet - dateDebut - description
                $objet = new Projet();
                $objet->setIdProjet($enr['idProjet']);
                $objet->setNomProjet($enr['nomProjet']);
                $objet->setDateDebut($enr['dateDebut']);
                $objet->setDescription($enr['description']);
                $liste[] = $objet;
            }
            // ....traitement des erreurs par PDO sous forme d'exception
        } catch (PDOException $e) {
            $objet = null;
            $liste[] = $objet;
        }
        return $liste;
    }

    public function selectOne($id) {
        try {
            // ....requête SQL qui sera à executer: $lrs= local record set
            $sql = 'SELECT * FROM GestionProjet.Projet WHERE idProjet = ?';
             // ....la requête est se fait avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            //.... != selectAll (pas de where) => on utilise query
            $lcmd = $this->pdo->prepare($sql);
            //....bindValue va valoriser les differents index du tableau
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Projet();
            $objet->setIdProjet($enr['idProjet']);
            $objet->setNomProjet($enr['nomProjet']);
            $objet->setDateDebut($enr['dateDebut']);
            $objet->setDescription($enr['description']);
        } catch (PDOException $e) {
            $objet = null;
        }
        return $objet;
    }

    public function delete($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "DELETE FROM GestionProjet.Projet WHERE idProjet = ?";
            // ....la requête est préparée avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdProjet());
            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    public function insert($objet) {
        $liAffectes = 0;
        try {
             // ....requête SQL qui sera à executer
            $sql = "INSERT INTO GestionProjet.Projet(idProjet,nomProjet,dateDebut,description) VALUES(?,?,?,?)";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdProjet());
            $lcmd->bindValue(2, $objet->getNomProjet());
            $lcmd->bindValue(3, $objet->getDateDebut());
            $lcmd->bindValue(4, $objet->getDescription());

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    public function update($objet) {
        $liAffectes = 0;
        try {
             // ....requête SQL qui sera à executer
            $sql = "UPDATE GestionProjet.Projet SET nomProjet=?,dateDebut=?,description=? WHERE idProjet=?";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getNomProjet());
            $lcmd->bindValue(2, $objet->getDateDebut());
            $lcmd->bindValue(3, $objet->getDescription());
            $lcmd->bindValue(4, $objet->getIdProjet());
            //....execution de la requête
            $lcmd->execute();
            //.... compte le nombre de lignes affectées/modifiées
            $liAffectes = $lcmd->rowcount();
            //....configuration des erreurs traitées comme des exceptions
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        //....retourne la ligne affectée/modifiée
        return $liAffectes;
    }

}

?>
