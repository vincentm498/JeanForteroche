<?php
//inclusion du controlleur
require('controller/frontend_controller.php');
require('_functions/functions.php');

if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "Accueil";

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
