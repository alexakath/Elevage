<?php

use app\controllers\ApiExampleController;
use app\controllers\loginController;
use app\controllers\loginAdminController;
use app\controllers\loginClientController;
use app\controllers\ClientController;
use app\controllers\AdminController;
use app\controllers\HabitatController;
use app\controllers\ReservationController;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$db = new PDO('mysql:host=localhost:3306;dbname=Agence_immobilier;charset=utf8', 'root', '');

// Création des contrôleurs
$login = new loginController();
$loginAdmin = new loginAdminController();
$loginClient = new loginClientController();
$client = new ClientController();
$admin = new AdminController();
$habitat = new HabitatController($db);
$reservation = new ReservationController($db);

// Définition des routes
$router->get('/', [$login, 'goTologinController']);
$router->get('/loginAdmin', [$loginAdmin, 'goTologinAdmin']);
$router->get('/loginClient', [$loginClient, 'goTologinClient']);
$router->get('/signUpClient', [$loginClient, 'goTosignUpClient']);
$router->post('/loginClient', [$client, 'AddUser']);
$router->post('/listehabitation', [$client, 'CheckLogin']);
$router->post('/homeAdmin', [$admin, 'CheckLoginAdmin']); // Vérifie l'authentification
$router->get('/dashboardAdmin', [$admin, 'homeAdmin']);  // Affiche la page d'administration
$router->get('/login', function() {
    Flight::render('login'); // Affiche la page de login
});
$router->get('/pageaccueil', [$habitat, 'afficherHabitations']); // Liste des habitations
$router->get('/detailsHabitat/@id', [$habitat, 'afficherDetailsHabitat']); // Détails d'une habitation

// Gestion des réservations
$router->get('/reservationFormulaire/@idHabitat', [$reservation, 'afficherFormulaireReservation']); // Formulaire réservation
$router->post('/traiterReservation', [$reservation, 'traiterReservation']); // Traitement de la réservation

// Confirmation de la réservation
$router->get('/confirmationReservation', function() {
    Flight::render('confirmationReservation'); // Affiche la page de confirmation après réservation
});

// Vous pouvez ajouter d'autres routes ici, par exemple pour gérer les erreurs
// $router->get('/error', function() {
//     Flight::render('error'); // Affiche une page d'erreur générique
// });
