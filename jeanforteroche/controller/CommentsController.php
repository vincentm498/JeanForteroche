<?php

namespace JeanForteroche\controller;

use JeanForteroche\model\Comments;

class CommentsController  extends Controller
{

    //Ajout d'un commentaire 
    //public function addComment($articleId, $comment)
    public function addComment($articleId)
    {

        $commentsModel = new Comments();
        $membreID = $_SESSION['membreID'];

        $comment = trim(htmlspecialchars($_POST['comment']));
        if (!empty($comment)) {
            $addcomment = $commentsModel->postComment($articleId, $membreID, $comment);

            $this->setFlash("Commentaire ajouté", 'green');
            if ($addcomment === false) {
                throw new Exception('Impossible d\'ajouter le commentaire !');
            } else {
                header('Location: index.php?action=article&id=' . $articleId);
            }
        } else {
            $this->setFlash("Veuillez remplir tous les champs", 'red');
            header('Location: index.php?action=article&id=' . $_GET['id']);
        }
    }

    //Signal d'un commentaire 
    public function signalComment()
    {

        $commentsModel = new Comments();
        $signalComment = $commentsModel->signalComment($_GET['id_comment']);

        $this->setFlash("Commentaire signalé", 'green');
        header('Location: index.php?action=article&id=' . $_GET['id_article']);
    }


    //Signal d'un commentaire valide
    public function signalValideComment()
    {
        //$this->controleBack();

        $commentsModel = new Comments();
        $signalComment = $commentsModel->signalValideComment($_GET['id']);

        $this->setFlash("Commentaire validé", 'green');
        header('Location: index.php?action=back');
    }

    //Supprimer un commentaire
    public function signalRefusComment()
    {
        //$this->controleBack();

        $commentsModel = new Comments();
        $signalComment = $commentsModel->signalRefusComment($_GET['id']);

        $this->setFlash("Commentaire Supprimé", 'green');
        header('Location: index.php?action=back');
    }
}
