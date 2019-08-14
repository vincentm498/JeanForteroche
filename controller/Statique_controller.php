<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Articles;

class Statique_controller
{
    // Affichage de la page des mentions légales.
    public function mentionsView()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();

        // Affichage
        require 'view/mentions_view.php';
    }
}
