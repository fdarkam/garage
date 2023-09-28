<?php

class Database {
    private $connexion;

    public function __construct() {
        $this->connecter();
    }

    private function connecter() {
        $serveur = 'localhost';
        $utilisateur = 'root';
        $mot_de_passe = '';
        $nom_de_la_base = 'garage';

        $this->connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_de_la_base);

        if ($this->connexion->connect_error) {
            die("Erreur : Impossible de se connecter. " . $this->connexion->connect_error);
        }
    }

    public function getConnection() {
        return $this->connexion;
    }
}

?>
