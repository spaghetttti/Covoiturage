<form method="GET" action="./helper/createCarpool.php">
    <h3>Créer un covoiturage</h3>
    <label for="route">Entrez le id (sera supprimé plus tard):</label><br />
    <input type="text" id="route" name="idTrajet" placeholder="88" /><br />
    <label for="route">Entrez le lieu de départ:</label><br />
    <input type="text" id="route" name="villeDepart" placeholder="Paris" /><br />
    <label for="route">Entrez le lieu d'arrivée:</label><br />
    <input type="text" id="route" name="villeArrivee" placeholder="Montplellier" /><br />
    <label for="date">Date:</label><br />
    <input type="date" id="date" name="date" /><br />
    <label for="route">Entrez votre prix (€):</label><br />
    <input type="text" id="route" name="prixRecommande" placeholder="300" /><br />
    <button type="submit">Soumettre</button>
</form>