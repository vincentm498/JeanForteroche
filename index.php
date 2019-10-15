<?php
session_start();

ini_set('display_errors', 1);

require "vendor/autoload.php";

use JeanForteroche\controller\ArticlesController;
use JeanForteroche\controller\BackController;
use JeanForteroche\controller\CommentsController;
use JeanForteroche\controller\MembersController;
use JeanForteroche\controller\Controller;



$action = "";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


// if (isset($_POST['login_success'])) { }

switch ($action) {

        // Affichage de tous les articles

    case 'allArticle':
        $affichage = new ArticlesController;
        $affichage->romanView();
        break;

        // Affichage de l'article

    case 'article':
        $affichage = new ArticlesController;
        $affichage->articleView();
        break;

        // Ajout de commentaires

    case 'addComment':
        $comments = new CommentsController;
        $comments->addComment($_GET['id'], $_POST['comment']);
        break;

        // Ajout de membres

    case 'addMember':
        $members = new MembersController;
        $members->addMember();
        break;

        // Affichage de la page mentions légales

    case 'mentions':
        $mentions = new Controller;
        $mentions->mentionsView();
        break;

        // Déconnexion user

    case 'deconnexion':
        $members = new MembersController;
        $members->deconnexion();
        break;

        // Connexion

    case 'connexion':
        $members = new MembersController;
        $members->connexion();
        break;

        // Vérification du user

    case 'verifMember':
        $members = new MembersController;
        $members->verifMember();
        break;

        // Inscription de user

    case 'inscription':
        $members = new MembersController;
        $members->inscription();
        break;

        // Signalement du commentaire

    case 'signalComment':
        $comment = new CommentsController;
        $comment->signalComment();
        break;

        // Backoffice ////////////////////////////////////////////////////////

    case 'back':
        $adminBack = new BackController;
        $adminBack->dashboard();
        break;

        // Backoffice articles

    case 'backArticles':
        $adminBack = new BackController;
        $adminBack->backArticles();
        break;

        // Backoffice page ajout d'articles

    case 'AddArticles':
        $adminBack = new ArticlesController;
        $adminBack->addArticle();
        break;

        // Backoffice soumition d'articles

    case 'AddArticlesSubmit':
        $article = new ArticlesController;
        $article->addArticleSubmit();
        break;

        // Backoffice suppression d'articles

    case 'DeleteArticles':
        $article = new ArticlesController;
        $article->deleteArticle();
        break;

        // Backoffice page modification d'articles

    case 'modifArticle':
        $article = new ArticlesController;
        $article->modifArticle();
        break;

        // Backoffice update d'articles

    case 'updateArticle':
        $article = new ArticlesController;
        $article->updateArticle();
        break;

        // Backoffice valider le commentaire

    case 'signalValideComment':
        $comment = new CommentsController;
        $comment->signalValideComment();
        break;

        // Backoffice refuser le commentaire

    case 'signalRefusComment':
        $comment = new CommentsController;
        $comment->signalRefusComment();
        break;

        // Affichage de la home

    default:
        $affichage = new ArticlesController;
        $affichage->homeView();
        break;
}
