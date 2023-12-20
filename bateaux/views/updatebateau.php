<?php
require_once '../function/db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css.css">
    <title>Modifier un Bateau</title>
</head>
<body>

<?php
if (isset($_GET['id_bateau'])) {
    $id_bateau = $_GET['id_bateau'];

    $query = "SELECT id_bateau, nom, modele, taille, proprietaire FROM Bateau WHERE id_bateau = :id_bateau";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id_bateau', $id_bateau);
    $stmt->execute();
    $bateau = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($bateau) {
        echo '<h2>Modifier le Bateau</h2>
            <form action="../controllers/updatebateau_ctrl.php" method="post">
                <input type="hidden" name="id_bateau" value="' . $bateau['id_bateau'] . '">
                <label for="nom">Nom du bateau:</label>
                <input type="text" name="nom" value="' . $bateau['nom'] . '" required><br>
                <label for="modele">Modèle:</label>
                <input type="text" name="modele" value="' . $bateau['modele'] . '" required><br>
                <label for="taille">Taille:</label>
                <input type="number" name="taille" value="' . $bateau['taille'] . '" required><br>
                <label for="proprietaire">Propriétaire:</label>
                <input type="text" name="proprietaire" value="' . $bateau['proprietaire'] . '" required><br>
                <input type="submit" value="Enregistrer les Modifications">
            </form>';
    } else {
        echo 'Bateau introuvable.';
    }
} else {
    echo 'ID manquant';
}
?>
</body>
</html>