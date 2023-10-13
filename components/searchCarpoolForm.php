<?php
require("./db.php");
var_dump($_POST);
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     searchRoute($_POST['villeDepart'], $_POST['villeArrivee'], $_POST['prixRecommande']);
// }
?>

<form method="POST">
    <h3>Recherche un covoiturage</h3>
    <label for="route">Entrez le lieu de départ:</label><br />
    <input type="text" id="route" name="villeDepart" placeholder="Paris" /><br />
    <label for="route">Entrez le lieu d'arrivée:</label><br />
    <input type="text" id="route" name="villeArrivee" placeholder="Montplellier" /><br />

    <label for="date">Date:</label><br />
    <input type="date" id="date" name="date" /><br />

    <label for="route">Entrez votre prix (€):</label><br />
    <input type="text" id="route" name="prixRecommande" placeholder="300" /><br />

    <button type="submit">Trouver</button>
</form>