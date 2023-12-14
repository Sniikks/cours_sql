<?php
if (isset($_GET['software_id'])) {
    $softwareId = $_GET['software_id'];

    // Assurez-vous que le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérez les données du formulaire
        $symptom = $_POST['symptom'];
        $platform = $_POST['platform'];
        $bugDescription = $_POST['bug_description'];

        // Ajoutez votre logique pour enregistrer le bug dans la base de données ici
        // Vous pouvez utiliser les variables $softwareId, $symptom, $platform, $bugDescription

        // Exemple d'affichage de messages (à personnaliser)
        echo "<p>Le bug a été soumis avec succès pour le logiciel avec l'ID $softwareId.</p>";
        echo "<p>Symptôme : $symptom</p>";
        echo "<p>Plateforme : $platform</p>";
        echo "<p>Description du bug : $bugDescription</p>";

        // Rediriger vers l'index
        header('Location: index.php');
        exit();
    } else {
        // Affichez ici le formulaire pour soumettre un bug
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Soumettre un bug</title>
        </head>
        <body>
            <h2>Soumettre un bug pour le logiciel avec l'ID <?php echo $softwareId; ?></h2>
            <form method="post">
                <label for="symptom">Symptôme :</label>
                <input type="text" name="symptom" required><br>

                <label for="platform">Plateforme :</label>
                <input type="text" name="platform" required><br>

                <label for="bug_description">Description du bug :</label>
                <textarea name="bug_description" required></textarea><br>

                <input type="submit" value="Soumettre le bug">
            </form>
        </body>
        </html>
        <?php
    }
} else {
    echo "ID du logiciel non spécifié.";
}
?>
