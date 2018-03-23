<?php

// TEST ...

require_once '../lib_php/Connexion.class.php';
require_once '../lib_php/Transaxion.class.php';
//require_once '../daos/DeveloppeurDAO.php';
//Developpeur.php est déjà  inclus dans DeveloppeurDAO.php
//require_once '../entities/Developpeur.php';

$pdo = Connexion::seConnecter("../conf/bd.ini");

$dao = new DeveloppeurDAO($pdo);

/*
 * SELECT ALL
 */
$t = $dao->selectAll($pdo);
echo "<br>selectAll<pre>";
var_dump($t);
echo "</pre><br>";

/*
 * SELECTONE
 */
$t = $dao->selectOne(100);
echo "<br>selectOne<pre>";
var_dump($t);
echo "</pre><br>";

/*
 * INSERT
 */
Transaxion::initialiser($pdo);
$objet = new Developpeur(100, "Guillaume");
$n = $dao->insert($objet);
Transaxion::valider($pdo);
echo "<br>insert<pre>";
var_dump($n);
echo "</pre><br>";

/*
 * DELETE
 */
//Transaxion::initialiser($pdo);
//$objet = new Developpeur(100);
//$n = $dao->delete($objet);
//Transaxion::valider($pdo);
//echo "<br>delete<pre>";
//var_dump($n);
//echo "</pre><br>";
/*
 * UPDATE
 */
Transaxion::initialiser($pdo);
$objet = new Developpeur(100, "Guillaume");
$n = $dao->update($objet);
Transaxion::valider($pdo);
echo "<br>update<pre>";
var_dump($n);
echo "</pre><br>";

Connexion::seDeconnecter($pdo);
?>





