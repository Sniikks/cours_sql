<?php
try {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=bat;charset=utf8', 'Sniikks', 'Aqwzsx03*');
    
    // Définir le mode d'erreur de PDO sur Exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Définir le mode d'extraction par défaut des données en mode tableau associatif
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message d'erreur et arrêter le script
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
?>
