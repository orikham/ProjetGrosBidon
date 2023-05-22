<?php

require_once 'ConnexionDb.php';
require_once 'NewUser.php';

class UserModel extends ConnexionDb
{
    public function createUser(array $userData)
    {
        $newUser = new NewUser($userData);

        $pseudo = $newUser->getPseudo();
        $password = $newUser->getPassword();
        $mail = $newUser->getMail();
        $birthdate = $newUser->getBirthdate();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $dbgrosbidon = $this->getDb();
        $stmt = $dbgrosbidon->prepare("INSERT INTO `user` (`pseudo`, `password`, `mail`, `birthdate`) VALUES ($pseudo, $hashedPassword, $mail, $birthdate)");
        $stmt->execute([$pseudo, $hashedPassword, $mail, $birthdate]);
    }
}
