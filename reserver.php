<?php
require_once 'include/Voiture.php';
include 'include/header.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}

// Récupérez l'ID de la voiture à partir de l'URL et chargez les informations sur la voiture à partir de la base de données
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Aucune voiture sélectionnée.";
    exit();
}

$voiture = new Voiture();
$car = $voiture->read($id);

if (empty($car)) {
    echo "Aucune voiture trouvée.";
    exit();
}

// Si la voiture est en rupture de stock
/*if ($car['stock'] <= 0) {
    echo "Rupture de stock";
    exit();
}*/

// Traitez la réservation en fonction des informations de l'utilisateur et de la voiture
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Enregistrez la réservation dans la base de données
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date = $_POST['date_reservation'];

    // Redirigez l'utilisateur vers une page de confirmation
    if ($result) {
        header("Location: confirmation.php?id=" . $id);
        exit();
    } else {
        echo "Une erreur s'est produite lors de la réservation.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation - <?= $car['marque'] . ' ' . $car['modele'] ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Réservation</h1>
    <h2><?= $car['marque'] . ' ' . $car['modele'] ?></h2>

    <form action="reserver.php?id=<?= $id ?>" method="post">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" required>
        </div>
        <div>
            <label for="date">Date de réservation :</label>
            <input type="date" id="date" name="date" required>
        </div>
        <input type="submit" value="Réserver">
    </form>

    <?php include 'include/footer.php'; ?>
</body>
</html>
