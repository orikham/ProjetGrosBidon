<?php

//require_once 'UserModel.php';
require_once 'vendor/autoload.php';

class UserController extends Controller
{
    public function registerUser()
    {
        
        if (isset($_POST['submit'])) {

            global $router;
            
            $model = new UserModel();


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

            
            
            $model->createUser($userData);
            $link2 = $router->generate('register');
           
            echo self::getRender('FormulaireInscription.html.twig',[]);
            
            exit();
        }else{
            echo self::getRender('FormulaireInscription.html.twig', []);
        }

        
    }




    public function login(){
        
        if(!$_POST){
            echo self::getRender('FormulaireInscription.html.twig', []);
        } else {
            $id = $_POST[''];
            

            $model = new UserModel();
            $user = $model->getUserByUserID($id);
            
            if($user){
                $password = $_POST['password'];

               if(password_verify($password, $user->getPassword()))
                {
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['pseudo'] = $user->getPseudo();


               }
            } else{
                $message = "identifiant / mot de passe incorrect !!!!!!!!!!!";
                echo self::getTwig()->render('FormulaireInscription.html.twig', ['message' => $message]);
            }
        }

        

        

    }
}
