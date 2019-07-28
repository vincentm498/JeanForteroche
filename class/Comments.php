<?php

namespace Blog;

require_once("class/Connect.php");

class Comments extends Connect
{
    // Renvoie la liste de tous les commentaires de l'article
    public function getAllComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT *
        FROM post as p
        INNER JOIN members as m ON m.id = p.members_id
        WHERE p.post_id = ?
        ORDER BY p.date_post
        ASC
        ');
        $comments->execute(array($postId));

        return $comments->fetchAll();
    }

    // Ajoute un commentaire dans l'article
    public function postComment($articleId, $membreID, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO post(post_id, members_id, post, date_post) VALUES(?, ?, ?, NOW())');
        $comments->execute(array($articleId, $membreID, $comment));
        return $comments->fetchAll();
    }
}
