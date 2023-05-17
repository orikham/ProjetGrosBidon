<?php

require_once 'UserModel.php';
require_once 'vendor/autoload.php';

class UserController extends Controller
{
    public function registerUser()
    {
        if (isset($_POST['submit'])) {
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

            

            $userModel = new UserModel();
            $userModel->createUser($userData);

            header('Location: MonCompte.html.twig');
            exit;
        }
    }
}
