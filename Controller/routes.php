<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 14:41
 */


// Routeur permettant de gérer les actions qui nécessitent d'être placé dans le body

  //Liste des controllers autorisés et de leurs actions
  $controllers = array('pages' => ['home', 'error', 'login']);

// Si l'utilisateur est connecté on rajoute au tableaux les actions possibles
 if(isset($_SESSION['Role']) && !empty($_SESSION['Role'])){
     switch ($_SESSION['Role']):
         case 'admin':
             $controllers = array('pages' => ['home', 'error', 'login', 'register_user', 'home_user', 'stats', 'messages']);
             break;
         case 'FU':
             $controllers = array('pages' => ['home', 'error', 'login', 'home_user']);
             break;
         case 'FM':
             $controllers = array('pages' => ['home', 'error', 'login', 'register_user', 'home_user']);
             break;
         case 'BM':
             $controllers = array('pages' => ['home', 'error', 'login', 'home_user']);
     endswitch;
 }

  // On regarde si le controller demandé et son action sont autorisés
  // Si quelqu'un essaie d'accéder quelque chose de non autorisé, une page d'erreur sera affiché.
  if (array_key_exists($controller, $controllers)) {
      if (in_array($action, $controllers[$controller])) {
          call($controller, $action);
      } else {
          call('pages', 'error');
      }
  }
?>

