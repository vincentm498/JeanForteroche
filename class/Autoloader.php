
<?php


// Ajout de l'autoloader
class Autoloader
{

    static function register()
    {
        spl_autoload_register(function ($classe) {
            require 'class/' . $classe . '.php';
        });
    }
}
