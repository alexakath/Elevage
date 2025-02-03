<?php

namespace app\controllers;
use Flight;
use app\models\HabitatModel;

class HabitatController {
    private $habitatModel;

    public function __construct($db) {
        $this->habitatModel = new HabitatModel($db);
	}


    // Afficher toutes les habitations
    public function afficherHabitations() {
        $habitations = $this->habitatModel->getAllHabitats(); 
        Flight::render('listeHabitation', ['habitations' => $habitations]);
    }
    
    public function afficherDetailsHabitat($idHabitat) {
        if (!is_numeric($idHabitat)) {
            Flight::render('error', ['message' => 'ID d\'habitat invalide.']);
            return;
        }
    
        $habitat = $this->habitatModel->getHabitatById($idHabitat);
    
        if ($habitat) {
            $photos = explode(',', $habitat['photo_urls']); // Convertir la liste des photos en tableau
            Flight::render('detailsHabitat', ['habitat' => $habitat, 'photos' => $photos]);
        } else {
            Flight::render('error', ['message' => 'Habitation non trouvée.']);
        }
    }

    // public function afficherDetailsHabitat($idHabitat) {
    //     echo "Contrôleur OK - ID reçu : " . htmlspecialchars($idHabitat);
    //     die(); // Tester si la méthode est bien appelée
    // }
    
    
    
}
