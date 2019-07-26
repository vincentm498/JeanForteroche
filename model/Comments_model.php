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

    // Ajoute un commentaire dans l'article
    public function postComment($articleId, $membreID, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO post(post_id, members_id, post, date_post) VALUES(?, ?, ?, NOW())');
        $addcomment = $comments->execute(array($articleId, $membreID, $comment));

        return $addcomment;
    }

    // Ajoute un membre
    public function addMember($pseudo, $pass_hache, $email)
    {
        $db = $this->dbConnect();
        $member = $db->prepare('INSERT INTO members(pseudo, pass, email, date_inscription, id_groupe) VALUES(?, ?, ?, NOW(), 2)');
        $addmember = $member->execute(array($pseudo, $pass_hache, $email));

        return $addmember;
    }

    // Renvoie la liste de tous les membres
    public function getAllMembers()
    {
        $db = $this->dbConnect();
        $members = $db->query('SELECT pseudo, email FROM members');

        return $members->fetchAll();
    }
}
