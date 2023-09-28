<?php include 'include/header.php'; ?>

<main>
<link rel="stylesheet" href="css/style.css">
  <section class="hero">
    <div class="container">
      <h2>Contactez notre Garage Automobile</h2>
      <p>Nous sommes toujours prêts à vous aider. Voici comment vous pouvez nous contacter...</p>
    </div>
  </section>

  <section class="contact-form">
    <div class="container">
      <form action="send_email.php" method="post">
        <input type="text" name="name" placeholder="Votre nom" required>
        <input type="email" name="email" placeholder="Votre email" required>
        <textarea name="message" placeholder="Votre message" required></textarea>
        <button type="submit">Envoyer</button>
      </form>
    </div>
  </section>
</main>

<?php include 'include/footer.php'; ?>
