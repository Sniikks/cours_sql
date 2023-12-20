<?php
require_once '../function/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['nom']) &&
        isset($_POST['modele']) &&
        isset($_POST['taille']) &&
        isset($_POST['proprietaire'])
    ) {
        $nom = $_POST['nom'];
        $modele = $_POST['modele'];
        $taille = $_POST['taille'];
        $proprietaire = $_POST['proprietaire'];

        $query = "INSERT INTO Bateau (nom, modele, taille, proprietaire) VALUES (?, ?, ?, ?)";
        $stmt = $bdd->prepare($query);
        $stmt->execute([$nom, $modele, $taille, $proprietaire]);

        header('Location: ../index.php');
        exit();
    } else {
        header('Location: ../index.php');
        exit();
    }
}
?>
