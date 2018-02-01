<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 01/02/2018
 * Time: 14:51
 */

class SensorController
{
    public function getSensorValue() {

        if(helper::checkGet(array('id_sensor'))){
            $sensor = new Sensor();
            $sensor->set_sensor($_GET['id_sensor']);
            echo json_encode($sensor->getvaluesensor());
        }
        else
            echo json_encode("failed");
    }

    public function changeValue(){
        if(helper::checkGet(array('id_sensor','value'))){
            $sensor = new Sensor();
            $sensor->set_sensor($_GET['id_sensor']);
            $sensor->changeValue((int)$_GET['value']);

            echo json_encode("done");
        }
        else
            echo json_encode("failed");

    }

    public function getSensorsList(){
        if(helper::checkGet(array('id_room'))){
            $sensor = new Sensor();
            echo json_encode($sensor->getSensorsList($_GET["id_room"]));
        }
        else
            echo json_encode("failed");
    }

}