<?php
namespace app\controllers;
use Flight;

class loginAdminController extends BaseController {
    public function goTologinAdmin(){
        Flight::render('loginAdmin.php', ['title' => 'LiveSpace']);
    }
    
}