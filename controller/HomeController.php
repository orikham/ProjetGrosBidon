<?php

require_once 'vendor/autoload.php';
class HomeController extends Controller{

    public function TemplateIndex(){

        echo self::getTwig()->render('Header.html.twig');

    }

    

}