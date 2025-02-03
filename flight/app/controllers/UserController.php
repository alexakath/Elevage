<?php 
namespace app\controllers ;
use Flight;
use  app\models\UserModel;
class UserController {
  
    public function __construct() {
		
	}
    public function CheckLogin(){
        if( Flight::userModel()->authenticateUser($_POST['email'],$_POST['pwd'])['rowCount'] > 0){
            $id = ['id_user'=>Flight::userModel()->authenticateUser($_POST['email'],$_POST['pwd'])['data']['id_user']] ;
            session_start() ;
            $_SESSION['id_user'] = $id['id_user'] ;
            Flight::render('client',$id) ;
        }
        else{
            session_destroy() ;
            $error= ['error'=> 1] ;
            Flight::render('login',$error) ;
        }  
    }
    public function AddUser(){
        $email = $_POST['email'] ; 
        $pwd = $_POST['pswd'] ; 
        $nom = $_POST['name'] ;
        $prenom = $_POST['firstname'] ;
        
        if(!Flight::userModel()->checkEmailExists($email)){
            Flight::userModel()->addUser($nom,$prenom,$email,$pwd,0) ;
            $id = ['id_user'=> Flight::userModel()->findUserIdByEmail($email)] ;
            session_start() ;
            $_SESSION['id_user'] = $id['id_user'] ;
            Flight::render('client',$id) ;
        }
        else{
            if (session_status() != PHP_SESSION_NONE) {
                session_destroy();  // Démarrer la session si elle n'est pas déjà active
            }
            $error= ['mailE'=> 2] ;
            Flight::render('login',$error) ;
        }  
        

    }
    public function FaireUnDepot(){
        session_start() ;
        $idc = $_SESSION['id_user'];
        $argent = $_GET['montant'] ;
        $depot = Flight::userModel()->getUserById($idc)['depot'] ;
        Flight::userModel()->updateDepot($idc,$argent+$depot) ;
        $argent = Flight::userModel()->getUserById($idc)['depot'] ;
        $argentfinal = ['depot'=>$argent] ;
        Flight::render('depot',$argentfinal) ;

    }

   			
}
?>       