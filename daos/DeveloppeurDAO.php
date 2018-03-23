
<?php

//require_once '../entities/Developpeur.php';

/*
  DeveloppeurDAO.php
 */
/*
  LE DAO de la table [Developpeur] de la BD [GestionProjet]
 */
require_once '../entities/Developpeur.php';

//....instatiatiation de la classe DeveloppeurDAO
class DeveloppeurDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "INSERT INTO Developpeur(idDeveloppeur, nomDeveloppeur) VALUES(?,?)";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdDeveloppeur());
            $lcmd->bindValue(2, $objet->getNomDeveloppeur());
         

            $lcmd->execute();
            $liAffectes = $lcmd->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
        }
        return $liAffectes;
    }

    public function selectAll() {
        $liste = array();
        try {
            // ....requête SQL qui sera à executer: $lrs= local record set
            // ....$lrs = curseur = matrice rectangulaire avec lignes et 
            //....colonnes
            $sql = 'SELECT * FROM Developpeur';
            //....on instancie l'objet PDO par la methode query
            $lrs = $this->pdo->query($sql);
            //.... on passe en fetchMode :
            //.... on parcourt un tableau associatif
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($enr = $lrs->fetch()) {
                //....instanciation de l'objet Developpeur ayant les attributs
                //....idDeveloppeur - nomDeveloppeur
                $objet = new Developpeur();
                $objet->setIdDeveloppeur($enr['idDeveloppeur']);
                $objet->setNomDeveloppeur($enr['nomDeveloppeur']);

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
            $sql = 'SELECT * FROM Developpeur WHERE idDeveloppeur = ?';
            // ....la requête est se fait avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            //.... != selectAll (pas de where) => on utilise query
            $lcmd = $this->pdo->prepare($sql);
            //....bindValue va valoriser les differents index du tableau
            $lcmd->bindValue(1, $id);
            $lrs = $lcmd->execute();
            $enr = $lcmd->fetch(PDO::FETCH_ASSOC);
            $objet = new Developpeur();
            $objet->setIdDeveloppeur($enr['idDeveloppeur']);
            $objet->setNomDeveloppeur($enr['nomDeveloppeur']);
        } catch (PDOException $e) {
            $objet = null;
        }
        return $objet;
    }

    public function delete($objet) {
        $liAffectes = 0;
        try {
            // ....requête SQL qui sera à executer
            $sql = "DELETE FROM Developpeur WHERE idDeveloppeur = ?";
            // ....la requête est préparée avec un : prepare/execute
            // .... toujours dans le cas d'un selectOne ( avec un where )
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getIdDeveloppeur());
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
            $sql = "UPDATE Developpeur SET nomDeveloppeur=?  WHERE idDeveloppeur=?";
            $lcmd = $this->pdo->prepare($sql);
            $lcmd->bindValue(1, $objet->getNomDeveloppeur());
            $lcmd->bindValue(2, $objet->getIdDeveloppeur());

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





