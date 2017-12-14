<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 14:50
 */
class PagesController {

    public function home() {
        //require_once('views/pages/home.php');
    }

    public function connection(){
        //require_once 'views/pages/login.php';
    }

    public function error() {
        require_once('View/pages/error.php');
    }

    public function register_user(){
        //require_once ('views/pages/create_user_form.php');
    }

    public function update_user(){}

    public function delete_user(){}
}
?>