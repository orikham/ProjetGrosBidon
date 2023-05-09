<?php

class SessionView {
    public function afficherMessage($message) {
        echo $message . PHP_EOL;
    }

    public function afficherDonneesSession($session) {
        echo "Session ID: " . $session->getSessionId() . PHP_EOL;
        echo "User: " . $session->user . PHP_EOL;
        echo "Data: " . $session->data . PHP_EOL;
    }
}