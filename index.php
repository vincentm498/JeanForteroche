<?php
//inclusion du controlleur
require('controller/frontend_controller.php');


$action = isset($_GET['action']);

switch($action){


    case'article':
    articleView();
    break;

    default:
    homeView();
    break;
}
