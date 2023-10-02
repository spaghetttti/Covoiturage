<?php

// Configurer les informations de connexion à MySQL
$servername = "localhost";
$username = "root";
$password = "azizbekloh";
$dbname = "nom_de_votre_base_de_donnees";

try {

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

    $unbufferedResult = $pdo->query("SELECT * FROM Internautes;");
    foreach ($unbufferedResult as $row) {
        echo $row['email'] . PHP_EOL;
    }
    // // Connexion à MySQL sans spécifier de base de données
    // $conn = new PDO("mysql:host=$servername", $username, $password);

    // // Définir le mode d'erreur PDO sur Exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // // Requête de création de la base de données
    // $createDBSQL = "CREATE DATABASE IF NOT EXISTS nom_de_votre_base_de_donnees";

    // // Exécution de la requête de création de la base de données
    // $conn->exec($createDBSQL);

    // echo "La base de données a été créée avec succès.";

    // // Sélection de la base de données nouvellement créée
    // $conn->exec("USE nom_de_votre_base_de_donnees");

    // echo "La table Internautes a été créée et les données fictives ont été insérées avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermeture de la connexion à MySQL
$conn = null;

?>