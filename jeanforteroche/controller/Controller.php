<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Articles;


class Controller
{
    public function __construct()
    {
        $this->articlesfooter = $this->getallarticlefooter();
    }
    // Affichage de la page des mentions légales.
    public function mentionsView()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();

        // Affichage
        require 'view/mentions-view.php';
    }

    // Ouverture d'une session
    public function setFlash($message, $color = "white")
    {
        $_SESSION['flash'] = [
            "color"     => $color,
            "message"   => $message

        ];
    }

    public function getallarticlefooter()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();
        return $articles;
    }

    public function controleBack()
    {

        if ($_SESSION['membreGroupe'] == 1) { } else {

            header('Location: index.php?action=connexion&id=' .  $_GET['id']);
        }
    }
}
