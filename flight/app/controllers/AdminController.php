<?php 
namespace app\controllers;
use Flight;
use app\models\AdminModel;

class AdminController {
  
    public function __construct() {
        // Ton constructeur
    }

    public function CheckLoginAdmin()
{
    // Récupérer les données du formulaire
    $email = $_POST['email'] ?? '';
    $password = $_POST['pass'] ?? '';

    // Vérifier les identifiants (exemple simple, à adapter avec la BDD)
    if ($email === "admin@gmail.com" && $password === "admin123") {
        // Redirection vers la page d'administration
        header("Location: /dashboardAdmin");
        exit;
    } else {
        echo "Identifiants incorrects.";
    }
}

public function homeAdmin()
{
    // Tu peux ici passer des variables ou des données à la vue si nécessaire
    Flight::render('homeAdmin');
}



    
}
?>
