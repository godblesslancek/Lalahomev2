<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 19/12/2017
 * Time: 18:55
 */

class MessageController{

    public function __construct()
    {
    }

    public function message_page(){
        require_once ('View/pages/messages.php');
    }

    public function send(){
        if(helper::checkPost(array('Message')) && helper::checkSession(array('IDuser'))){
            $currentUser = new Users();
            $currentUser->setCurrentUser($_SESSION['IDuser']);

            $message = new Message($_SESSION['IDuser'],$currentUser->getIDBM());

            $message->add_message($_POST['Message']);

        }
    }

    public function retreive(){
        if(helper::checkSession(array('IDuser'))){
            

        }
    }
}