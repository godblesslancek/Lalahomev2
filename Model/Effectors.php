<?php

class Effector
{
    private $ID;
    private $type_effector;
    private $id_room;

    
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



    public function create_effector($effector_param){

        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare('INSERT INTO effector (type_effector,id_room) VALUES (?,?)');
        $stmt->bind_param("si", $effector_param['type_effector'],$effector_param['id_room'] );
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    
    public function update_effector($effector_param){
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $stmt = $conn->prepare('UPDATE effector SET type_effector = ?, id_room = ? WHERE id = ?')     ;
        $stmt->bind_param("si", $effector_param['type_effector'],$effector_param['id_room'] );
        $stmt->execute();
        $stmt->close();
        $conn->close();



    }


}

?>