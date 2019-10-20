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

        $this->controleBack();
        require 'view/backoffice/back-view.php';
    }

    public function backArticles()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();

        $this->controleBack();
        require 'view/backoffice/articles-view.php';
    }
}
