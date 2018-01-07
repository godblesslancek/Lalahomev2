<?php

class Flat
{
    private $ID;
    private $nb_of_rooms;
    private $nb_appart;
    private $id_building;
    

    
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

        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare('INSERT INTO user (nb_of_rooms,nb_appart,id_building) VALUES (?,?,?)');
        $stmt->bind_param("iii", $flat_param['nb_of_rooms'],$flat_param['nb_appart'],$flat_param['id_building']);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    
    public function update_flat($flat_param){
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare('UPDATE flat SET nb_of_rooms = ?, nb_appart = ?, id_building = ? WHERE id = ?')     ;
        $stmt->bind_param("iii", $flat_param['nb_of_rooms'],$flat_param['nb_appart'] , $flat_param['id_building']);
        $stmt->execute();
        $stmt->close();
        $conn->close();



    }


}

?>