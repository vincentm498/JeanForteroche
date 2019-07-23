<?php

// Chargement des classes
require_once('model/Articles_model.php');
require_once('model/Comments_model.php');

function homeView()
{

    $articlesModel = new \Blog\Model\Articles_model();
    $lastArticles = $articlesModel->getLastArticles();
    $articles = $articlesModel->getAllArticles();

    // Affichage
    require 'view/home_view.php';
}


function romanView()
{
    $articlesModel = new \Blog\Model\Articles_model();
    $articles = $articlesModel->getAllArticles();

    // Affichage
    require 'view/roman_view.php';
}

function articleView()
{

    $articlesModel = new \Blog\Model\Articles_model();
    $articles = $articlesModel->getAllArticles();
    $article = $articlesModel->getArticle($_GET['id']);

    $commentsModel = new \Blog\Model\Comments_model();
    $comments = $commentsModel->getAllComments($_GET['id']);

    // Affichage
    require 'view/article_view.php';
}

function mentionsView()
{
    // Affichage
    require 'view/mentions_view.php';
}

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

function addMember($pass)
{

    $commentsModel = new \Blog\Model\Comments_model();

    if (isset($_POST['envoi'])) { // si formulaire soumis
        // on teste la déclaration de nos variables
        if (!empty($_POST['pseudo']) &&  !empty($_POST['pass']) &&  !empty($_POST['email'])) {
            echo $_POST['pseudo'];
            echo $_POST['pass'];
            echo $_POST['email'];
            // Hachage du mot de passe
            $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            //echo $pass_hache;
        } else {
            echo "Le formulaire n'est pas correctement rempli ";
        }
    }



    //     

    //     if ($addMember === false) {
    //         echo 'erreur';
    //         //throw new Exception('Impossible d\'ajouter le membre !');
    //     } else {
    //         echo 'ajout';
    //         //header('Location: index.php?action=article&id=' . $firstname);
    //    }
}
