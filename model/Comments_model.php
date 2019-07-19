<?php

namespace Blog\Model;

require_once("model/Connect_model.php");

class Comments_model extends Connect_model
{
    // Renvoie la liste de tous les commentaires de l'article
    public function getAllComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT *
        FROM post
        WHERE post_id = ?
        ORDER BY date_post
        ASC
        ');
        $comments->execute(array($postId));

        return $comments->fetchAll();
    }
}
