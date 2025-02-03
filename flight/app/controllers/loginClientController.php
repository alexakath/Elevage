<?php
namespace app\controllers;
use Flight;

class loginClientController extends BaseController {
    public function goTologinClient(){
        Flight::render('loginClient.php', ['title' => 'LiveSpace']);
    }
    public function goTosignUpClient(){
        Flight::render('signUpClient.php', ['title' => 'LiveSpace']);
    }
}