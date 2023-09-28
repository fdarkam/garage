<?php
require_once 'include/header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    h1 {
        text-align: center;
    }
    </style>
</head>
<body>
    <h1>Connexion</h1>
    <?php
    if (isset($_SESSION['erreur'])) {
        echo '<p style="color:red;">' . $_SESSION['erreur'] . '</p>';
        unset($_SESSION['erreur']);
    }
    ?>
    <form action="traitement_connexion.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br>

        <input type="submit" value="Se connecter">
        <input type="button" value="S'inscrire" onclick="window.location.href='inscription.php'">
    </form>
</body>
</html>
<?php
include 'include/footer.php';
?>
