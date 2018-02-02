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

    public function getTempDaily(){
        if(helper::checkSession(array('IDuser','Role'))){
            switch ($_SESSION["Role"]){
                case 'admin':
                    break;
                case'BM':
                    break;
                case 'FM':
                    $cuser = new Users();
                    $cuser->setCurrentUser($_SESSION['IDuser']);
                    $hist = new history();

                    echo json_encode($hist->getHistoryDayFlat("temp",$cuser->getIdFlat(),date("Y-m-d")));
                    break;
            }
        }
    }

    public function getTempWeekly(){
        if(helper::checkSession(array('IDuser','Role'))){
            switch ($_SESSION["Role"]){
                case 'admin':
                    break;
                case'BM':
                    break;
                case 'FM':
                    $cuser = new Users();
                    $cuser->setCurrentUser($_SESSION['IDuser']);
                    $hist = new history();

                    echo json_encode($hist->getHistoryWeekFlat("temp",$cuser->getIdFlat(),date("Y-m-d"), date("Y-m-d",strtotime("+1 week"))));
                    break;
            }
        }
    }





}


?>