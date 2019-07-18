<?php
//inclusion du controlleur
require('controller/frontend_controller.php');
require('_functions/functions.php');

if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "Accueil";

// $action = isset($_GET['action']);

switch ($action) {



    case 'allArticle':
        romanView();
        break;

    case 'article':
        articleView();
        break;


    default:
        homeView();
        break;
}
