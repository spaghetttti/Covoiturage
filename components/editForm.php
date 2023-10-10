<?php
include('../db.php');
[
    "idTrajet" => $idTrajet,
    "villeDepart" => $villeDepart,
    "villeArrivee" => $villeArrivee,
    "prixRecommande" => $prixRecommande,
] = getRoute(intval($_SERVER["QUERY_STRING"]));

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>

<body>
    <header>
        <h1>Modifier la route</h1>
    </header>
    <form method="GET" action="../helper/editRoute.php">
        <h3>Créer un covoiturage</h3>
        <label for="route">Id:</label><br />
        <input value="<?php echo $idTrajet; ?>" readonly type="text" id="route" name="idTrajet" placeholder="88" /><br />
        <label for="route">Entrez le lieu de départ:</label><br />
        <input value="<?php echo $villeDepart; ?>" type="text" id="route" name="villeDepart" placeholder="Paris" /><br />
        <label for="route">Entrez le lieu d'arrivée:</label><br />
        <input value="<?php echo $villeArrivee; ?>" type="text" id="route" name="villeArrivee" placeholder="Montplellier" /><br />
        <label for="date">Date:</label><br />
        <input type="date" id="date" name="date" /><br />
        <label for="route">Entrez votre prix (€):</label><br />
        <input value="<?php echo $prixRecommande; ?>" type="text" id="route" name="prixRecommande" placeholder="300" /><br />
        <button type="submit">Modifier</button>

    </form>

    <form method="POST" action="../helper/deleteRoute.php">
        <input type="hidden" name="idTrajet" value="<?php echo $idTrajet; ?>">
        <button class="delete" type="submit">
            <div>
                <span>
                    Supprimer
                </span>
                <img width="12" src="/assets/supprimer.svg" alt="supprimer" />
            </div>
        </button>
    </form>

</body>

</html>