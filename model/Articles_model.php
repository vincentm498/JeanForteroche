<?php

require_once("model/Connect_model.php");

// Renvoie la liste de tous les articles
function getAllArticles() 
{
    $db = dbConnect();
    $articles = $db->query('SELECT * FROM articles ORDER BY id ASC');

    return $articles;
}

// Renvoie la liste des deux derniers articles
function getLastArticles() 
{
    $db = dbConnect();
    $lastArticles = $db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 2');

    return $lastArticles;
}

// Renvoie l'article
function getArticle($id) 
{
    $db = dbConnect();
    $article = $db->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($id));

    return $article->fetch();
}