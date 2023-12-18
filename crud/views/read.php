<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css.css">
    <title>Afficher un Livre</title>
</head>
<body>

<h2>Informations sur le Livre</h2>
<?php
if (isset($bookDetails)) {
    echo '<p>ID : ' . $bookDetails['id'] . '</p>';
    echo '<p>Titre : ' . $bookDetails['titre'] . '</p>';
    echo '<p>ISBN : ' . $bookDetails['ISBN'] . '</p>';
    echo '<p>Résumé : ' . $bookDetails['resume'] . '</p>';
} else {
    echo '<p>Aucune information disponible.</p>';
}
?>
</body>
</html>
