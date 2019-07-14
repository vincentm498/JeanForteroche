<?php

namespace Blog\Model;

require_once("model/Connect_model.php");

class Articles_model extends Connect_model{

    // Renvoie la liste de tous les articles
    function getAllArticles() 
    {
        $db = $this->dbConnect();
        $articles = $db->query('SELECT * FROM articles ORDER BY id ASC');

        return $articles;
    }

    // Renvoie la liste des deux derniers articles
    function getLastArticles() 
    {
        $db = $this->dbConnect();
        $lastArticles = $db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 2');

        return $lastArticles;
    }

    // Renvoie l'article
    function getArticle($id) 
    {
        $db = $this->dbConnect();
        $article = $db->prepare('SELECT * FROM articles WHERE id = ?');
        $article->execute(array($id));

        return $article->fetch();
    }

}
