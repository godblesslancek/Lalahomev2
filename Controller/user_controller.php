<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 15:48
 */
class UsersController{

    public function index() {
        //require_once('View/pages/login.php');
    }

    public function connect(){

        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        //$user = new Users();
        //$user->connect($Email, $Password);

        header('Location: index.php');
    }

    public function disconnect(){
        session_destroy();
        header('Location: index.php');
    }

    public function register(){

        /*
        $user = new Users();

        $user_params = [
            "LastName" => $_POST['LastName'],
            "FirstName" => $_POST['FirstName'],
            "Email" => $_POST['Email'],
            "Phone" => $_POST['Phone'],
            "Password" => $_POST['Password'],
            'Role' => $_POST['Role']

        ];

        $user->register_user($user_params);
        */
        $controller = 'pages';
        $action = 'home';
    }

    public function update(){

        /*
        $user = new Users();

        $user_params = [
            "LastName" => $_POST['LastName'],
            "FirstName" => $_POST['FirstName'],
            "Email" => $_POST['Email'],
            "Phone" => $_POST['Phone'],
            'Role' => $_SESSION['Role']

        ];

        $user->update_user($user_params);
        */
        $controller = 'pages';
        $action = 'home';
    }
}