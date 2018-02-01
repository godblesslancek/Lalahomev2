<?php
/**
 * Created by PhpStorm.
 * User: lancek :P
 * Date: 26/11/2017
 * Time: 15:43
 */


class Building
{
    private $ID;
    private $id_BM;
    private $name_building;
    private $nb_of_flats;
    private $address;

    private $conn;

    public function getID()
    {return $this->ID;}

    public function getName()
    {return $this->name_building;}

    
    public function getBM()
    {return $this->id_BM;}
    
    public function getNbflats()
    {return $this->nb_of_flats;}

    public function getaddress()
    {return $this->address;}


    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }


    public function create_building($building_param){

        $stmt = $this->conn->prepare('INSERT INTO building (name_building,nb_of_flats,address,id_user) VALUES (?,?,?,?)');
        $stmt->bind_param("sisi", $building_param['Name'],$building_param['nb_of_flats'] , $building_param['address'], $building_param['id_user']);
        $stmt->execute();
        $stmt->close();
    }
    
    public function update_building($building_param){

        $stmt = $this->conn->prepare('UPDATE building SET name_building = ?, nb_of_flats = ?, address = ?, id_user = ? WHERE id_building = ?')     ;
        $stmt->bind_param("sisii", $building_param['Name'],$building_param['nb_of_flats'] , $building_param['address'], $building_param['id_user'], $building_param["id_building"]);
        $stmt->execute();
        $stmt->close();
    }

    public function delete_building($id_building){
        $stmt = $this->conn->prepare('DELETE FROM building WHERE id_building = ?');
        $stmt->bind_param('i', $id_building);
        $stmt->execute();
        $stmt->close();
    }


    public function getBuilding($name_building){
        $role = $_SESSION['Role'];
        $idUser = $_SESSION['IDuser'];


        if ($role == "admin"){
            $stmt = $this->conn->prepare('SELECT * FROM building WHERE building.name_building LIKE CONCAT("%",?,"%")');
            $stmt->bind_param('s',$name_building);
        }
        if ($role == "BM"){
            $stmt = $this->conn->prepare('SELECT * FROM building WHERE building.id_user = ?');
            $stmt->bind_param('i', $idUser);
        }

        $stmt->execute();
        $res = $stmt->get_result();

        $rows = array();
        while ($row = $res->fetch_assoc()) {
            $rows[] = ['id_building' => $row['id_building'], 'name_building' => $row['name_building'], 'nb_of_flats' => $row['nb_of_flats'],'address' => $row['address']];
        }
        $stmt->close();

        return $rows;
    }

    public function setBuilding($id_building){
        $stmt = $this->conn->prepare('SELECT * FROM building WHERE id_building = ? ');
        $stmt->bind_param('i',$id_building);

        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        $this->ID = $res["id_building"];
        $this->address = $res["address"];
        $this->name_building = $res["name_building"];
        $this->nb_of_flats = $res["nb_of_flats"];
        $this->id_BM = $res["id_user"];

    }

    public function get(){

        $user = new Users();
        $user->setCurrentUser($this->id_BM);
        $building = [["name" => 'ID', 'value' => $this->getID()],
            ["name" => 'Name_bulding', 'value' => $this->getName()],
            ["name" => 'Number_flat', 'value' => $this->getNbflats()],
            ["name" => 'Adresse', 'value' =>  $this->getaddress()],
            ["name" => 'BM_name', 'value' =>  $user->getFirstName().' '.$user->getLastName()],
            ["name" => 'id_BM', 'value' =>  $this->id_BM]];
        return $building;
    }

}

?>