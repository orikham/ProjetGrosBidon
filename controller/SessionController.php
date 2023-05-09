<?php

class SessionController {
    private $session_manager;
    private $session_view;

    public function __construct($session_manager, $session_view) {
        $this->session_manager = $session_manager;
        $this->session_view = $session_view;
    }

    public function createSession($user, $data) {
        $session_id = $this->session_manager->createSession($user, $data);
        $this->session_view->showMessage("Session créée avec succès.");
        return $session_id;
    }

    public function deleteSession($session_id) {
        $this->session_manager->deleteSession($session_id);
        $this->session_view->showMessage("Session supprimée avec succès.");
    }

    public function UpdateSessionData($session_id, $new_data) {
        $session = $this->session_manager->getSession($session_id);
        if ($session) {
            $session->UpdateSessionData($new_data);
            $this->session_view->showMessage("Données de session mises à jour avec succès.");
            $this->session_view->showSessionData($session);
        } else {
            $this->session_view->showMessage("Session introuvable.");
        }
    }
}
