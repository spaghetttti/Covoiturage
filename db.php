<?php
function getDatabaseConnection()
{
    try {
        // Configurer les informations de connexion à MySQL
        $servername = "localhost";
        $username = "root";
        $password = "azizbekloh";
        $dbname = "nom_de_votre_base_de_donnees";

        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        return $pdo;
    } catch (PDOException $e) {
        echo "Error with db connection: " . $e->getMessage();
        die();
    }
}

function getAllRoutes($searchParams = null)
{
    try {
        $connection = getDatabaseConnection();
        if (empty($searchParams)) {
            $request = "SELECT * FROM Trajets;";
        } else {
            $request = "SELECT * FROM Trajets WHERE villeDepart = \"{$searchParams['villeDepart']}\" AND villeArrivee = \"{$searchParams['villeArrivee']}\" AND prixRecommande = \"{$searchParams['prixRecommande']}\"";
        }
        // $request = empty($searchParams) ? "SELECT * FROM Trajets;" : "SELECT Trajets WHERE villeDepart = {$searchParams['villeDepart']} AND villeArrivee = {$searchParams['villeArrivee']} AND prixRecommande = {$searchParams['prixRecommande']}";
        $statement = $connection->query($request);
        return $statement->fetchAll();
    } catch (PDOException $e) {
        echo $request . "<br>" . $e->getMessage();
    }
}

function getRoute($id)
{
    $connection = getDatabaseConnection();
    $request = "SELECT * FROM Trajets WHERE idTrajet = '$id';";
    $statement = $connection->query($request);
    $row = $statement->fetchAll();
    if (!empty($row[0])) {
        return $row[0];
    }
}

function deleteRoute($id)
{
    try {
        $connection = getDatabaseConnection();
        $request = "DELETE FROM Trajets WHERE idTrajet = '$id'; ";
        $statement = $connection->query($request);
    } catch (PDOException $e) {
        echo "La suppression a échoué: " . $e->getMessage();
        die();
    }
}

function createRoute($idTrajet, $villeDepart, $villeArrivee, $prixRecommande)
{
    try {
        $connection = getDatabaseConnection();
        $request = "INSERT INTO Trajets (idTrajet, villeDepart, villeArrivee, prixRecommande) VALUES ('$idTrajet', '$villeDepart', '$villeArrivee','$prixRecommande')";
        $connection->exec($request);
    } catch (PDOException $e) {
        echo $request . "<br>" . $e->getMessage();
    }
}
function updateRoute($idTrajet, $villeDepart, $villeArrivee, $prixRecommande)
{
    try {
        $connection = getDatabaseConnection();
        $request = "UPDATE Trajets SET villeDepart = '$villeDepart', villeArrivee = '$villeArrivee', prixRecommande = '$prixRecommande' WHERE idTrajet = '$idTrajet'";
        $connection->exec($request);
    } catch (PDOException $e) {
        echo $request . "<br>" . $e->getMessage();
    }
}

function searchRoute($villeDepart, $villeArrivee, $prixRecommande)
{
    $searchParams = [
        "villeDepart" => $villeDepart,
        "villeArrivee" => $villeArrivee,
        "prixRecommande" => $prixRecommande
    ];
    return getAllRoutes($searchParams);
}
