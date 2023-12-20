<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Ajouter un Bateau</title>
</head>
<body>
    <h1>Ajouter un Bateau</h1>
    <form action="../controllers/addbateau_ctrl.php" method="post">
        <label for="nom">Nom du bateau:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="modele">Modèle:</label>
        <input type="text" id="modele" name="modele" required><br>
        <label for="taille">Taille:</label>
        <input type="number" id="taille" name="taille" required><br>
        <label for="proprietaire">Propriétaire:</label>
        <input type="text" id="proprietaire" name="proprietaire" required><br>
        <input type="submit" value="Ajouter Bateau">
    </form>
</body>
</html>
