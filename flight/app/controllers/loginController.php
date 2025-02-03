<?php
namespace app\controllers;
use Flight;

class loginController extends BaseController {
    public function goTologinController(){
        Flight::render('login.php', ['title' => 'LiveSpace']);
    }

}