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
        $this->setFlash("Article ajouté", 'green');
        require 'view/backAddArticles_view.php';
    }

    //Suppression de l'article
    public function deleteArticle()
    {
        $articlesModel = new Articles();
        $article = $articlesModel->deleteArticle($_GET['id']);

        header('Location: index.php?action=backArticles');
        $this->setFlash("Article supprimé", 'red');
    }

    //Modification de l'article
    public function modifArticle()
    {
        $articlesModel = new Articles();
        $article = $articlesModel->modifArticle($_GET['id']);

        require 'view/backUpdateArticles_view.php';
    }

    //Mise à jour de l'article
    public function updateArticle()
    {
        $articlesModel = new Articles();
        $title = $_POST['title'];
        $sentence = $_POST['sentence'];
        $content = $_POST['content'];
        $article = $articlesModel->updateArticle($_GET['id'], $title, $sentence, $content);

        $this->setFlash("Article modifié", 'green');
        header('Location: index.php?action=backArticles');
    }
}
