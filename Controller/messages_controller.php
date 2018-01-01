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

    public function retreivemessage(){
        if(helper::checkSession(array('IDuser'))){
            $currentUser = new Users();
            $currentUser->setCurrentUser($_SESSION['IDuser']);

            switch ($currentUser->getRole()){
                case 'admin':
                    if(helper::checkGet(array('IDConv'))){
                        $message = new Message($_SESSION['IDuser'],$currentUser->getIDBM());
                        echo json_encode($message->get_messages());
                    }

                    break;
                case 'FM':
                    $message = new Message($_SESSION['IDuser'],$currentUser->getIDBM());
                    echo json_encode($message->get_messages());
                    break;
                case 'BM':
                    $message = new Message($_SESSION['IDuser'],$currentUser->getIDBM());
                    echo json_encode($message->get_messages());
                    break;
            }
        }
    }

    public function retreiveconversation(){

        if(helper::checkSession(array('IDuser'))){

            $currentUser = new Users();
            $currentUser->setCurrentUser($_SESSION['IDuser']);
            $message = new Message($_SESSION['IDuser'],$currentUser->getIDBM());
            $users= $message->get_conversations();
            $conversations = array();

            for ($i = 0; $i <= count($users) -1 ; $i++ ){
                $cuser = new Users();
                $cuser->setCurrentUser($users[$i]);
                $cuser->getFirstName();
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