<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Comments;

class Comments_controller  extends Controller
{

    //Ajout d'un commentaire 
    public function addComment($articleId, $comment)
    {

        $commentsModel = new Comments();
        $membreID = $_SESSION['membreID'];


        $comment = htmlspecialchars($_POST['comment']);
        $addcomment = $commentsModel->postComment($articleId, $membreID, $comment);

        if ($addcomment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=article&id=' . $articleId);
        }
    }

    //Signal d'un commentaire 
    public function signalComment()
    {
        $commentsModel = new Comments();
        $signalComment = $commentsModel->signalComment($_GET['id']);

        header('Location: index.php');
        $this->setFlash("Commentaire signalé", 'green');
    }


    //Signal d'un commentaire valide
    public function signalValideComment()
    {

        $commentsModel = new Comments();
        $signalComment = $commentsModel->signalValideComment($_GET['id']);
        header('Location: index.php?action=back');
        $this->setFlash("Commentaire validé", 'green');
    }

    //Supprimer un commentaire
    public function signalRefusComment()
    {
        $commentsModel = new Comments();
        $signalComment = $commentsModel->signalRefusComment($_GET['id']);
        header('Location: index.php?action=back');
        $this->setFlash("Commentaire Supprimé", 'green');
    }
}
