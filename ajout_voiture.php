<?php
require_once 'include/Voiture.php';
include 'include/header.php';

$voiture = new Voiture();
$marques = $voiture->getMarques();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une voiture</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Ajouter une voiture</h1>
    <form action="traitement_ajout.php" method="POST" enctype="multipart/form-data">
        <label for="image">Image de la voiture :</label>
        <input type="file" id="image" name="image" accept="image/*"><br>
        <label for="immatriculation">Numéro d'immatriculation:</label>
        <input type="text" name="immatriculation" required><br>

        <label for="marque">Marque:</label>
        <select name="marque" required>
            <?php
            if ($marques->num_rows > 0) {
                while ($row = $marques->fetch_assoc()) {
                    echo "<option value='" . $row['marque'] . "'>" . $row['marque'] . "</option>";
                }
            }
            ?>
        </select><br>

        <label for="modele">Modèle:</label>
        <input type="text" name="modele" required><br>

        <label for="date_mise_en_circulation">Date de première mise en circulation:</label>
        <input type="date" name="date_mise_en_circulation" required><br>

        <label for="prix">Prix:</label>
        <input type="number" step="0.01" name="prix" required><br>

        <label for="date_entree_garage">Date de rentrée au garage:</label>
        <input type="date" name="date_entree_garage" required><br>

        <label for="chevaux_fiscaux">Nombre de chevaux fiscaux:</label>
        <input type="number" name="chevaux_fiscaux" required><br>

        <label for="description">Description:</label>
        <textarea name="description"></textarea><br>

        <input type="submit" value="Ajouter la voiture">
    </form>
</body>

</html>
<?php
include 'include/footer.php';
?>