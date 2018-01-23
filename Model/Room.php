<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 23/01/2018
 * Time: 10:00
 */

class Room
{
    private $conn;
    private $ID;
    private $name_room;
    private $nb_sensor;
    private $id_flat;


    public function __construct()
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
    }



    public function getListRooms($id_flat){
        $stmt = $this->conn->prepare('SELECT name_room,id_room FROM room WHERE id_flat = ? ')     ;
        $stmt->bind_param("i", $id_flat);
        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();
        while($row = $res->fetch_assoc()){
            $rows[] = array("name" => $row["name_room"], "id" => $row["id_room"]);
        }
        return $rows;
    }

}