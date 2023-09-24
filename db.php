<?php

// Configurer les informations de connexion à MySQL
$servername = "localhost";
$username = "root";
$password = "azizbekloh";

try {
    // Connexion à MySQL sans spécifier de base de données
    $conn = new PDO("mysql:host=$servername", $username, $password);
    
    // Définir le mode d'erreur PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Requête de création de la base de données
    $createDBSQL = "CREATE DATABASE IF NOT EXISTS nom_de_votre_base_de_donnees";
    
    // Exécution de la requête de création de la base de données
    $conn->exec($createDBSQL);
    
    echo "La base de données a été créée avec succès.";
    
    // Sélection de la base de données nouvellement créée
    $conn->exec("USE nom_de_votre_base_de_donnees");
    
    // Requête de création de table
    $createTableSQL = "CREATE TABLE IF NOT EXISTS Internautes (
        email VARCHAR(255) NOT NULL,
        motDePasse VARCHAR(255) NOT NULL,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        telephone VARCHAR(20),
        PRIMARY KEY (email)
    )";
    
    // Exécution de la requête de création de table
    $conn->exec($createTableSQL);
    
    // Requête d'insertion des données fictives
    $insertDataSQL = "INSERT INTO Internautes (email, motDePasse, nom, prenom, telephone) VALUES
            ('john@example.com', 'motdepasse1', 'Doe', 'John', '0123456789'),
            ('jane@example.com', 'motdepasse2', 'Smith', 'Jane', '9876543210'),
            ('bob@example.com', 'motdepasse3', 'Brown', 'Bob', '5555555555')";
    
    // Exécution de la requête d'insertion des données fictives
    $conn->exec($insertDataSQL);
    
    echo "La table Internautes a été créée et les données fictives ont été insérées avec succès.";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermeture de la connexion à MySQL
$conn = null;

?>