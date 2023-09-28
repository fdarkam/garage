<?php
require_once 'include/header.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Inscription</h1>
    <?php
    if (isset($_SESSION['erreur'])) {
        echo '<p style="color:red;">' . $_SESSION['erreur'] . '</p>';
        unset($_SESSION['erreur']);
    }
    ?>
    <form action="traitement_inscription.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" minlength="8" required><br>

        <label for="confirmer_mot_de_passe">Confirmer le mot de passe :</label>
        <input type="password" name="confirmer_mot_de_passe" minlength="8" required><br>

        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>
<?php
include 'include/footer.php';
?>