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
        if(helper::checkSession(array('Role'))){
            switch ($_SESSION["Role"]){
                case 'admin':
                    require_once('View/pages/statistiques_admin.php');
            }
        }
    }

}


?>