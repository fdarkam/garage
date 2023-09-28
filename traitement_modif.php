<?php
require_once 'include/Voiture.php';

if (isset($_POST['id']) && isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['prix']) && isset($_POST['date_mise_en_circulation'])) {
    $voiture = new Voiture();
    $oldVoiture = $voiture->readOne($_POST['id']);
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Supprimer l'ancienne image
        if(file_exists($oldVoiture['image'])) {
            unlink($oldVoiture['image']);
        }
        // Gestion du téléchargement de l'image
        $image = 'images/' . basename($_FILES['image']['name']);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
            $voiture->updateImage($_POST['id'], $image);
        } else {
            // Gérer l'échec du téléchargement
        }
    }
    $voiture->update($_POST['id'], $_POST['immatriculation'], $_POST['marque'], $_POST['modele'], $_POST['date_mise_en_circulation'], $_POST['prix'], $_POST['date_entree_garage'], $_POST['chevaux_fiscaux'], $_POST['description']);
    // Rediriger vers la page de la voiture
    header('Location: liste_voitures.php');
}
?>
