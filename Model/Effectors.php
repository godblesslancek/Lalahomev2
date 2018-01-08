<?php

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

?>