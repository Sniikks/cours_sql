<?php
require_once '../function/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT id, titre, ISBN, resume FROM livre WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        $bookDetails = $stmt->fetch(PDO::FETCH_ASSOC);
        include '../views/read.php';
    } else {
        echo 'Erreur lors de la récupération des détails du livre.';
    }
} else {
    echo 'ID de livre non spécifié.';
}
?>
