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
    private $BM;  
    private $name;
    private $nb_of_flats;
    private $address;

    private $conn;

    public function getID()
    {return $this->ID;}

    public function getName()
    {return $this->name;}

    
    public function getBM()
    {return $this->BM;}
    
    public function getflats()
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
        $stmt->bind_param("sisi", $building_param['name_building'],$building_param['nb_of_flats'] , $building_param['address'], $building_param['id_user']);
        $stmt->execute();
        $stmt->close();
    }
    
    public function update_building($building_param){

        $stmt = $this->conn->prepare('UPDATE building SET name_building = ?, nb_of_flats = ?, address = ?, id_user = ? WHERE id = ?')     ;
        $stmt->bind_param("sisi", $building_param['name_building'],$building_param['nb_of_flats'] , $building_param['address'], $building_param['id_user']);
        $stmt->execute();
        $stmt->close();



    }


}

?>