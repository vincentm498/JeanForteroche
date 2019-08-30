<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Articles;

class Controller
{
    // Affichage de la page des mentions légales.
    public function mentionsView()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();

        // Affichage
        require 'view/mentions_view.php';
    }

    // Ouverture d'une session
    public function setFlash($message, $color = "white")
    {
        $_SESSION['flash'] = [
            "color"     => $color,
            "message"   => $message

        ];
    }
}
