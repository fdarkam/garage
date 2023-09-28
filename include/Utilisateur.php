<?php

require_once 'include/Database.php';

class Utilisateur
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function connexion($email, $mot_de_passe)
    {
        $sql = "SELECT * FROM utilisateurs WHERE email = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function inscription($nom, $prenom, $email, $mot_de_passe)
    {
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param('ssss', $nom, $prenom, $email, $mot_de_passe_hash);
        return $stmt->execute();
    }
}
