<?php

namespace app\models;
use PDO;

class HabitatModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Récupérer toutes les habitations avec une photo associée
    public function getAllHabitats() {
        $sql = "
            SELECT h.idHabitat, h.type, h.nbChambre, h.loyer_par_jour, h.localisation, h.description, 
                   (SELECT p.url FROM Photos p WHERE p.idHabitat = h.idHabitat LIMIT 1) AS photo_url
            FROM Habitats h
        ";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les détails d'une habitation spécifique
    public function getHabitatById($idHabitat) {
        $sql = "
            SELECT h.idHabitat, h.type, h.nbChambre, h.loyer_par_jour, h.localisation, h.description, 
                   GROUP_CONCAT(p.url SEPARATOR ',') AS photo_urls
            FROM Habitats h
            LEFT JOIN Photos p ON h.idHabitat = p.idHabitat
            WHERE h.idHabitat = ?
            GROUP BY h.idHabitat
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idHabitat]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
