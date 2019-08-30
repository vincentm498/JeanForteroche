<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Articles;
use JeanForteroche\model\Comments;

class Articles_controller extends Controller
{
    //Affichage de la home, deux derniers articles
    public function homeView()
    {
        $articlesModel = new Articles();
        $lastArticles = $articlesModel->getLastArticles();
        $articles = $articlesModel->getAllArticles();

        // Affichage
        require 'view/home_view.php';
    }

    //Affichage de la page roman, tous les articles.
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



// function formConnect()
// {
//     $articlesModel = new \Blog\Articles();
//     $articles = $articlesModel->getAllArticles();

//     // Affichage
//     require 'view/form_view.php';
// }
