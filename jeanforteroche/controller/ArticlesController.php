<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Articles;
use JeanForteroche\model\Comments;

class ArticlesController extends Controller
{
    //Affichage de la home, deux derniers articles
    public function homeView()
    {
        $articlesModel = new Articles();
        $lastArticles = $articlesModel->getLastArticles();
        $articles = $articlesModel->getAllArticles();

        // Affichage
        require 'view/home-view.php';
    }

    //Affichage de la page roman, tous les articles.
    public function romanView()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();

        // Affichage
        require 'view/roman-view.php';
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
        require 'view/article-view.php';
    }

    //Affichae du nouvel l'article
    public function addArticle()
    {
        require 'view/backoffice/add-articles-view.php';
    }

    //Ajout de l'article
    public function addArticleSubmit()
    {

        $articlesModel = new Articles();
        $title = $_POST['title'];
        $sentence = $_POST['sentence'];
        $content = $_POST['content'];


        $uploaddir = "./assets/images/";
        $uploadfile       = $uploaddir . basename($_FILES['userfile']['name']);
        $movefile = move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

        $addArticle = $articlesModel->postArticle($title, $sentence, $content, $uploadfile);
        $this->setFlash("Article ajouté", 'green');
        require 'view/backoffice/add-articles-view.php';
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

        require 'view/backoffice/update-articles-view.php';
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
