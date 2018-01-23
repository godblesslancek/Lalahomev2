<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 19/12/2017
 * Time: 10:39
 */


class stats_controller{

    public function __construct()
    {
    }


    public function renderpage(){
        require_once('View/pages/statistiques.php');

    }

    public function getBuildingList(){
        if(helper::checkSession(array('IDuser')) && helper::checkGet(array('search'))){
            $buiding = new Building();

            echo json_encode($buiding->getBuilding($_GET["search"]));
        }
    }

}


?>