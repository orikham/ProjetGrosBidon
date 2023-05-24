<?php


// require_once './NewUser.php';

class UserModel extends ConnexionDb
{
    //inscriptions

    public function createUser(array $userData)
    {



        $pseudo = $userData['pseudo'];
        $mail = $userData['mail'];

        // Vérification du pseudo
        $stmt = $this->getDb()->prepare("SELECT COUNT(`pseudo`) FROM `user` WHERE `pseudo` = ?");
        $stmt->execute([$pseudo]);
        $pseudoExists = $stmt->fetchColumn();

        // Vérification de l'adresse e-mail
        $stmt = $this->getDb()->prepare("SELECT COUNT(`mail`) FROM `user` WHERE `mail` = ?");
        $stmt->execute([$mail]);
        $mailExists = $stmt->fetchColumn();

        if ($pseudoExists > 0) {
            // Gérer le cas où le pseudo existe déjà
            self::getRender('FormulaireInscription.html.twig', ['message' => 'Le pseudo existe déjà, veuillez en choisir un autre.']);
            exit();
        } elseif ($mailExists > 0) {
            // Gérer le cas où l'adresse e-mail existe déjà
            self::getRender('FormulaireInscription.html.twig', ['message' => 'L\'adresse e-mail existe déjà, veuillez en choisir une autre.']);
            exit();
        } else {
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

            // Afficher la pop-up de félicitations
            self::getRender('FormulaireInscription.html.twig', ['message' => 'Félicitations, vous êtes inscrit !']);
            exit();
        }
    }


    //connexion

    public function getUserByUserID(string $mail)
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