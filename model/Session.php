<?php


class Session {
    private $session_id;
    private $user;
    private $data;

    public function __construct($session_id, $user, $data) {
        $this->session_id = $session_id;
        $this->user = $user;
        $this->data = $data;
    }

    // Méthodes pour manipuler les données de session
    public function updatedata ($new_data) {
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

    private function createSessionId() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $session_id = '';
    
        // Générer un identifiant de session aléatoire de la longueur souhaitée
        $length = 10;
        $characters_length = strlen($characters);
    
        for ($i = 0; $i < $length; $i++) {
            $session_id .= $characters[rand(0, $characters_length - 1)];
        }
    
        return $session_id;
    }

    public function createSession($user, $data) {
        $session_id = $this->createSessionId();  // Générer un identifiant de session unique
        $session = new Session($session_id, $user, $data);
        $this->sessions[$session_id] = $session;
        return $session_id;
    }

    public function deleteSession($session_id) {
        if (isset($this->sessions[$session_id])) {
            unset($this->sessions[$session_id]);
        }
    }

    public function getSession($session_id) {
        return isset($this->sessions[$session_id]) ? $this->sessions[$session_id] : null;
    }
}
