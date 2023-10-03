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
        echo "Erreur with db connection: " . $e->getMessage();
        die();
    }
}

function getAllRoutes()
{
    $connection = getDatabaseConnection();
    $request = "SELECT * FROM Trajets;";
    $statement = $connection->query($request);
    return $statement->fetchAll();
    // var_dump($unbufferedResult);
    // foreach ($unbufferedResult as $row) {
    //     echo $row['email'] . PHP_EOL;
    // }
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

?>