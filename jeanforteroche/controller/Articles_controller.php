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

    //Ajout de l'article
    public function addArticle()
    {

        $articlesModel = new Articles();
        $title = $_POST['title'];
        $sentence = $_POST['sentence'];
        $content = $_POST['content'];

        $addArticle = $articlesModel->postArticle($title, $sentence, $content);
        require 'view/backAddArticles_view.php';
    }

    //Suppression de l'article
    public function deleteArticle()
    {
        $articlesModel = new Articles();
        $article = $articlesModel->deleteArticle($_GET['id']);

        header('Location: index.php?action=back');
        $this->setFlash("Article supprimé", 'red');
    }
}
