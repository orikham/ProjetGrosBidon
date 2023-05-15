<?php
session_start();

require_once './vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';


$router = new AltoRouter();
$router->setBasePath('/projet/projetGrosBidon');

$router->map( 'GET', '/', 'HomeController#TemplateIndex', 'home' );


$match = $router->match();



if(is_array($match)){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
    }
}