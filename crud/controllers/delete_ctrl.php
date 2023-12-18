<?php
require_once '../function/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM livre WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../index.php');
        exit();
    } else {
        echo 'Erreur pendant la suppression.';
        header('Location: ../index.php');
        exit();
    }
} else {
    echo 'ID manquant.';
}
?>
