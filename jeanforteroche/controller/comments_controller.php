<?php

namespace JeanForteroche\controller;


use JeanForteroche\model\Comments;

class Comments_controller  extends Controller
{

    //Ajout d'un commentaire 
    public function addComment($articleId, $membreID, $comment)
    {
        $commentsModel = new Comments();

        $comment = htmlspecialchars($_POST['comment']);
        $addcomment = $commentsModel->postComment($articleId, $membreID, $comment);

        if ($addcomment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=article&id=' . $articleId);
        }
    }
}
