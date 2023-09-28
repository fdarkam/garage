<?php
require_once 'include/Voiture.php';

if (isset($_GET['id'])) {
    $voiture = new Voiture();
    $oldVoiture = $voiture->readOne($_GET['id']);

    if ($oldVoiture) {
        if (file_exists($oldVoiture['image'])) {
            unlink($oldVoiture['image']);
        }
    }

    $voiture->delete($_GET['id']);
    header('Location: liste_voitures.php');
}
?>
