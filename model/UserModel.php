<?php


//require_once 'NewUser.php';

class UserModel extends ConnexionDb
{
    //inscriptions

    public function createUser(array $userData)
    {
        $newUser = new NewUser($userData);

        $id = $newUser->getId();
        $pseudo = $newUser->getPseudo();
        $password = $newUser->getPassword();
        $mail = $newUser->getMail();
        $birthdate = $newUser->getBirthdate();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $dbgrosbidon = $this->getDb();
        $stmt = $dbgrosbidon->prepare("INSERT INTO `user` (`id_user`, `pseudo`, `password`, `mail`, `birthdate`) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id, $pseudo, $hashedPassword, $mail, $birthdate]);
    }


    //connexion

    public function getUserByUserID(String $mail)
    {
        $req = $this->getDb()->prepare('SELECT `id_user`, `pseudo`, `password`, `mail`, `birthdate` FROM `user` WHERE `mail`= :mail');
        $req->bindParam('mail', $mail, PDO::PARAM_STR);
        $req->execute();
        return $req->rowCount() === 1 ? new NewUser($req->fetch(PDO::FETCH_ASSOC)) : false;
        

        // $req->closeCursor();


    }













    // public function getOneUserByMail(Int $id)
    // {
    //     $req = $this->getDb()->prepare('SELECT `id_user`, `pseudo`, `password`, `mail`, `birthdate` FROM `user` WHERE `id_user` = :id');
    //     $req->bindParam('id', $id, PDO::PARAM_INT);
    //     $req->execute();

    //     return $req->rowCount() === 1 ? new NewUser($req->fetch(PDO::FETCH_ASSOC)) : false;
    // }



}
