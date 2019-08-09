<?php

namespace JeanForteroche;
// Ajout de l'autoloader
class Autoloader
{

    static function register()
    {
        spl_autoload_register(function ($classe) {
            $classe = str_replace('JeanForteroche\\', '', $classe);
            require 'model/' . $classe . '.php';
        });
    }
}
