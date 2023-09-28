<?php

require_once 'include/Database.php';

class Reservation {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($userId, $carId, $date) {
        $sql = "INSERT INTO reservations (user_id, voiture_id, date_reservation) VALUES (?, ?, ?)";
        if ($stmt = $this->db->getConnection()->prepare($sql)) {
            $stmt->bind_param("iis", $userId, $carId, $date);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function read($id) {
        $sql = "SELECT * FROM reservations WHERE id = ?";
        if ($stmt = $this->db->getConnection()->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } else {
            return null;
        }
    }

    public function update($id, $userId, $carId, $date) {
        $sql = "UPDATE reservations SET user_id = ?, voiture_id = ?, date_reservation = ? WHERE id = ?";
        if ($stmt = $this->db->getConnection()->prepare($sql)) {
            $stmt->bind_param("iisi", $userId, $carId, $date, $id);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM reservations WHERE id = ?";
        if ($stmt = $this->db->getConnection()->prepare($sql)) {
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } else {
            return false;
        }
    }
}
