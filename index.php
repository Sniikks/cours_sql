<?php
// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'Sniikks', 'Aqwzsx03*');

// Vérifier la connexion
if (!$bdd) {
    die("La connexion à la base de données a échoué.");
}

// Récupération des logiciels
$sql = "SELECT * FROM software";
$result = $bdd->query($sql);

if ($result) {
    // Vérifier si des résultats ont été trouvés
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<h2>" . htmlspecialchars($row["name"]) . "</h2>";
            echo "<p>Contact: " . htmlspecialchars($row["contact"]) . "</p>";

            // Affichage des composants
            echo "<h3>Components:</h3>";
            $components_sql = "SELECT * FROM component WHERE software_id=" . $row["id"];
            $components_result = $bdd->query($components_sql);

            if ($components_result && $components_result->rowCount() > 0) {
                while ($component = $components_result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p>" . htmlspecialchars($component["name"]) . "</p>";
                }
            } else {
                echo "<p>Aucun composant trouvé.</p>";
            }

            // Affichage des packages
            echo "<h3>Packages:</h3>";
            $packages_sql = "SELECT * FROM package WHERE software_id=" . $row["id"];
            $packages_result = $bdd->query($packages_sql);

            if ($packages_result && $packages_result->rowCount() > 0) {
                while ($package = $packages_result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p>" . htmlspecialchars($package["name"]) . "</p>";
                }
            } else {
                echo "<p>Aucun package trouvé.</p>";
            }

            // Bouton pour soumettre un bug avec l'appel JavaScript
            echo '<button onclick="submitBug(' . $row["id"] . ')">Soumettre un bug</button>';
        }
    } else {
        echo "<p>Aucun logiciel trouvé.</p>";
    }
} else {
    // Gérer les erreurs de requête
    $errorInfo = $bdd->errorInfo();
    echo "Erreur SQL : " . $errorInfo[2];
}

// Fermer la connexion
$bdd = null;
?>

<!-- JavaScript pour gérer le clic sur le bouton "Soumettre un bug" -->
<script>
function submitBug(softwareId) {
    // Rediriger vers la page de soumission de bug avec l'ID du logiciel
    window.location.href = 'submit_bug.php?software_id=' + softwareId;
}
</script>
