<?php

namespace JeanForteroche\model;

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
        DESC
        ');
        $comments->execute(array($postId));

        return $comments->fetchAll();
    }

    // Ajoute un commentaire dans l'article
    public function postComment($articleId, $membreID, $comment)
    {

        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO post(post_id, members_id, post, date_post, report) VALUES(?, ?, ?, NOW(), 0)');
        $comments->execute(array($articleId, $membreID, $comment));
        return $comments->fetchAll();
    }

    public function getAllCommentsBlog()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT p.comment_id AS id_post, p.post , p.date_post, m.id AS id_member , m.pseudo
        FROM post as p
        INNER JOIN members as m ON m.id = p.members_id
        WHERE p.report = 1
        ORDER BY p.date_post
        DESC
        ');
        $comments->execute();

        return $comments->fetchAll();
    }

    public function getAllCommentsArticleValidate()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT * FROM post ORDER BY id ASC');
        return $comments->fetchAll();
    }

    public function signalComment($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE `post` SET `report`= 1 WHERE comment_id = ?');
        $comments->execute(array($id));
    }


    public function signalValideComment($id)
    {
        $db = $this->dbConnect();
        $commentValide = $db->prepare('UPDATE `post` SET `report`= 2 WHERE comment_id = ?');
        $commentValide->execute(array($id));
    }

    public function signalRefusComment($id)
    {
        $db = $this->dbConnect();
        $commentRefus = $db->prepare('DELETE FROM `post` WHERE comment_id = ?');
        $commentRefus->execute(array($id));
    }
}
