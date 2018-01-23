<?php

class Sensor
{
    public $ID;
    private $type_sensor;
    private $id_room;
    private $value_sensor;

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

        $stmt = $this->conn->prepare('INSERT INTO sensor (type_sensor,id_room,value_sensor) VALUES (?,?,?)');
        $stmt->bind_param("sii", $sensor_param['type_sensor'],$sensor_param['id_room'],$sensor_param['value_sensor'] );
        $stmt->execute();
        $stmt->close();
        $this->ID = $this->conn->insert_id;
        $this->type_sensor = $sensor_param['type_sensor'];
        $this->id_room = $sensor_param['id_room'];
        $this->value_sensor = $sensor_param['value_sensor'];
        
    }
    
    public function update_sensor($sensor_param){

        $stmt = $this->conn->prepare('UPDATE sensor SET type_sensor = ?, id_room = ?, value_sensor = ? WHERE id = ?')     ;
        $stmt->bind_param("sii", $sensor_param['type_sensor'],$sensor_param['id_room'],$sensor_param['value_sensor'] );
        $stmt->execute();
        $stmt->close();
    }
    
    public function setValue($newValue){

        $stmt = $this->conn->prepare('UPDATE sensor SET value_sensor = ? WHERE id = ?')     ;
        $stmt->bind_param("i", $newValue);
        $stmt->execute();
        $stmt->close();
    

    }


}

?>