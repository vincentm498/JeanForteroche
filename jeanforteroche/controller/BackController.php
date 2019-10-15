<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Articles;
use JeanForteroche\model\Comments;


class BackController extends Controller
{

    public function dashboard()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();
        $commentsModel = new Comments();
        $comments = $commentsModel->getAllCommentsBlog();

        if ($_SESSION['membreGroupe'] == 1) {
            require 'view/backoffice/back-view.php';
        } else {

            header('Location: index.php?action=connexion');
        }
    }

    public function backArticles()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();

        require 'view/backoffice/articles-view.php';
    }
}
