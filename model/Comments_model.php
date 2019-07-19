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
        FROM post as p
        INNER JOIN members as m ON m.id = p.members_id
        WHERE p.post_id = ?
        ORDER BY p.date_post
        ASC
        ');
        $comments->execute(array($postId));

        return $comments->fetchAll();
    }
}
