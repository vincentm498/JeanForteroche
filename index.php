<?php
// Inclusion du namespace
use \Blog\Autoloader;

ini_set('display_errors', 1);

//inclusion des fichiers principaux
require('controller/frontend_controller.php');
require('controller/comments_controller.php');
require('controller/members_controller.php');
require('_functions/functions.php');
require('class/Autoloader.php');
Autoloader::register();

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

    case 'addMember':
        addMember($_GET['id'], $_POST['pseudo'], $_POST['pass'], $_POST['verification_pass'], $_POST['email']);
        break;

        // Affichage de pages simple
    case 'mentions':
        mentionsView();
        break;

    default:
        homeView();
        break;
}
