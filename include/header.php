<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garage SIO</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <header class="header">
    <h1>Garage automobile</h1>
    <nav>
      <a href="index.php">Accueil</a>
      <a href="liste_voitures.php">Voitures</a>
      <a href="about.php">À propos</a>
      <a href="contact.php">Contact</a>
      <?php
      session_start();
      if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
        echo '<a href="ajout_voiture.php">Ajouter une voiture</a>';
      }
      if (isset($_SESSION['user'])) {
        $prenom = $_SESSION['user']['prenom'];
        echo '<span style="float:right;">Bonjour, ' . htmlspecialchars($prenom) . ' | <a href="deconnexion.php">Déconnexion</a></span>';
      } else {
        echo '<a href="connexion.php" style="float:right;">Connexion</a>';
      }
      ?>
    </nav>
  </header>
