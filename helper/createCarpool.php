<?php
include('../db.php');
// var_dump($_GET);
// destructure in a better way later !!!
$idTrajet = $_GET['idTrajet'];
$villeDepart = $_GET['villeDepart'];
$villeArrivee = $_GET['villeArrivee'];
$prixRecommande = $_GET['prixRecommande'];


createRoute($idTrajet, $villeDepart, $villeArrivee, $prixRecommande);
?>