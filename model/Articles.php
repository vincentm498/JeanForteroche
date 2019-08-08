<?php


class Articles
{
    //Renvoie la liste de tous les articles
    public function getAllArticles()
    {
        echo 'ok';
        // $db = $this->dbConnect();
        // $articles = $db->query('SELECT * FROM articles ORDER BY id ASC');

        // return $articles->fetchAll();
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
}
