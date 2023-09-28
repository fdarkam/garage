<?php
require_once 'include/Voiture.php';
include 'include/header.php';

if (isset($_GET['id'])) {
    $voiture = new Voiture();
    $row = $voiture->read($_GET['id']);
}

$voiture = new Voiture();
$marques = $voiture->getMarques();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier une voiture</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Modifier une voiture</h1>
    <form action="traitement_modif.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="image">Image de la voiture :</label>
        <input type="file" id="image" name="image" accept="image/*"><br>
        <label for="immatriculation">Numéro d'immatriculation:</label>
        <input type="text" name="immatriculation" id="immatriculation" value="<?php echo $row['immatriculation']; ?>" required><br>
        <label for="marque">Marque :</label>
        <input type="text" name="marque" id="marque" value="<?php echo $row['marque']; ?>" required>
        <label for="modele">Modèle :</label>
        <input type="text" name="modele" id="modele" value="<?php echo $row['modele']; ?>" required>
        <label for="date_mise_en_circulation">Date de première mise en circulation:</label>
        <input type="date" name="date_mise_en_circulation" id="date_mise_en_circulation" value="<?php echo $row['date_mise_en_circulation']; ?>" required><br>
        <label for="prix">Prix :</label>
        <input type="number" name="prix" id="prix" value="<?php echo $row['prix']; ?>" required>
        <label for="date_entree_garage">Date de rentrée au garage:</label>
        <input type="date" name="date_entree_garage" id="date_entree_garage" value="<?php echo $row['date_entree_garage']; ?>" required><br>
        <label for="chevaux_fiscaux">Nombre de chevaux fiscaux:</label>
        <input type="number" name="chevaux_fiscaux" id="chevaux_fiscaux" value="<?php echo $row['chevaux_fiscaux']; ?>" required><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" value="<?php echo $row['description']; ?>"></textarea><br>
        <input type="submit" value="Mettre à jour">
        <a href="liste_voitures.php" class="button">Retour</a>
    </form>
    <?php include 'include/footer.php'; ?>
</body>

</html>