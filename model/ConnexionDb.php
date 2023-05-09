<?php
abstract class ConnexionDb{
    private static $dbgrosbidon;

    //on se connecte a la base de données

    private static function setDb(){
        try {
            self::$dbgrosbidon = new PDO('mysql:host=localhost;dbname=grosbidon;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            echo "Erreur :" . $e->getMessage();
        
        }
    }

    protected function getDb()
    {
        if (self::$dbgrosbidon == null) {
            self::setDb();
        }
        return self::$dbgrosbidon;
    }
}