<?php
session_start();
require_once 'include/Utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_STRING);
    $confirmer_mot_de_passe = filter_input(INPUT_POST, 'confirmer_mot_de_passe', FILTER_SANITIZE_STRING);

    if ($mot_de_passe != $confirmer_mot_de_passe) {
        $_SESSION['erreur'] = "Les mots de passe ne correspondent pas.";
        header("Location: inscription.php");
        exit();
    } elseif (strlen($mot_de_passe) < 8) {  // Vérification de la longueur du mot de passe
        $_SESSION['erreur'] = "Le mot de passe doit comporter au moins 8 caractères.";
        header("Location: inscription.php");
        exit();
    } else {
        $utilisateur = new Utilisateur();
        $result = $utilisateur->inscription($nom, $prenom, $email, $mot_de_passe);

        if ($result) {
            $_SESSION['success'] = "Inscription réussie. Vous pouvez vous connecter.";
            header("Location: connexion.php");
            exit();
        } else {
            $_SESSION['erreur'] = "Erreur lors de l'inscription. Veuillez réessayer.";
            header("Location: inscription.php");
            exit();
        }
    }
}
