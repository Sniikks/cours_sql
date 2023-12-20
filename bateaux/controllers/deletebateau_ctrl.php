<?php
require_once '../function/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_bateau'])) {
    $id_bateau = $_POST['id_bateau'];

    $query = "DELETE FROM Bateau WHERE id_bateau = :id_bateau";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id_bateau', $id_bateau);

    if ($stmt->execute()) {
        header('Location: ../index.php');
        exit();
    } else {
        echo 'Erreur pendant la suppression.';
    }
} else {
    echo 'ID manquant.';
}
?>
