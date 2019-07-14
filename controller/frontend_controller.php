<?php

// Chargement des classes
require_once('model/Articles_model.php');

function homeView(){

    $lastArticles = getLastArticles();
    $articles = getAllArticles();
    
    // Affichage
    require 'view/home_view.php';
}

function articleView(){

    $articles = getAllArticles();
    $article = getArticle($_GET['id']);
    
    // Affichage
    require 'view/article_view.php';
}





