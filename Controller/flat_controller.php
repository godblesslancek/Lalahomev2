<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 23/01/2018
 * Time: 09:47
 */

class Flat {

    public function getListRooms(){
        if(helper::checkSession(array('IDuser'))){
            $currentuser = new Users();
            $currentuser->setCurrentUser($_SESSION["IDuser"]);
            $rooms = new Room();
            echo json_encode($rooms->getListRooms($currentuser->getIdFlat()));
        }
        else
            echo json_encode("failed");
    }
}

