<?php
require_once '../function/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['titre'], $_POST['isbn'], $_POST['resume'])) {
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $isbn = $_POST['isbn'];
        $resume = $_POST['resume'];

        $query = "UPDATE livre SET titre = :titre, ISBN = :isbn, resume = :resume WHERE id = :id";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':resume', $resume);
        $stmt->bindParam(':id', $id);

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
