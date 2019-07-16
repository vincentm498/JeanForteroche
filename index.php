<?php
//inclusion du controlleur
require('controller/frontend_controller.php');
require('_functions/functions.php');


$action = isset($_GET['action']);

switch($action){


    case'article':
    articleView();
    break;

    default:
    homeView();
    break;
}

