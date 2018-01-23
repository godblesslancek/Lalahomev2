<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 14:50
 */
class PagesController {

    public function home() {
        require_once('View/pages/home.php');
    }

    public function login(){
        require_once 'View/pages/login.php';
    }

    public function error() {
        require_once('View/pages/error.php');
    }

    public function users(){
        require_once 'View/pages/users.php';
    }

    public function home_user(){
        switch ($_SESSION['Role']){
            case 'admin':
                require_once ('View/pages/home_admin.php');
                break;
            case 'BM':
                require_once ('View/pages/home_building_manager.php');
                break;
            case 'FM':
                require_once ('View/pages/home_flat_manager.php');
                break;
            case 'FU':
                require_once ('View/pages/home_flat_user.php');
                break;
            case 'tester':
                require_once ('View/pages/test.php');
        }

    }

    public function home_demo(){
        switch ($_GET['role']){
            case 'admin':
                require_once ('View/pages/home_admin.php');
                break;
            case 'BM':
                require_once ('View/pages/home_building_manager.php');
                break;
            case 'FM':
                require_once ('View/pages/home_flat_manager.php');
                break;
            case 'FU':
                require_once ('View/pages/home_flat_user.php');
                ;
        }

    }
    public function register_user(){
        require_once ('View/pages/create_user.php');
    }

    public function userList(){
        require_once ('View/pages/user_list.php');
    }


    public function faq(){
        require_once ('View/pages/faq.php');
    }

    public function test(){
        require_once ('View/pages/test.php');

    }


    public function stats(){
        require_once ('stats_controller.php');
        $page_stats = new stats_controller();
        $page_stats->renderpage();
    }

    public function update_user(){
         require_once ('update_user_controller.php');
        $page_update =new update_user_controller();
        $page_update->update_page();
    }


    public function messages(){
        require_once ('messages_controller.php');
        $mess = new MessageController();
        $mess->message_page();
    }

    public function piece(){
        require_once ('View/pages/piece.php');
    }

    public function capteurs(){
        require_once ('View/pages/capteurs.php');
    }

    public function capteurs_Temperature(){
        require_once ('View/pages/capteurs_Temperature.php');
    }
}
?>