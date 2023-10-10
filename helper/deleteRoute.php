<?php 
include('../db.php');
$idTrajet = $_POST['idTrajet'];
deleteRoute($idTrajet);
?>