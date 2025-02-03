<?php
namespace app\controllers;
use Flight;

class BaseController{
    public function __construct() {
        
    }

    public function goToPage($page){
        Flight::render($page);
    }
}