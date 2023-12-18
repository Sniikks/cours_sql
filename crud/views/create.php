<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un livre</title>
</head>
<body>
    <h1>Ajout d'un livre</h1>
    <form action="Controllers/create_ctrl.php" method="post">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" required><br>
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" pattern="[0-9]+" required><br>
        <label for="resume">Résumé:</label>
        <textarea name="resume" required></textarea><br>
        <input type="submit" value="Créer">
    </form>
</body>
</html>
