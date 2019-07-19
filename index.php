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
