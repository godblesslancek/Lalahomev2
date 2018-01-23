<?php

class Flat
{
    private $ID;
    private $nb_of_rooms;
    private $nb_appart;
    private $id_building;
    private $conn;


    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function getID()
    {
        return $this->ID;
    }

    public function getnb_of_rooms()
    {
        return $this->nb_of_rooms;
    }

    public function getnb_appart()
    {
        return $this->nb_appart;
    }

    public function getbuilding()
    {
        return $this->building;
    }

    public function create_flat($flat_param){
        $stmt = $this->conn->prepare('INSERT INTO flat (nb_of_rooms,nb_appart,id_building) VALUES (?,?,?)');
        $stmt->bind_param("iii", $flat_param['nb_of_rooms'],$flat_param['nb_appart'],$flat_param['id_building']);
        $stmt->execute();
        $stmt->close();
    }
    
    public function update_flat($flat_param){

        $stmt = $this->conn->prepare('UPDATE flat SET nb_of_rooms = ?, nb_appart = ?, id_building = ? WHERE id = ?')     ;
        $stmt->bind_param("iii", $flat_param['nb_of_rooms'],$flat_param['nb_appart'] , $flat_param['id_building']);
        $stmt->execute();
        $stmt->close();
    }

    public function set_flat($id_flat){
        $stmt = $this->conn->prepare('SELECT * FROM flat WHERE id_flat = ?');
        $stmt->bind_param('i', $id_flat);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $this->ID = $data['id_flat'];
        $this->nb_of_rooms = $data['nb_of_rooms'];
        $this->nb_appart = $data['nb_appart'];
        $this->id_building = $data['id_building'];
    }


}

?>