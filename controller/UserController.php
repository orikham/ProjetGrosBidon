<?php

require_once 'UserModel.php';
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
            $link = $router->generate('account');

            header('Location:' . $link);
            exit();
        }
    }
}
