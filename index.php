<?php
session_start();
// Inclusion du namespace
use \Blog\Autoloader;

ini_set('display_errors', 1);

//inclusion des fichiers principaux
require "include.php";


Autoloader::register();

$action = "";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


if (isset($_POST['login_success'])) { }

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

        // Affichage de pages simple
    case 'formConnect':
        formConnect();
        break;

    default:
        homeView();
        break;
}
