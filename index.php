<?php

use JeanForteroche\controller\Articles_controller;
use JeanForteroche\controller\Comments_controller;
use JeanForteroche\controller\Members_controller;
use JeanForteroche\controller\Statique_controller;

session_start();
ini_set('display_errors', 1);

//inclusion des fichiers principaux
require "include.php";


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
        $comments->addComment($_GET['id'], $_POST['member'], $_POST['comment']);
        break;

        // Ajout de membres
    case 'addMember':

        $members = new Members_controller;
        $members->addMember($_GET['id'], $_POST['pseudo'], $_POST['pass'], $_POST['verification_pass'], $_POST['email']);
        break;

        // Affichage de la page mentions légales
    case 'mentions':
        $mentions = new Statique_controller;
        $mentions->mentionsView();
        break;

        // Affichage de la page formulaire
        // case 'formConnect':
        //     formConnect();
        //     break;

        // Affichage de la home
    default:
        $affichage = new Articles_controller;
        $affichage->homeView();
        break;
}
