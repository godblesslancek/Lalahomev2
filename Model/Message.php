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

        $stmt = $this->conn->prepare('INSERT INTO messages (id_sender, id_receiver, message, datetime) VALUES (?,?,?,?)');
        $date = (string)date('Y/m/d H:i:s');
        $stmt->bind_param("iiss",$this->ID_sender, $this->ID_receiver, $message, $date);
        $stmt->execute();
        $stmt->close();
    }

    public function get_messages(){
        $stmt = $this->conn->prepare('SELECT * FROM messages WHERE (id_receiver = ?  AND id_sender = ?) OR (id_sender = ? AND id_receiver = ?)  ORDER BY datetime ASC ');
        $stmt->bind_param("iiii",$this->ID_receiver, $this->ID_sender, $this->ID_receiver, $this->ID_sender);
        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();
        while ($row = $res->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;

    }



}

class Conversation
{
    public function __construct($ID_receiver)
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();

        $this->ID_receiver = $ID_receiver;
    }

    public function get_conversations(){
        $stmt = $this->conn->prepare('SELECT DISTINCT id_sender, id_receiver FROM messages WHERE (id_receiver = ?) OR (id_sender = ?) ORDER BY datetime DESC');
        $stmt->bind_param("ii", $this->ID_receiver,$this->ID_receiver);
        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();
        while ($row = $res->fetch_assoc()) {
            if (!in_array($row['id_sender'],$rows))
                if($row['id_sender'] != $this->ID_receiver)
                    $rows[] = $row['id_sender'];
        }
        return $rows;
    }
}