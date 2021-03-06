<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 14:36
 */


// Variable pour le reporting d'erreur
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
///


//Création de la session
session_start();


// Chargement de l'accès à la base de donnée
require_once('Model/Database.php');
// Chargement du helper
require_once ('Controller/helper.php');

///
/// Fonction de routing pour les actions des controllers
///

// Routeur permettant de gérer les actions qui nécessitent d'être placé avant le HEADER HTTP

// Définition de la fonction permettant de d'appeler une action issue d'un controller
function call($controller, $action) {

    // chargement du controller
    require_once('Controller/' . $controller . '_controller.php');

    // création d'une nouvelle instance d'un controller
    switch($controller) {
        case 'pages':
            $_controller = new PagesController();
            break;
        case 'user':
            require_once('Model/Users.php');
            $_controller = new UsersController();
            break;
        case 'messages':
            require_once ('Model/Message.php');
            require_once ('Model/Users.php');
            $_controller = new MessageController();
            break;
        case 'stats':
            require_once ("Model/Building.php");
            require_once ("Model/Users.php");
            require_once ("Model/History.php");
            $_controller = new stats_controller();
            break;
        case 'flat':
            require_once ("Model/Users.php");
            require_once ("Model/Room.php");
            require_once ("Model/Flat.php");
            $_controller = new FlatController();
            break;
        case 'effector':
            require_once ("Model/Effectors.php");
            $_controller = new EffectorController();
            break;
        case 'sensor':
            require_once ("Model/Sensors.php");
            $_controller = new SensorController();
            break;
        case 'building':
            require_once ("Model/Building.php");
            require_once ("Model/Users.php");
            $_controller = new BuildingController();
            break;



    }

    // Appel de l'action
    $_controller->{ $action }();
}


// Définition du controller et de l'action en fonction des paramètres
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];

} else { // Par default retourner sur la page d'acceuil
    $controller = 'pages';
    $action     = 'home';
}

require_once ('Controller/routes_header.php');
if(!$used)
    require_once ('View/layout.php');
?>

