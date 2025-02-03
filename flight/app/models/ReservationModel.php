<?php

namespace app\models;
use PDO;

class ReservationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Créer une nouvelle réservation
    public function createReservation($idClient, $idHabitat, $dateDeb, $dateFin, $prixTotal) {
        $sql = "
            INSERT INTO Reservations (idClient, idHabitat, date_deb, date_fin, prixTotal)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idClient, $idHabitat, $dateDeb, $dateFin, $prixTotal]);
    }

    // Vérifier la disponibilité de l'habitat
    public function isAvailable($idHabitat, $dateDeb, $dateFin) {
        $sql = "
            SELECT COUNT(*) FROM Reservations
            WHERE idHabitat = ? AND (
                (date_deb <= ? AND date_fin >= ?) OR
                (date_deb <= ? AND date_fin >= ?)
            )
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idHabitat, $dateDeb, $dateDeb, $dateFin, $dateFin]);

        $count = $stmt->fetchColumn();

        return $count == 0; // Si count == 0, cela signifie qu'il n'y a pas de réservation sur ces dates
    }

    // Récupérer les détails d'une réservation par son ID
// public function getReservationDetails($idReservation) {
//     $sql = "
//         SELECT r.*, h.type, h.localisation, h.loyer_par_jour
//         FROM Reservations r
//         JOIN Habitats h ON r.idHabitat = h.idHabitat
//         WHERE r.idReservation = ?
//     ";

//     $stmt = $this->db->prepare($sql);
//     $stmt->execute([$idReservation]);

//     return $stmt->fetch(PDO::FETCH_ASSOC); // Récupère un seul résultat (détails de la réservation)
// }

}
