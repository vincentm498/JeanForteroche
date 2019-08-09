<?php

namespace JeanForteroche\controller;

use JeanForteroche\controller\Controller_controller;
use JeanForteroche\model\Articles;
use JeanForteroche\model\Comments;

class Articles_controller extends Controller_controller
{
    //Affichage de la home
    public function homeView()
    {
        $this->test();
        $articlesModel = new Articles();
        $articlesModel->getAllArticles();
        $lastArticles = $articlesModel->getLastArticles();
        $articles = $articlesModel->getAllArticles();

        // Affichage
        require 'view/home_view.php';
    }

    //Affichage de la page roman
    public function romanView()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();

        // Affichage
        require 'view/roman_view.php';
    }

    //Affichage de l'article
    public function articleView()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();
        $article = $articlesModel->getArticle($_GET['id']);

        $commentsModel = new Comments();
        $comments = $commentsModel->getAllComments($_GET['id']);

        // Affichage
        require 'view/article_view.php';
    }
}

// function mentionsView()
// {
//     // Affichage
//     require 'view/mentions_view.php';
// }

// function formConnect()
// {
//     $articlesModel = new \Blog\Articles();
//     $articles = $articlesModel->getAllArticles();

//     // Affichage
//     require 'view/form_view.php';
// }
