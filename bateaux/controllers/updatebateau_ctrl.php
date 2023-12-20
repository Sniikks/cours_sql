<?php
require_once '../function/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_bateau'], $_POST['nom'], $_POST['modele'], $_POST['taille'], $_POST['proprietaire'])) {
        $id_bateau = $_POST['id_bateau'];
        $nom = $_POST['nom'];
        $modele = $_POST['modele'];
        $taille = $_POST['taille'];
        $proprietaire = $_POST['proprietaire'];

        $query = "UPDATE Bateau SET nom = :nom, modele = :modele, taille = :taille, proprietaire = :proprietaire WHERE id_bateau = :id_bateau";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':modele', $modele);
        $stmt->bindParam(':taille', $taille);
        $stmt->bindParam(':proprietaire', $proprietaire);
        $stmt->bindParam(':id_bateau', $id_bateau);

        if ($stmt->execute()) {
            echo 'Modifications enregistrées.';
            header('Location: ../index.php');
            exit();
        } else {
            echo 'Erreur de l\'enregistrement.';
            header('Location: ../index.php');
            exit();
        }
    } else {
        echo 'Données manquantes.';
    }
}
?>