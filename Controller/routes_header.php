<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 26/11/2017
 * Time: 20:21
 */

// Routeur permettant de gérer les actions qui nécessitent d'être placé avant le HEADER HTTP

//Liste des controllers autorisés et de leurs actions by default
$controller_rh = array('user' => ['connect'], 'messages' => ['send']);


// Si l'utilisateur est connecté on rajoute au tableaux les actions possibles
if(isset($_SESSION['Role']) && !empty($_SESSION['Role'])){
    switch ($_SESSION['Role']):
        case 'admin':
            $controller_rh = array('user' => ['connect', 'disconnect', 'register','userList','delete','getUser','update','userBMList'],
                'messages' => ['send','retreivemessage','retreiveconversation','getUser'],
                'stats' => ['getBuildingList','getTempWeekly','getTempDaily'],
                'building' => ['getBuildingList','createBuilding','getBuilding','updateBuilding','deleteBuilding']);
            break;
        case 'FU':
            $controller_rh = array('user' => ['connect', 'disconnect'],
                'flat' => ['getListRooms'],
                'effector' => ['getEffectorList','getEffectorState']);
            break;
        case 'FM':
            $controller_rh = array('user' => ['connect', 'disconnect', 'register','userList','delete','getUser','update'],
                'messages' => ['send','retreivemessage','retreiveconversation','getUser'],
                'stats' => ['getBuildingList','getTempDaily','getTempWeekly'],
                'flat' => ['getListRooms'],
                'effector' => ['getEffectorList','getEffectorState', 'changeState'],
                'sensor' => ['getSensorValue','changeValue','getSensorsList']);
            break;
        case 'BM':
            $controller_rh = array('user' => ['connect', 'disconnect','userList'],
                'messages' => ['send','retreivemessage','retreiveconversation','getUser'],
                'stats' => ['getBuildingList','getTempDaily','getTempWeekly'],
                'building' => ['getBuildingList']);
    endswitch;
}
$used = false;
// On regarde si le controller demandé et son action sont autorisés
// Si quelqu'un essaie d'accéder quelque chose de non autorisé, une page d'erreur sera affiché.
if (array_key_exists($controller, $controller_rh)) {
    if (in_array($action, $controller_rh[$controller])) {
        call($controller, $action);
        $used = True;
    }
}

if ($controller== 'pages'){
    switch ($action):
        case 'login':
            $page_title = 'Connexion';
            break;
        case 'home':
            $page_title = 'TECHOUSE';
            break;
        case 'home_user':
            $page_title = 'Ma Maison';
            break;
        case 'error':
            $page_title = 'Erreur';
            break;
        case 'Stats':
            $page_title = 'Statistiques Globales';
            break;
        case 'register_user':
            $page_title = 'Creation Utilisateur';
        break;
    endswitch;
}


?>