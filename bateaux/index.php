<?php
require_once './function/db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Liste des Bateaux</title>
</head>
<body>

<form action="./controllers/addbateau_ctrl.php" method="post">
    <label for="nom">Nom du bateau :</label>
    <input type="text" name="nom" required><br>
    <label for="modele">Modèle :</label>
    <input type="text" name="modele" required><br>
    <label for="taille">Taille :</label>
    <input type="number" name="taille" required><br>
    <label for="proprietaire">Propriétaire :</label>
    <input type="text" name="proprietaire" required><br>
    <button type="submit">Ajouter Bateau</button>
</form>

<?php
$query = "SELECT id_bateau, nom, modele, taille, proprietaire FROM Bateau";
$result = $bdd->query($query);

if ($result) {
    echo '<table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Modèle</th>
                <th>Taille</th>
                <th>Propriétaire</th>
                <th>Actions</th>
            </tr>';
    
    while ($row = $result->fetch()) {
        echo '<tr>
            <td>' . $row['id_bateau'] . '</td>
            <td>' . $row['nom'] . '</td>
            <td>' . $row['modele'] . '</td>
            <td>' . $row['taille'] . '</td>
            <td>' . $row['proprietaire'] . '</td>
            <td>
                <form action="./views/updatebateau.php" method="get">
                    <input type="hidden" name="id_bateau" value="' . $row['id_bateau'] . '">
                    <button type="submit">Modifier</button>
                </form>
                <form action="./controllers/deletebateau_ctrl.php" method="post">
                    <input type="hidden" name="id_bateau" value="' . $row['id_bateau'] . '">
                    <button type="submit" onclick="return confirm(\'Supprimer le bateau?\');">Supprimer</button>
                </form>
            </td>
        </tr>';
    }

    echo '</table>';
    $result->closeCursor();
}
?>
</body>
</html>
