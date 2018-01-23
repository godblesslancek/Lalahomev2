<?php

class Effector
{
    public $ID;
    private $type_effector;
    private $id_room;
    private $value_effector;
    private $conn;


    public function getValueEffector()
    {
        return $this->value_effector;
    }
    
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

    public function set_effector($id_effector){
        $stmt = $this->conn->prepare('SELECT * FROM effector WHERE id_effector = ?');
        $stmt->bind_param('i', $id_effector);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $this->ID = $this->conn->insert_id;
        $this->type_effector = $data['type_effector'];
        $this->id_room = $data['id_room'];
        $this->value_effector = $data['value'];
    }
    public function create_effector($effector_param){

        $stmt = $this->conn->prepare('INSERT INTO effector (type_effector,id_room,value_effector) VALUES (?,?,?)');
        $stmt->bind_param("sii", $effector_param['type_effector'],$effector_param['id_room'],$effector_param['value_effector']);
        $stmt->execute();
        $this->ID = $this->conn->insert_id;
        $this->type_effector = $effector_param['type_effector'];
        $this->id_room = $effector_param['id_room'];
        $this->value_effector = $effector_param['value_effector'];$con=mysqli_connect("localhost","my_user","my_password","my_db");
        
    }
    
    public function update_effector($effector_param){

        $stmt = $this->conn->prepare('UPDATE effector SET type_effector = ?, id_room = ?, value_effector = ? WHERE id = ?')     ;
        $stmt->bind_param("sii", $effector_param['type_effector'],$effector_param['id_room'],$effector_param['value_effector'] );
        $stmt->execute();
        $stmt->close();
    }
    
    public function setValue($newValue){

        $stmt = $this->conn->prepare('UPDATE effector SET value_effector = ? WHERE id = ?')     ;
        $stmt->bind_param("ii", $newValue, $this->ID);
        $stmt->execute();
        $stmt->close();
    }

    public function changeValue(){

        $newValue = !boolval($this->value_effector);
        $stmt = $this->conn->prepare('UPDATE effector SET value_effector = ? WHERE id = ?')     ;
        $stmt->bind_param("ii", $newValue, $this->ID);
        $stmt->execute();
        $stmt->close();
    }

    public function getEffectorsList($id_room){  //array avec idRoom et typeEffector

        $stmt = $this->conn->prepare('SELECT * FROM effector WHERE id_room = ? ')     ;
        $stmt->bind_param("i", $id_room);
        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();

        while($row = $res->fetch_assoc()){
            $rows[] = array("type" => $row["type_effecor"], "id" => $row["id_effector"]);
        }

        return $rows;

    }
    
}

?>