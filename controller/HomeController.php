<?php
class HomeController extends Controller{

    public function TemplateIndex(){

        echo self::getTwig()->render('TemplateIndex.html.twig');

    }

    

}