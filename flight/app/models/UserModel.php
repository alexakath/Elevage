<?php

namespace app\models;
use PDO ;

use Flight;

class UserModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all users
    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all users as an associative array
    }

    // Get user by ID
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id_user = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user by ID
    }

    // Add a new user
    public function addUser($nom, $prenom, $email, $mdp, $depot) {
        $stmt = $this->db->prepare("INSERT INTO users (nom, prenom, email, mdp, depot) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nom, $prenom, $email, $mdp, $depot]);
    }

    // Update user details
    public function updateUser($id, $nom, $prenom, $email, $mdp, $depot) {
        $stmt = $this->db->prepare("UPDATE users SET nom = ?, prenom = ?, email = ?, mdp = ?, depot = ? WHERE id_user = ?");
        return $stmt->execute([$nom, $prenom, $email, $mdp, $depot, $id]);
    }

    // Delete a user
    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id_user = ?");
        return $stmt->execute([$id]);
    }

    // Check if email already exists
    public function checkEmailExists($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0; // Return true if email exists, false otherwise
    }

    public function authenticateUser($email, $mdp) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? AND mdp = ?");
        $stmt->execute([$email, $mdp]);
        $rowCount = $stmt->rowCount(); // Compte le nombre de lignes
        $data = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne des résultats
        return [
            'data' => $data,
            'rowCount' => $rowCount
        ];
    }
    public function findUserIdByEmail($email) {
        $stmt = $this->db->prepare("SELECT id_user FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['id_user'] ?? null;
    }
    public function updateDepot($id_user, $newDepot) {
            $stmt = $this->db->prepare("UPDATE users SET depot = ? WHERE id_user = ?");
            $stmt->execute([$newDepot, $id_user]);
            return $stmt->rowCount() > 0; // Retourne true si une ligne a été mise à jour
    }
    
}
