<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 26/11/2017
 * Time: 20:21
 */

// Routeur permettant de gérer les actions qui nécessitent d'être placé avant le HEADER HTTP

//Liste des controllers autorisés et de leurs actions
$controllers = array('user' => ['connect', 'disconnect', 'register']);

// On regarde si le controller demandé et son action sont autorisés
// Si quelqu'un essaie d'accéder quelque chose de non autorisé, une page d'erreur sera affiché.
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    }
}


?>