<?php

class Sensor
{
    private $ID;
    private $type_sensor;
    private $id_room;

    
    public function getID()
    {
        return $this->ID;
    }

    public function gettype_sensor()
    {
        return $this->type_sensor;
    }

    public function getid_room()
    {
        return $this->id_room;
    }



    public function create_sensor($sensor_param){

        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare('INSERT INTO sensor (type_sensor,id_room) VALUES (?,?)');
        $stmt->bind_param("si", $sensor_param['type_sensor'],$sensor_param['id_room'] );
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    
    public function update_sensor($sensor_param){
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare('UPDATE sensor SET type_sensor = ?, id_room = ? WHERE id = ?')     ;
        $stmt->bind_param("si", $sensor_param['type_sensor'],$sensor_param['id_room'] );
        $stmt->execute();
        $stmt->close();
        $conn->close();



    }


}

?>