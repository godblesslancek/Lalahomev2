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

    public function getValueSensor()
    {
        return $this->value_sensor;
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

    public function set_sensor($id_sensor){
        $stmt = $this->conn->prepare('SELECT * FROM sensor WHERE id_sensor = ?');
        $stmt->bind_param('i', $id_sensor);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $this->ID = $data['id_sensor'];
        $this->type_sensor = $data['type_sensor'];
        $this->id_room = $data['id_room'];
        $this->value_sensor = $data['value'];
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

    public function getSensorsList($id_room){

        $stmt = $this->conn->prepare('SELECT * FROM sensor WHERE id_room = ? ')     ;
        $stmt->bind_param("i", $id_room);
        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();

        while($row = $res->fetch_assoc()){
            $rows[] = array("type" => $row["type_sensor"], "id" => $row["id_sensor"]);
        }

        return $rows;

    }


}

?>