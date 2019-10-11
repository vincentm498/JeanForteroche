<?php
session_start();

ini_set('display_errors', 1);

require "vendor/autoload.php";

use JeanForteroche\controller\Articles_controller;
use JeanForteroche\controller\Back_controller;
use JeanForteroche\controller\Comments_controller;
use JeanForteroche\controller\Members_controller;
use JeanForteroche\controller\Controller;



$action = "";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


if (isset($_POST['login_success'])) { }

switch ($action) {

        // Affichage de tous les articles
    case 'allArticle':
        $affichage = new Articles_controller;
        $affichage->romanView();
        break;

        // Affichage de l'article
    case 'article':
        $affichage = new Articles_controller;
        $affichage->articleView();
        break;

        // Ajout de commentaires
    case 'addComment':
        $comments = new Comments_controller;
        $comments->addComment($_GET['id'], $_POST['comment']);
        break;

        // Ajout de membres
    case 'addMember':

        $members = new Members_controller;
        $members->addMember();
        break;

        // Affichage de la page mentions légales
    case 'mentions':
        $mentions = new Controller;
        $mentions->mentionsView();
        break;

    case 'deconnexion':

        $members = new Members_controller;
        $members->deconnexion();

        break;

    case 'connexion':

        $members = new Members_controller;
        $members->connexion();

        break;


    case 'verifMember':

        $members = new Members_controller;
        $members->verifMember();

        break;

    case 'inscription':

        $members = new Members_controller;
        $members->inscription();

        break;

    case 'back':
        $adminBack = new Back_controller;
        $adminBack->dashboard();

        break;

    case 'backArticles':
        $adminBack = new Back_controller;
        $adminBack->backArticles();

        break;

    case 'AddArticles':
        $adminBack = new Articles_controller;
        $adminBack->addArticle();

        break;

    case 'AddArticlesSubmit':
        $article = new Articles_controller;
        $article->addArticleSubmit();

        break;

    case 'DeleteArticles':
        $article = new Articles_controller;
        $article->deleteArticle();

        break;

    case 'modifArticle':
        $article = new Articles_controller;
        $article->modifArticle();

        break;

    case 'updateArticle':
        $article = new Articles_controller;
        $article->updateArticle();

        break;

    case 'signalComment':

        $comment = new Comments_controller;
        $comment->signalComment();

        break;

    case 'signalValideComment':

        $comment = new Comments_controller;
        $comment->signalValideComment();

        break;

    case 'signalRefusComment':

        $comment = new Comments_controller;
        $comment->signalRefusComment();

        break;



        // Affichage de la home
    default:
        $affichage = new Articles_controller;
        $affichage->homeView();
        break;
}
