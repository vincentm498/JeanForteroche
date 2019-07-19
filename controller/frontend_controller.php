<?php

// Chargement des classes
require_once('model/Articles_model.php');
require_once('model/Comments_model.php');

function homeView()
{

    $articlesModel = new \Blog\Model\Articles_model();
    $lastArticles = $articlesModel->getLastArticles();
    $articles = $articlesModel->getAllArticles();

    // Affichage
    require 'view/home_view.php';
}


function romanView()
{
    $articlesModel = new \Blog\Model\Articles_model();
    $articles = $articlesModel->getAllArticles();
    $tests = $articlesModel->getAllArticles();
    // Affichage
    require 'view/roman_view.php';
}

function articleView()
{

    $articlesModel = new \Blog\Model\Articles_model();
    $articles = $articlesModel->getAllArticles();
    $article = $articlesModel->getArticle($_GET['id']);

    $commentsModel = new \Blog\Model\Comments_model();
    $comments = $commentsModel->getAllComments($_GET['id']);

    // Affichage
    require 'view/article_view.php';
}
