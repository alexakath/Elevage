<?php
namespace app\models;
use Flight ;
use PDO ;

class CadeauxModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Récupérer tous les cadeaux
    public function getAllCadeaux() {
        $stmt = $this->db->prepare("SELECT * FROM cadeaux");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Récupérer les cadeaux par genre
    public function getCadeauxByGenre($genre) {
        $stmt = $this->db->prepare("SELECT * FROM cadeaux WHERE genre = ?");
        $stmt->execute([$genre]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Ajouter un cadeau
    public function addCadeau($img, $genre, $prix) {
        $stmt = $this->db->prepare("INSERT INTO cadeaux (img, genre, prix) VALUES (?, ?, ?)");
        $stmt->execute([$img, $genre, $prix]);
        return $this->db->lastInsertId();
    }

    // Mettre à jour un cadeau
    public function updateCadeau($id, $img, $genre, $prix) {
        $stmt = $this->db->prepare("UPDATE cadeaux SET img = ?, genre = ?, prix = ? WHERE id_cadeau = ?");
        return $stmt->execute([$img, $genre, $prix, $id]);
    }

    // Supprimer un cadeau
    public function deleteCadeau($id) {
        $stmt = $this->db->prepare("DELETE FROM cadeaux WHERE id_cadeau = ?");
        return $stmt->execute([$id]);
    }
    public function getCadeauxByGenreAndLimit($genre, $limit) {
        $stmt = $this->db->prepare("SELECT * FROM cadeaux WHERE genre = ? LIMIT ?");
        $stmt->bindValue(1, $genre, \PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
