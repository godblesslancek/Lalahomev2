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

        if(helper::checkPost(array('Message')) && helper::checkSession(array('IDuser'))){

            $message = new Message(2,1);

            $message->add_message($_POST['Message']);


        }
    }
}