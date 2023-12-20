<?php
require_once './function/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Liste des Livres</title>
</head>
<body>

<form action="./controllers/create_ctrl.php" method="post">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" required><br>
    <label for="isbn">ISBN :</label>
    <input type="text" name="isbn" required><br>
    <label for="resume">Résumé :</label>
    <textarea name="resume" required></textarea><br>
    <button type="submit">Ajouter Livre</button>
</form>

<?php
$query = "SELECT id, titre, ISBN, resume FROM livre";
$result = $bdd->query($query);

if ($result) {
    echo '<table border="1">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>ISBN</th>
                <th>Résumé</th>
                <th>Actions</th>
            </tr>';
    
    while ($row = $result->fetch()) {
        echo '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['titre'] . '</td>
            <td>' . $row['ISBN'] . '</td>
            <td>' . $row['resume'] . '</td>
            <td>
                <form action="./controllers/read_ctrl.php" method="get">
                    <input type="hidden" name="id" value="' . $row['id'] . '">
                    <button type="submit">Afficher</button>
                </form>
                <form action="./views/update.php" method="get">
                    <input type="hidden" name="id" value="' . $row['id'] . '">
                    <button type="submit">Modifier</button>
                </form>
                <form action="./controllers/delete_ctrl.php" method="post">
                    <input type="hidden" name="id" value="' . $row['id'] . '">
                    <button type="submit" onclick="return confirm(\'Supprimer le livre?\');">Supprimer</button>
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
