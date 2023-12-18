<?php
require_once '../function/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titre'], $_POST['isbn'], $_POST['resume'])) {
        $titre = $_POST['titre'];
        $isbn = $_POST['isbn'];
        $resume = $_POST['resume'];

        $query = "INSERT INTO livre (titre, ISBN, resume) VALUES (:titre, :isbn, :resume)";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':resume', $resume);

        if ($stmt->execute()) {
            echo '<p>Livre ajouté avec succès!</p>';
            header('Location: ../index.php');
        } else {
            echo '<p>Erreur lors de l\'ajout du livre.</p>';
            header('Location: ../index.php');
        }
    } else {
        echo '<p>Tous les champs sont obligatoires.</p>';
        header('Location: ../index.php');
    }
}
?>