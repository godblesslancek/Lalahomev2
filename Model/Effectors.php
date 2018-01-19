<?php

class Effector
{
    public $ID;
    private $type_effector;
    private $id_room;
    private $value_effector;

    private $conn;

    
    public function getID()
    {
        return $this->ID;
    }

    public function gettype_effector()
    {
        return $this->type_effector;
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


    public function create_effector($effector_param){

        $stmt = $this->conn->prepare('INSERT INTO effector (type_effector,id_room,value_effector) VALUES (?,?,?)');
        $stmt->bind_param("sii", $effector_param['type_effector'],$effector_param['id_room'],$effector_param['value_effector']);
        $stmt->execute();
        $this->ID = $this->conn->insert_id;
        $this->type_effector = $effector_param['type_effector'];
        $this->id_room = $effector_param['id_room'];
        $this->value_effector = $effector_param['value_effector'];$con=mysqli_connect("localhost","my_user","my_password","my_db");
        echo mysqli_error($this->conn);
        
    }
    
    public function update_effector($effector_param){

        $stmt = $this->conn->prepare('UPDATE effector SET type_effector = ?, id_room = ?, value_effector = ? WHERE id = ?')     ;
        $stmt->bind_param("sii", $effector_param['type_effector'],$effector_param['id_room'],$effector_param['value_effector'] );
        $stmt->execute();
        $stmt->close();
    }
    
    public function setValue($newValue){

        $stmt = $this->conn->prepare('UPDATE effector SET value_effector = ? WHERE id = ?')     ;
        $stmt->bind_param("i", $newValue);
        $stmt->execute();
        $stmt->close();
    

    }


}




/*
class Effector
{
    private $ID;
    private $type_effector;
    private $id_room;

    private $conn;

    
    public function getID()
    {
        return $this->ID;
    }

    public function gettype_effector()
    {
        return $this->type_effector;
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


    public function create_effector($effector_param){

        $stmt = $this->conn->prepare('INSERT INTO effector (type_effector,id_room) VALUES (?,?)');
        $stmt->bind_param("si", $effector_param['type_effector'],$effector_param['id_room'] );
        $stmt->execute();
        $stmt->close();
    }
    
    public function update_effector($effector_param){

        $stmt = $this->conn->prepare('UPDATE effector SET type_effector = ?, id_room = ? WHERE id = ?')     ;
        $stmt->bind_param("si", $effector_param['type_effector'],$effector_param['id_room'] );
        $stmt->execute();
        $stmt->close();


    }


}
*/
?>