<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 15:48
 */
class UsersController{


    public function connect(){

        $post_params = array('Email', 'Password');

        if (helper::checkPost($post_params)){

            $Email = $_POST['Email'];
            $Password = $_POST['Password'];

            $user = new Users();
            $connect = $user->connect($Email, $Password);
            if ($connect){
                setcookie('IDuser', $user->getID(), time() + 24*3600, "/", null, false, false);
                $_SESSION['Role'] = $user->getRole();
                $_SESSION['FirstName'] = $user->getFirstName();
                $_SESSION['IDuser'] = $user->getID();

                header('Location: index.php?controller=pages&action=home_user');
            }
            else{
                header('Location: index.php?controller=pages&action=login');
            }
        }
        else
            header('Location: index.php?controller=pages&action=login');
    }

    public function disconnect(){
        session_destroy();
        header('Location: index.php');
    }

<<<<<<< HEAD
    private function checkPost($Post_Array){

        foreach ($Post_Array as $key){
            if(!isset($_POST[$key]) || empty($_POST[$key])){
                return false;
            }
        }
        return true;
    }

=======
>>>>>>> master
    public function register(){

        $post_params = array('LastName', 'FirstName', 'Email', 'Phone', 'Password', 'Password_Verif', 'Role');
        
        // debug
        echo "<p>inside register</p>";

<<<<<<< HEAD
        if ($this->checkPost($post_params)) { // Si les données sont définies
=======
        if ( helper::checkPost($post_params)) {

>>>>>>> master
            if ($_POST['Password'] != $_POST['Password_Verif']) {
                // $error = 'Password does not match';

                // Redirection
                $controller = 'pages';
                $action = 'register_user';
                header('Location: index.php?controller='.$controller.'&action='.$action.'&error=1');

            } else {

                $user = new Users();

                $user_params = [
                    "LastName" => $_POST['LastName'],
                    "FirstName" => $_POST['FirstName'],
                    "Email" => $_POST['Email'],
                    "Phone" => $_POST['Phone'],
                    "Password" => $_POST['Password'],
                    'Role' => $_POST['Role']
                ];

                $user->create_user($user_params);

                // Redirection
                $controller = 'pages';
                $action = 'home';
                header('Location: index.php?controller='.$controller.'&action='.$action);
            }
        } else { // Le cas échéant
            
            // Redirection
            $controller = 'pages';
            $action = 'register_user';
            header('Location: index.php?controller='.$controller.'&action='.$action.'&error=2');
        }


    }

    public function update(){

        $post_params = array('LastName', 'FirstName', 'Email', 'Phone', 'Password', 'Password_Verif', 'Role');

        if (helper::checkPost($post_params)) {

            if ($_POST['Password'] != $_POST['Password_Verif']) {
                $error = 'Password does not match';

                $controller = 'pages';
                $action = 'update_user';

            } else {


                $user = new Users();

                $user_params = [
                    "LastName" => $_POST['LastName'],
                    "FirstName" => $_POST['FirstName'],
                    "Email" => $_POST['Email'],
                    "Phone" => $_POST['Phone'],
                    'ID' => $_POST['ID']

                ];

                $user->update_user($user_params);

            }
        $controller = 'pages';
        $action = 'home';
        }
    }


}