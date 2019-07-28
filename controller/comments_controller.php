<?php

// Chargement des classes
require_once('class/Comments.php');

function addComment($articleId, $membreID, $comment)
{
    $commentsModel = new \Blog\Comments();

    $addcomment = $commentsModel->postComment($articleId, $membreID, $comment);

    if ($addcomment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=article&id=' . $articleId);
    }
}
