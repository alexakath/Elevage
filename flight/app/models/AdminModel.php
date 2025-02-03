<?php

namespace app\models;
use PDO ;

use Flight;

class AdminModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all users
    public function getAllAdmin() {
        $stmt = $this->db->query("SELECT * FROM Admins");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all users as an associative array
    }

    // Get user by ID
    public function getAdminById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Admins WHERE idAdmi = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user by ID
    }

    // // Add a new user
    // public function addUser($nom, $email, $mdp, $tel) {
    //     $stmt = $this->db->prepare("INSERT INTO Admins (nom, email, mdp, tel) VALUES (?, ?, ?, ?)");
    //     return $stmt->execute([$nom, $email, $mdp, $tel]);
    // }

    // public function updateAdmin($id,$email, $mdp) {
    //     $stmt = $this->db->prepare("UPDATE Admins SET email = ?, mdp = ? WHERE idAdmi = ?");
    //     return $stmt->execute([$email, $mdp, $id]);
    // }

    // // Delete a user
    // public function deleteAdmin($id) {
    //     $stmt = $this->db->prepare("DELETE FROM Admins WHERE idAdmi = ?");
    //     return $stmt->execute([$id]);
    // }

    // // Check if email already exists
    // public function checkEmailExists($email) {
    //     $stmt = $this->db->prepare("SELECT COUNT(*) FROM Admins WHERE email = ?");
    //     $stmt->execute([$email]);
    //     return $stmt->fetchColumn() > 0; // Return true if email exists, false otherwise
    // }

    public function authenticateAdmin($email, $mdp) {
        $stmt = $this->db->prepare("SELECT * FROM Admins WHERE email = ? AND mdp = ?");
        $stmt->execute([$email, $mdp]);
        $rowCount = $stmt->rowCount(); 
        $data = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        // var_dump($data); // Pour vérifier le contenu de $data
    
        return [
            'data' => $data,
            'rowCount' => $rowCount
        ];
    }
    
    

    // public function findAdminIdByEmail($email) {
    //     $stmt = $this->db->prepare("SELECT idAdmi FROM Admins WHERE email = ?");
    //     $stmt->execute([$email]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC)['idAdmi'] ?? null;
    // }

}

?>