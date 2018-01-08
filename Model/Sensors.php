<?php

class Sensor
{
    private $ID;
    private $type_sensor;
    private $id_room;

    private $conn;

    
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

    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }


    public function create_sensor($sensor_param){

        $stmt = $this->conn->prepare('INSERT INTO sensor (type_sensor,id_room) VALUES (?,?)');
        $stmt->bind_param("si", $sensor_param['type_sensor'],$sensor_param['id_room'] );
        $stmt->execute();
        $stmt->close();
    }
    
    public function update_sensor($sensor_param){

        $stmt = $this->conn->prepare('UPDATE sensor SET type_sensor = ?, id_room = ? WHERE id = ?')     ;
        $stmt->bind_param("si", $sensor_param['type_sensor'],$sensor_param['id_room'] );
        $stmt->execute();
        $stmt->close();

    }


}

?>