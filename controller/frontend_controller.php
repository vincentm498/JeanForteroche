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

function addMember($pseudo, $pass_hache, $email)
{
    $commentsModel = new \Blog\Model\Comments_model();

    if (isset($_POST['envoi'])) { // si formulaire soumis

        $pseudo = str_secur($_POST['pseudo']);
        $pass = str_secur($_POST['pass']);
        $email = str_secur($_POST['email']);
        $verification_pass = str_secur($_POST['verification_pass']);
        $error = 'test';

        // on teste la déclaration de nos variables
        if (!empty($pseudo) &&  !empty($pass) &&  !empty($email) &&  !empty($verification_pass)) {

            // Test de la correspondance du mots de passe
            if ($pass == $verification_pass) {

                //Test de la validité de l'email
                if (filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_PATH_REQUIRED)) {

                    //Test du membre déjà ajouté
                    if (1 == 1) {
                        // Hachage du mot de passe
                        $pass_hache = password_hash($pass, PASSWORD_DEFAULT);

                        $addMember = $commentsModel->addMember($pseudo, $pass_hache, $email);

                        if ($addMember === false) {
                            throw new Exception('Impossible d\'ajouter le membre !');
                        } else {

                            header('Location: index.php?action=article&id=' . 2);
                        }
                    } else {
                        echo "Pseudo déja utilisé";
                    }
                } else {
                    echo "Adresse eMail invalide";
                }
            } else {
                echo "Le mots de passe n'est pas identique";
            }
        } else {
            echo "Le formulaire n'est pas correctement rempli ";
        }
    }
}
