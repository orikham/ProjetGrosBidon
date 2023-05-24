<?php

//require_once 'UserModel.php';
require_once 'vendor/autoload.php';

class UserController extends Controller
{
    public function registerUser()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $mail = $_POST['mail'];
            $birthdate = $_POST['birthdate'];
    
            $userData = [
                'pseudo' => $pseudo,
                'password' => $password,
                'mail' => $mail,
                'birthdate' => $birthdate
            ];
    
            $model = new UserModel();
            $model->createUser($userData);
    
            exit(); // Terminer l'exécution après la création de l'utilisateur
        } else {
            // Afficher le formulaire d'inscription
            $this->setRender('FormulaireInscription.html.twig', []);
        }
        

        
    }






    public function login(){
        
        if(!$_POST){
            echo self::getRender('FormulaireInscription.html.twig', []);
        } else {
            $mail = $_POST['mail'];
            

            $model = new UserModel();
            $user = $model->getUserByUserID($mail);
            
            if($user){
                $password = $_POST['password'];

               if(password_verify($password, $user->getPassword()))
                {
                    $_SESSION['mail'] = $user->getMail();
                    $_SESSION['pseudo'] = $user->getPseudo();


               }
            } else{
                $message = "identifiant / mot de passe incorrect !!!!!!!!!!!";
                echo self::getRender('FormulaireInscription.html.twig', ['message' => $message]);
            }
        }

        

        

    }
}
