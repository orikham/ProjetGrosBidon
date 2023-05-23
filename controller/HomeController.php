<?php

require_once 'vendor/autoload.php';
class HomeController extends Controller{

    public function TemplateIndex(){

        echo self::getTwig()->render('HomePage.html.twig');

    }

    public function RegistrationLogin(){
        global $router;

        $link = $router->generate('account');

        echo self::getTwig()->render('FormulaireInscription.html.twig');

    }

    

}