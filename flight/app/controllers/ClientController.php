<?php 
namespace app\controllers;
use Flight;
use app\models\ClientModel;

class ClientController {
  
    public function __construct() {
        // Ton constructeur
    }

    public function CheckLogin(){
        $clientModel = Flight::clientModel(); // Appel à Flight::clientModel() pour obtenir l'instance
    
        // Utilisation de la méthode authenticateUser() du ClientModel
        if ($clientModel->authenticateUser($_POST['nom'], $_POST['email'], $_POST['pwd'], $_POST['tel'])['rowCount'] > 0) {
            $id = ['idClient' => $clientModel->authenticateUser($_POST['nom'], $_POST['email'], $_POST['pwd'], $_POST['tel'])['data']['idClient']];
            session_start();
            $_SESSION['idClient'] = $id['idClient'];
            Flight::render('listeHabitation', $id);
        } else {
            // Vérifier si la session est démarrée avant de la détruire
            if (session_status() == PHP_SESSION_ACTIVE) {
                session_destroy();
            }
            $error = ['error' => 1];
            Flight::render('loginClient', $error);
        }  
    }
    

    public function AddUser(){
        $clientModel = Flight::clientModel(); // Appel à Flight::clientModel() pour obtenir l'instance

        $email = $_POST['email']; 
        $pwd = $_POST['pwd']; 
        $nom = $_POST['nom'];
        $tel = $_POST['tel'];
        
        if (!$clientModel->checkEmailExists($email)) {
            $clientModel->addUser($nom, $email, $pwd, $tel, 0);
            $id = ['idClient' => $clientModel->findUserIdByEmail($email)];
            session_start();
            $_SESSION['idClient'] = $id['idClient'];
            Flight::render('loginClient', $id);
        } else {
            if (session_status() != PHP_SESSION_NONE) {
                session_destroy();  // Démarrer la session si elle n'est pas déjà active
            }
            $error = ['mailE' => 2];
            Flight::render('login', $error);
        }
    }
}
?>
