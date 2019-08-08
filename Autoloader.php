<?php

namespace Blog;
// Ajout de l'autoloader
class Autoloader
{

    static function register()
    {
        spl_autoload_register(function ($classe) {
            $classe = str_replace('Blog\\', '', $classe);
            require 'model/' . $classe . '.php';
        });
    }
}
