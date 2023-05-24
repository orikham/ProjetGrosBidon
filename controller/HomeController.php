<?php

require_once 'vendor/autoload.php';
class HomeController extends Controller{

    public function TemplateIndex(){
        global $router;

        
        echo self::getRender('HomePage.html.twig', []);

    }

    

    


}