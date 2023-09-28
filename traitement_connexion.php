<?php
session_start();
require_once 'include/Utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_STRING);

    $utilisateur = new Utilisateur();
    $user = null;
    $user = $utilisateur->connexion($email, $mot_de_passe);

    if ($user) {
        $_SESSION['user'] = $user;
        $_SESSION['success'] = "Connexion réussie.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['erreur'] = "Email ou mot de passe incorrect.";
        header("Location: connexion.php");
        exit();
    }
}
?>
