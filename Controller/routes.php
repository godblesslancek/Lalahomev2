<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 14:41
 */


// Routeur permettant de gérer les actions qui nécessitent d'être placé dans le body

  //Liste des controllers autorisés et de leurs actions
  $controllers = array('pages' => ['home', 'error', 'login', 'faq']);

// Si l'utilisateur est connecté on rajoute au tableau les actions possibles


if(isset($_SESSION['Role']) && !empty($_SESSION['Role'])){
    switch ($_SESSION['Role'])
    {
        case 'admin':
            $controllers = array('pages' => ['home', 'error', 'login', 'userList', 'home_user', 'stats', 'faq', 'messages','users','building_list']);
            break;
        case 'FU':
            $controllers = array('pages' => ['home', 'error', 'login', 'home_user','faq', 'piece','capteurs','capteurs_Temperature','capteurs_binaire']);
            break;
        case 'FM':
            $controllers = array('pages' => ['home', 'error', 'login', 'home_user','faq', 'messages', 'userList','piece','capteurs','capteurs_Temperature','capteurs_binaire', 'stats']);
            break;
        case 'BM':
            $controllers = array('pages' => ['home', 'error', 'login', 'home_user','faq','messages','stats','building_list']);
            break;
    }
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

