<?php

// Chargement des classes
require_once('model/Comments_model.php');

function addComment($articleId, $membreID, $comment)
{
    $commentsModel = new \Blog\Model\Comments_model();

    $addcomment = $commentsModel->postComment($articleId, $membreID, $comment);

    if ($addcomment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=article&id=' . $articleId);
    }
}
