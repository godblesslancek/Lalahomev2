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
                ;
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
        //require_once ('views/pages/create_user_form.php');
    }

    public function faq(){
        require_once ('View/pages/faq.php');
    }

    public function stats(){
        require_once ('stats_controller.php');
        $page_stats = new stats_controller();
        $page_stats->example_page();
    }

    public function update_user(){}

    public function delete_user(){}
}
?>