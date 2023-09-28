<?php
require_once 'include/Database.php';

class Voiture
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create($immatriculation, $marque, $modele, $date_mise_en_circulation, $prix, $date_entree_garage, $chevaux_fiscaux, $description, $image)
    {
        $sql = "INSERT INTO voitures (immatriculation, marque, modele, date_mise_en_circulation, prix, date_entree_garage, chevaux_fiscaux, description, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("ssssdsiss", $immatriculation, $marque, $modele, $date_mise_en_circulation, $prix, $date_entree_garage, $chevaux_fiscaux, $description, $image);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getMarques() {
        $sql = "SELECT DISTINCT marque FROM modeles ORDER BY marque";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }
    



    public function read($id)
    {
        $sql = "SELECT * FROM voitures WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function readAll()
    {
        $sql = "SELECT * FROM voitures";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }

    public function readOne($id)
    {
        $sql = "SELECT * FROM voitures WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $voiture = $result->fetch_assoc();
        $stmt->close();
        return $voiture;
    }

    public function update($id, $immatriculation, $marque, $modele, $date_mise_en_circulation, $prix, $date_entree_garage, $chevaux_fiscaux, $description)
    {
        $sql = "UPDATE voitures SET immatriculation = ?, marque = ?, modele = ?, date_mise_en_circulation = ?, prix = ?, date_entree_garage = ?, chevaux_fiscaux = ?, description = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("ssssdsisi", $immatriculation, $marque, $modele, $date_mise_en_circulation, $prix, $date_entree_garage, $chevaux_fiscaux, $description, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM voitures WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function updateImage($id, $image)
    {
        $sql = "UPDATE voitures SET image = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("si", $image, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function search($search)
    {
        $sql = "SELECT * FROM voitures WHERE marque LIKE ? OR modele LIKE ? OR description LIKE ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $search = '%' . $search . '%';
        $stmt->bind_param("sss", $search, $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
}
