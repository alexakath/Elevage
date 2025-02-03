<?php

namespace app\models;
use PDO ;

use Flight;

class ClientModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all users
    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM Clients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all users as an associative array
    }

    // Get user by ID
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Clients WHERE idClient = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user by ID
    }

    // Add a new user
    public function addUser($nom, $email, $mdp, $tel) {
        $stmt = $this->db->prepare("INSERT INTO Clients (nom, email, mdp, tel) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nom, $email, $mdp, $tel]);
    }

    public function updateUser($id, $nom, $email, $mdp, $tel) {
        $stmt = $this->db->prepare("UPDATE Clients SET nom = ?, email = ?, mdp = ?, tel = ? WHERE idClient = ?");
        return $stmt->execute([$nom, $email, $mdp, $tel, $id]);
    }

    // Delete a user
    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM Clients WHERE idClient = ?");
        return $stmt->execute([$id]);
    }

    // Check if email already exists
    public function checkEmailExists($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM Clients WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0; // Return true if email exists, false otherwise
    }

    public function authenticateUser($nom, $email, $mdp, $tel) {
        $stmt = $this->db->prepare("SELECT * FROM Clients WHERE nom = ? AND email = ? AND mdp = ? AND tel = ?");
        $stmt->execute([$nom, $email, $mdp, $tel]);
        $rowCount = $stmt->rowCount(); // Compte le nombre de lignes
        $data = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne des résultats
        return [
            'data' => $data,
            'rowCount' => $rowCount
        ];
    }
    

    public function findUserIdByEmail($email) {
        $stmt = $this->db->prepare("SELECT idClient FROM Clients WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['idClient'] ?? null;
    }

}

?>