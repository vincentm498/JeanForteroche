<?php


// function homeView()
// {

//     $articlesModel = new \Blog\Model\Articles_model();
//     $lastArticles = $articlesModel->getLastArticles();
//     $articles = $articlesModel->getAllArticles();

//     // Affichage
//     require 'view/home_view.php';
// }

function homeView()
{
    $articlesModel = new Articles();
    $lastArticles = $articlesModel->getLastArticles();
    $articles = $articlesModel->getAllArticles();

    // Affichage
    require 'view/home_view.php';
}

function romanView()
{
    $articlesModel = new Articles();
    $articles = $articlesModel->getAllArticles();

    // Affichage
    require 'view/roman_view.php';
}

function articleView()
{

    $articlesModel = new Articles();
    $articles = $articlesModel->getAllArticles();
    $article = $articlesModel->getArticle($_GET['id']);

    $commentsModel = new Comments();
    $comments = $commentsModel->getAllComments($_GET['id']);

    // Affichage
    require 'view/article_view.php';
}

function mentionsView()
{
    // Affichage
    require 'view/mentions_view.php';
}
