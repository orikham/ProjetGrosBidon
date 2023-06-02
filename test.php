//$model




class UserModel extends ConnexionDb
{
    //inscriptions

    public function createUser(array $userData)
    {



        $pseudo = $userData['pseudo'];
    $mail = $userData['mail'];

    $stmt = $this->getDb()->prepare("SELECT COUNT('pseudo') FROM `user` WHERE `pseudo` = ?");
    $stmt->execute([$pseudo]);
    $pseudoExists = $stmt->fetchColumn();

    $stmt = $this->getDb()->prepare("SELECT COUNT('mail') FROM `user` WHERE `mail` = ?");
    $stmt->execute([$mail]);
    $mailExists = $stmt->fetchColumn();

    if ($pseudoExists >= 1) {
        // Pseudo already exists
        $message = 'Pseudo déjà utilisé';
    } elseif ($mailExists >= 1) {
        // Email already exists
        $message = 'Adresse e-mail déjà utilisée';
    } else {
        $newUser = new NewUser($userData);
        $id = $newUser->getId();
        $password = $newUser->getPassword();
        $birthdate = $newUser->getBirthdate();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->getDb()->prepare("INSERT INTO `user` (`id_user`, `pseudo`, `password`, `mail`, `birthdate`) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id, $pseudo, $hashedPassword, $mail, $birthdate]);


            
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


}






//controller


class UserController extends Controller
{
    public function registerUser()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];
        $birthdate = $_POST['birthdate'];
        

// Les vérifications sont réussies, procéder à la création de l'utilisateur
        $userData = [
            'pseudo' => $pseudo,
            'password' => $password,
            'mail' => $mail,
            'birthdate' => $birthdate
        ];


        $model = new UserModel();
        $model->createUser($userData);

        

        

        

        

        // Afficher la pop-up de félicitations
        $this->setRender('FormulaireInscription.html.twig', ['message' => 'Félicitations, vous êtes inscrit !']);
        exit(); // Terminer l'exécution après la création de l'utilisateur
    } else {
        // Afficher le formulaire d'inscription
        $this->setRender('FormulaireInscription.html.twig', []);
    }
}