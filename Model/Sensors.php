<?php

class Sensor
{
    private $ID;
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

    public function setSensor($id_sensor)
    {
        $stmt = $this->conn->prepare('SELECT * FROM sensor WHERE id_sensor=?');
        $stmt->bind_param("i", $id_sensor);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $this->ID=$id_sensor;
        $this->type_sensor=$result["type_sensor"];
        $this->id_room=$result["id_room"];
        $this->value_sensor=$result["value_sensor"];
    }



    public function create_sensor($sensor_param){

        $stmt = $this->conn->prepare('INSERT INTO sensor (type_sensor,id_room) VALUES (?,?)');
        $stmt->bind_param("si", $sensor_param['type_sensor'],$sensor_param['id_room'] );
        $stmt->execute();
        $stmt->close();
    }
    
    public function update_sensor($sensor_param){
        $stmt = $this->conn->prepare('UPDATE sensor SET type_sensor = ?, id_room = ? WHERE id = ?')     ;
        $stmt->bind_param("sii", $sensor_param['type_sensor'],$sensor_param['id_room'],$this->ID);
        $stmt->execute();
        $stmt->close();
    }

    public function setValue($sensorNewValue){
        $stmt = $this->conn->prepare('UPDATE sensor SET value_sensor = ? WHERE id = ?')     ;
        $stmt->bind_param("ii",$sensorNewValue,$this->ID);
        $stmt->execute();
        $stmt->close();
    }

    public function incrValue(op){  //incrémentation de la valeur
        if (op = "plus"){
        $stmt = $this->conn->prepare('UPDATE sensor SET value_sensor=value_sensor+1 WHERE id=?');
        $stmt->bind_param("i",$this->ID)            
        } 
        elif (op = "minus"){
        $stmt = $this->conn->prepare('UPDATE sensor SET value_sensor=value_sensor-1 WHERE id=?')
        $stmt->bind_param("i",$this->ID)     
        }
    }

    public function 

}

?>