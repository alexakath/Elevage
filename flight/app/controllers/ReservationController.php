<?php

namespace app\controllers;
use Flight;
use app\models\ReservationModel;
use app\models\HabitatModel;

class ReservationController {
    private $reservationModel;
    private $habitatModel;

    public function __construct($db) {
        $this->reservationModel = new ReservationModel($db);
        $this->habitatModel = new HabitatModel($db);
    }

    // Afficher le formulaire de réservation
    public function afficherFormulaireReservation($idHabitat) {
        if (!is_numeric($idHabitat)) {
            Flight::render('error', ['message' => 'ID d\'habitat invalide.']);
            return;
        }
        
        // Récupérer les détails de l'habitation
        $habitat = $this->habitatModel->getHabitatById($idHabitat);

        if ($habitat) {
            Flight::render('formulaireReservation', ['habitat' => $habitat]);
        } else {
            Flight::render('error', ['message' => 'Habitation non trouvée.']);
        }
    }

    // Traiter la réservation
    public function traiterReservation() {
        $idClient = Flight::get('client_id'); // Assurer que l'utilisateur est connecté
        $idHabitat = Flight::request()->data['idHabitat'];
        $dateDeb = Flight::request()->data['dateDeb'];
        $dateFin = Flight::request()->data['dateFin'];
        $prixTotal = Flight::request()->data['prixTotal'];
    
        if ($idClient && $idHabitat && $dateDeb && $dateFin) {
            // Vérifier la disponibilité de l'habitat
            $isAvailable = $this->reservationModel->isAvailable($idHabitat, $dateDeb, $dateFin);
    
            if (!$isAvailable) {
                // Si l'habitat n'est pas disponible, afficher un message d'erreur
                Flight::render('error', ['message' => 'L\'habitation n\'est pas disponible sur les dates sélectionnées.']);
                return;
            }
    
            // Créer la réservation si l'habitat est disponible
            $this->reservationModel->createReservation($idClient, $idHabitat, $dateDeb, $dateFin, $prixTotal);
    
            // Log pour débogage
            error_log("Réservation effectuée pour le client $idClient et l'habitat $idHabitat.");
    
            // Redirection après réservation
            Flight::redirect('/confirmationReservation');
        } else {
            Flight::render('error', ['message' => 'Informations manquantes pour la réservation.']);
        }
    }
    
}