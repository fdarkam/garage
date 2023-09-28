<?php
require_once 'include/Voiture.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voiture = new Voiture();

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifier si le fichier est une véritable image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }

    // Vérifier si le fichier existe déjà
    if (file_exists($target_file)) {
        echo "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifier la taille du fichier
    if ($_FILES["image"]["size"] > 500000) {
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }

    // Autoriser certains formats de fichier
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Si tout est ok, essayez de télécharger le fichier
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Le fichier " . htmlspecialchars(basename($_FILES["image"]["name"])) . " a été téléchargé.";
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        exit;
    }

    $result = $voiture->create($_POST['immatriculation'], $_POST['marque'], $_POST['modele'], $_POST['date_mise_en_circulation'], $_POST['prix'], $_POST['date_entree_garage'], $_POST['chevaux_fiscaux'], $_POST['description'], $target_file);

    if ($result) {
        header('Location: liste_voitures.php');
    } else {
        echo "Erreur : Impossible d'ajouter la voiture.";
    }
}
