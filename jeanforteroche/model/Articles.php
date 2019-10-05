<?php

namespace JeanForteroche\model;

class Articles extends Connect
{
    //Renvoie la liste de tous les articles
    public function getAllArticles()
    {
        $db = $this->dbConnect();
        $articles = $db->query('SELECT * FROM articles ORDER BY id ASC');

        return $articles->fetchAll();
    }

    // Renvoie la liste des deux derniers articles
    public function getLastArticles()
    {
        $db = $this->dbConnect();
        $lastArticles = $db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 2');

        return $lastArticles->fetchAll();
    }

    // Renvoie l'article
    public function getArticle($id)
    {
        $db = $this->dbConnect();
        $article = $db->prepare('SELECT * FROM articles WHERE id = ?');
        $article->execute(array($id));

        return $article->fetch();
    }

    // Ajoute l'article
    public function postArticle($title, $sentence, $content)
    {

        $db = $this->dbConnect();
        $article = $db->prepare('INSERT INTO articles(title, sentence, content, date_post) VALUES(?, ?, ?, NOW())');
        //INSERT INTO articles(title, sentence, content, date_post) VALUES('test2', 'test2', 'test2', NOW())
        $article->execute(array($title, $sentence, $content));

        //return $db->lastInsertId();
    }

    // Supprimer  l'article
    public function deleteArticle($id)
    {

        $db = $this->dbConnect();
        $article = $db->prepare('DELETE FROM articles WHERE id = ?');
        $article->execute(array($id));
    }
}
