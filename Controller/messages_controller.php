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
        if(helper::checkPost(array('Message', 'IDReceiver')) && helper::checkSession(array('IDuser'))){
            $currentUser = new Users();
            $currentUser->setCurrentUser($_SESSION['IDuser']);

            $message = new Message($_SESSION['IDuser'], $_POST['IDReceiver']);

            $message->add_message($_POST['Message']);

        }
    }

    public function retreivemessage(){
        if(helper::checkSession(array('IDuser'))){
            $currentUser = new Users();
            $currentUser->setCurrentUser($_SESSION['IDuser']);
            $message = new Message($_SESSION['IDuser'],$_GET['IDconv']);
            $messages = $message->get_messages();
            echo json_encode($messages);
        }   
    }

    public function retreiveconversation(){

        if(helper::checkSession(array('IDuser'))){

            $currentUser = new Users();
            $currentUser->setCurrentUser($_SESSION['IDuser']);

            $conv = new Conversation($_SESSION['IDuser']);
            $users = $conv->get_conversations();
            $conversations = array();
            for ($i = 0; $i <= count($users) -1 ; $i++ ){
                $cuser = new Users();
                $cuser->setCurrentUser($users[$i]);
                $conversations[$i] = array($cuser->getFirstName()." ".$cuser->getLastName(), $cuser->getRole(), $cuser->getID());

            }

            if (empty($conversations)){
                $cuser = new Users();
                $cuser->setCurrentUser($currentUser->getIDBM());
                $conversations[$i] = array($cuser->getFirstName()." ".$cuser->getLastName(), $cuser->getRole(), $cuser->getID());
            }
            echo json_encode($conversations);
        }

    }

    //Helper for JS

    public function GetSession(){
        echo json_encode($_SESSION);
    }
}