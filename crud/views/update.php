<?php
require_once '../function/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css.css">
    <title>Modifier un Livre</title>
</head>
<body>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT id, titre, ISBN, resume FROM livre WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($book) {
        echo '<h2>Modifier le Livre</h2>
            <form action="../controllers/update_ctrl.php" method="post">
                <input type="hidden" name="id" value="' . $book['id'] . '">
                <label for="titre">Titre:</label>
                <input type="text" name="titre" value="' . $book['titre'] . '" required><br>
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" value="' . $book['ISBN'] . '" required><br>
                <label for="resume">Résumé:</label>
                <textarea name="resume" required>' . $book['resume'] . '</textarea><br>
                <input type="submit" value="Enregistrer les Modifications">
            </form>';
    } else {
        echo 'Livre introuvable.';
    }
} else {
    echo 'ID manquant';
}
?>
</body>
</html>
