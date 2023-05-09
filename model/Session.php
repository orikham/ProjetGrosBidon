<?php


class Session {
    private $session_id;
    private $user;
    private $data;

    public function __construct($session_id, $utilisateur, $data) {
        $this->session_id = $session_id;
        $this->user = $utilisateur;
        $this->data = $data;
    }

    // Méthodes pour manipuler les données de session
    public function mettreAJourDonnees($new_data) {
        $this->data = $new_data;
    }

    // Getter pour l'identifiant de session
    public function getSessionId() {
        return $this->session_id;
    }
}

class SessionManager {
    private $sessions;

    public function __construct() {
        $this->sessions = array();
    }

    public function creerSession($utilisateur, $donnees) {
        $session_id = createSessionId();  // Générer un identifiant de session unique
        $session = new Session($session_id, $utilisateur, $donnees);
        $this->sessions[$session_id] = $session;
        return $session_id;
    }

    public function supprimerSession($session_id) {
        if (isset($this->sessions[$session_id])) {
            unset($this->sessions[$session_id]);
        }
    }

    public function obtenirSession($session_id) {
        return isset($this->sessions[$session_id]) ? $this->sessions[$session_id] : null;
    }
}
