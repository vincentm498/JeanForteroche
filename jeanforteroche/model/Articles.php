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
    public function postArticle($title, $sentence, $content, $uploadfile)
    {

        $db = $this->dbConnect();
        $article = $db->prepare('INSERT INTO articles(title, sentence, content, date_post, lien_image1) VALUES(?, ?, ?, NOW(), ?)');
        $article->execute(array($title, $sentence, $content, $uploadfile));
    }

    // Supprimer  l'article
    public function deleteArticle($id)
    {

        $db = $this->dbConnect();
        $article = $db->prepare('DELETE FROM articles WHERE id = ?');
        $article->execute(array($id));
        $comment = $db->prepare('DELETE FROM post WHERE post_id = ?');
        $comment->execute(array($id));
    }

    // Modifs de  l'article
    public function modifArticle($id)
    {

        $db = $this->dbConnect();
        $article = $db->prepare('SELECT * FROM articles WHERE id = ?');
        $article->execute(array($id));

        return $article->fetch();
    }

    // Update de  l'article
    public function updateArticle($id, $title, $sentence, $content, $uploadfile)
    {

        $db = $this->dbConnect();
        $article = $db->prepare('UPDATE `articles` 
        SET `title`="' . $title . '",
        `sentence`="' . $sentence . '",
        `content`="' . $content . '",
        `lien_image1`="' . $uploadfile . '"
        WHERE id = ?');
        $article->execute(array($id));
    }
}
