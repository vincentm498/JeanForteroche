<?php
ini_set('display_errors', 1);
//inclusion du controlleur
require('controller/frontend_controller.php');
require('_functions/functions.php');

$action = "";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


switch ($action) {


        // Affichage des articles
    case 'allArticle':
        romanView();
        break;

    case 'article':
        articleView();
        break;

        // Envoi de données
    case 'addComment':
        addComment($_GET['id'], $_POST['member'], $_POST['comment']);
        break;

        // case 'addMember':
        //     addMember($_GET['id'], $_POST['firstname'], $_POST['password']);
        //     break;

        // Affichage de pages simple
    case 'mentions':
        mentionsView();
        break;

    default:
        homeView();
        break;
}
