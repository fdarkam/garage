<?php include 'include/header.php';
if (isset ($_SESSION['user'])) {
    if (isset($_SESSION['success'])) {
        echo '<p style="color:green;">' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']);
    }
}
?>

<main>
<link rel="stylesheet" href="css/style.css">
  <section class="hero">
    <div class="container">
      <h2>Bienvenue chez notre Garage Automobile</h2>
      <p>Le meilleur choix pour l'achat de voitures d'occasion de qualité</p>
    </div>
  </section>

  <section class="presentation">
    <div class="container">
      <h2>Pourquoi choisir notre garage ?</h2>
      <div class="presentation-content">
        <div class="presentation-item">
          <h3>Qualité</h3>
          <p>Nous sélectionnons rigoureusement nos voitures d'occasion pour vous assurer la meilleure qualité possible.</p>
        </div>
        <div class="presentation-item">
          <h3>Service</h3>
          <p>Notre équipe de professionnels est à votre disposition pour vous aider et répondre à toutes vos questions.</p>
        </div>
        <div class="presentation-item">
          <h3>Fiabilité</h3>
          <p>Nous garantissons la fiabilité de nos véhicules grâce à des contrôles et des entretiens réguliers.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="call-to-action">
    <div class="container">
      <h2>Vous cherchez une voiture d'occasion ?</h2>
      <p>Parcourez notre catalogue de voitures disponibles et trouvez la voiture qui correspond à vos besoins et à votre budget.</p>
      <a href="liste_voitures.php" class="cta-button">Voir les voitures disponibles</a>
    </div>
  </section>
</main>

<?php include 'include/footer.php'; ?>
