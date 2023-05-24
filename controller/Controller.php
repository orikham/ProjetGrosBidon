<?php
abstract class Controller{

    private static $loader;
    private static $twig;
    private static $render;

    private static function getLoader(){

        if (self::$loader === null) {
            self::$loader = new \Twig\Loader\FilesystemLoader('./view');
        }
        return self::$loader;

        

        

    }

    protected static function getTwig(){

        if (self::$twig === null) {
            self::$twig = new \Twig\Environment(self::getLoader());
            self::$twig->addGlobal('session', $_SESSION);
            self::$twig->addExtension(new \Twig\Extension\DebugExtension());
        }
        return self::$twig;

        

       
        

    }

    protected static function setRender(string $template, $datas){
        global $router;
        //LINKS
        $link = $router->generate('home');
        $link2 = $router->generate('register');
        $link3 = $router->generate('login');
        // CATEGORIES
        //  $categories  = new UserModel();
        //  $newUserstart  = $categories->createUser();

        $new = [
            
            'link' => $link,
            'link2' => $link2,
            'link3' => $link3
        ] + $datas;
        echo self::getTwig()->render($template, $new);
    }

    protected static function getRender($template, $datas)
    {
        if (self::$render === null) {
            self::setRender($template, $datas);
        }
        return self::$render;
    }


    

}