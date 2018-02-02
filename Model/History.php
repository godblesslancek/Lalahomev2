<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 01/02/2018
 * Time: 18:05
 */

define('MYSQL_DATETIME_FORMAT','Y-m-d H:i:s');
class history
{
    private $conn;


    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    
    public function insert_sensor($sensor_command) {

        $stmt = $this->conn->prepare('INSERT INTO history_sensor (id_user, id_sensor,"value",date) VALUES(?,?,?,NOW())');
        $stmt->bind_param("iii",$sensor_command['id_user'],$sensor_command['id_sensor'],$sensor_command['value_sensor']);
        $stmt->exesute();
        $stmt->close();
    }

    public function insert_effector($effector_command) {

        $stmt = $this->conn->prepare('INSERT INTO history_effector (id_user,id_effector,value_effector,date) VALUES(?,?,?,NOW())');
        $stmt->bind_param("iii",$effector_command['id_user'],$effector_command['id_effector'],$effector_command['value_effector']);
        $stmt->exesute();
        $stmt->close();

    }

    public function getone_sensor($date,$id){

        $stmt = $this->conn->prepare('SELECT "value" FROM history_sensor WHERE id_sensor = ? AND date = ? ');
        $stmt->bind_param("is",$id,$date);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();
        while ($row = $resultat->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getone_effector($date,$id){

        $stmt = $this->conn->prepare('SELECT value_effector FROM history_effector WHERE id_effector = ? AND date = ?');
        $stmt->bind_param("is",$id,$date);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();
        while ($row = $resultat->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getintervalle_effector($date1,$date2,$id){

        $stmt = $this->conn->prepare('SELECT value_effector FROM history_effector WHERE id_effector = ? AND date BETWEEN ? AND ?');
        $stmt->bind_param("iss",$id,$date1,$date2);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();
        while ($row = $resultat->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getintervalle_sensor($date1,$date2,$id){

        $stmt = $this->conn->prepare('SELECT "value" FROM history_sensor WHERE id_sensor = ? AND date BETWEEN ? AND ?');
        $stmt->bind_param("iss",$id,$date1,$date2);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $rows = array();
        while ($row = $resultat->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }


    public function setHistorySensor($id){

        $stmt = $this->conn->prepare('SELECT * from history_sensor WHERE id_history_sensor = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $this->FirstName = $data['name_user'];
    }

    public function getHistoryDayFlat($type,$id_flat,$date){

        $datetime =new DateTime($date);
        if ($type == "temp"){
            $stmt = $this->conn->prepare('SELECT history_sensor.value , history_sensor.date,sensor.unit,room.name_room
                                                FROM history_sensor INNER JOIN sensor ON history_sensor.id_sensor = sensor.id_sensor
                                                INNER JOIN room On room.id_flat = ?
                                                WHERE  DATE(history_sensor.date) = ? AND sensor.type_sensor = ?');
            $stmt->bind_param('iss',$id_flat,$date,$type );
            $stmt->execute();
        }
        else{
            $stmt = $this->conn->prepare('SELECT history_effector.value, history_effector.date,room.name_room
                                                FROM history_effector INNER JOIN effector ON history_effector.id_effector = effector.id_effector
                                                INNER JOIN room On room.id_flat = ?
                                                WHERE  DATE(history_effector.date) = ? AND effector.type_effector = ?');
            $stmt->bind_param('iss',$id_flat,$date,$type );
            $stmt->execute();
        }

        $resultat = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $arr06 = array();
        $arr612 = array();
        $arr1218 = array();
        $arr1800 = array();
        while ($row = $resultat->fetch_assoc()) {

            $createDate = new DateTime($row["date"]);
            $datews = new DateTime($createDate->format("Y-m-d"));

            if($createDate <= $datews->add(new DateInterval("PT6H"))){
                $arr06[] = $row["value"];
            }
            elseif($createDate <= $datews->add(new DateInterval("PT12H"))){
                $arr612[] = $row["value"];
            }
            elseif($createDate <= $datews->add(new DateInterval("PT18H"))){
                $arr1218[] = $row["value"];
            }
            elseif($createDate <= $datews->add(new DateInterval("PT24H"))){
                $arr1800[] = $row["value"];
            }
        }
        $arrr = [["label" => "0-6h", "value" => $this->average($arr06)],
                ["label" => "6-12h" , "value" => $this->average($arr612) ],
                ["label" => "12-18h", "value" => $this->average($arr1218) ],
                [ "label"=> "18-00h" , "value" => $this->average($arr1800) ]];

        return $arrr;

    }

    public function getHistoryWeekFlat($type,$id_flat,$date,$datem){

        if ($type == "temp"){
            $stmt = $this->conn->prepare('SELECT history_sensor.value , history_sensor.date,sensor.unit,room.name_room
                                                FROM history_sensor INNER JOIN sensor ON history_sensor.id_sensor = sensor.id_sensor
                                                INNER JOIN room On room.id_flat = ?
                                                WHERE (history_sensor.date BETWEEN DATE(?) AND DATE(?)) AND sensor.type_sensor = ?');
            $stmt->bind_param('isss',$id_flat,$date,$datem,$type );
            $stmt->execute();
        }

        $resultat = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        $arr7 = array();
        while ($row = $resultat->fetch_assoc()) {

            $createDate = new DateTime($row["date"]);
            $datews = new DateTime($createDate->format("Y-m-d"));

            if($createDate <= $datews->modify('+1 day')){
                $arr1[] = $row["value"];
            }
            elseif($createDate <= $datews->modify('+2 day')){
                $arr2[] = $row["value"];
            }
            elseif($createDate <= $datews->modify('+3 day')){
                $arr3[] = $row["value"];
            }
            elseif($createDate <= $datews->modify('+4 day')){
                $arr4[] = $row["value"];
            }
            elseif($createDate <= $datews->modify('+5 day')){
                $arr5 = $row["value"];
            }
            elseif($createDate <= $datews->modify('+6 day')){
                $arr6[] = $row["value"];
            }
            elseif($createDate <= $datews->modify('+7 day')){
                $arr7[] = $row["value"];
            }
        }
        $arrr = [["label" => "Lundi", "value" => $this->average($arr1)],
            ["label" => "Mardi" , "value" => $this->average($arr2) ],
            ["label" => "Mercredi", "value" => $this->average($arr3) ],
            [ "label"=> "Jeudi" , "value" => $this->average($arr4) ],
            [ "label"=> "Vendred" , "value" => $this->average($arr5) ],
            [ "label"=> "Samedi" , "value" => $this->average($arr6) ],
            [ "label"=> "Dimanche" , "value" => $this->average($arr7)]];

        return $arrr;

    }
    private function average($a){
        if (count($a) == 0)
            return 0;
        return array_sum($a)/count($a);
    }


}

