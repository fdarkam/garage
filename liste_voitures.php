<?php
require_once 'include/Voiture.php';
include 'include/header.php';
$voiture = new Voiture();
$result = $voiture->readAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Liste des voitures</h1>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card">
            <img src="<?= $row['image'] ?>" alt="<?= $row['marque'] . ' ' . $row['modele'] ?>">
            <div class="card-info">
                <h2><?= $row['marque'] . ' ' . $row['modele'] ?></h2>
                <p>Immatriculation : <?= $row['immatriculation'] ?></p>
                <p>Date de première mise en circulation : <?= $row['date_mise_en_circulation'] ?></p>
                <p>Prix : <?= $row['prix'] ?> cfp</p>
                <p>Date de rentrée au garage : <?= $row['date_entree_garage'] ?></p>
                <p>Nombre de chevaux fiscaux : <?= $row['chevaux_fiscaux'] ?></p>
                <p>Description : <?= $row['description'] ?></p>
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
                echo "<a href='modifier.php?id=" . $row['id'] . "' class='button'>Modifier</a>";
                echo "<a href='supprimer.php?id=" . $row['id'] . "' class='button'>Supprimer</a>";
                }
                ?>
                <a href='reserver.php?id=<?= $row['id'] ?>' class='button'>Acheter</a>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</body>
</html>
