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
        require_once ('View/pages/home_user.php');
    }
    public function register_user(){
        require_once ('create_user_controller.php');
        $page_register =new create_user_controller();
        $page_register->register_page();
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