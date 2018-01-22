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

    public function register(){

        $post_params = array('LastName', 'FirstName', 'Email', 'Phone', 'Password', 'Password_Verif', 'Role');
        
        if ( helper::checkPost($post_params)) {

            if ($_POST['Password'] != $_POST['Password_Verif']) {
                header('Location: index.php?controller=pages&action=login');

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
                return true;
            }
        } else {
            header('Location: index.php?controller=pages&action=login');
            return false;
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
    public function userList(){
         if(helper::checkSession(array('IDuser')) && helper::checkGet(array('name'))){
            $currentUser = new Users();
            $currentUser->setCurrentUser($_SESSION['IDuser']);
            if ($_GET['name'] == "undefined")
                $name  = " ";
            else
                $name = $_GET['name'];
            echo json_encode($currentUser->getUsersList($name));
        }
    }


}