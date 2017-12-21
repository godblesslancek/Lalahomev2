<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 19/12/2017
 * Time: 19:10
 */

class Message
{
    private $ID;
    private $ID_sender;
    private $ID_receiver;
    private $Message;

    private $conn;

    public function __construct($ID_sender, $ID_receiver)
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();

        $this->ID_sender = $ID_sender;
        $this->ID_receiver = $ID_receiver;
    }

    public function add_message($message){

        $stmt = $this->conn->prepare('INSERT INTO messages (id_sender, id_receiver, message) VALUES (?,?,?)');
        $stmt->bind_param("iis",$this->ID_sender, $this->ID_receiver, $message);
        $stmt->execute();
        $stmt->close();
    }

    public function get_messages(){
        $stmt = $this->conn->prepare('SELECT * FROM messages WHERE id_receiver = ?  AND id_sender = ?');
        $stmt->bind_param("ii",$this->ID_sender, $this->ID_receiver);
        $stmt->execute();
        $row = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        foreach ($row->fetch_assoc() as $message){
            array();
        }



    }

}