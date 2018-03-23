<?php

/**
 * Transaxion.class.php : une bibliotheque
 * initialiser()
 * valider()
 * annuler()
 */
class Transaxion {

    /**
     *
     * @param PDO $pcnx
     */
    public static function initialiser(PDO &$pcnx) {
        $lbOK = true;
        try {
            $pcnx->beginTransaction();
        } catch (PDOException $ex) {
            $lbOK = false;
        }
        return $lbOK;
    }

    /**
     *
     * @param PDO $pcnx
     */
    public static function valider(PDO &$pcnx) {
        $lbOK = true;
        try {
            $pcnx->commit();
        } catch (PDOException $ex) {
            $lbOK = false;
        }
        return $lbOK;
    }

    /**
     *
     * @param PDO $pcnx
     */
    public static function annuler(PDO &$pcnx) {
        $lbOK = true;
        try {
            $pcnx->rollBack();
        } catch (PDOException $ex) {
            $lbOK = false;
        }
        return $lbOK;
    }

}

?>
