<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Articles;
use JeanForteroche\model\Comments;


class Back_controller extends Controller
{

    public function dashboard()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();
        $commentsModel = new Comments();
        $comments = $commentsModel->getAllCommentsBlog();
        // var_dump($comments);
        // exit;
        // Affichage
        require 'view/back_view.php';
    }

    public function backArticles()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();

        // var_dump($articles);
        // exit;
        // Affichage
        require 'view/backArticles_view.php';
    }

    // public function AddArticles()
    // {

    //     $commentsModel = new Comments();
    //     $comments = $commentsModel->getAllCommentsArticleValidate();


    //     // var_dump($articles);
    //     // exit;
    //     // Affichage
    //     require 'view/backAddArticles_view.php';
    // }
}
