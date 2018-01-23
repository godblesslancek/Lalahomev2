<?php
/* récupérer état capteurs (param=idpiece,typecapteur, return etat)

changer etat capteur (param= idcapteur)

*/


class SensorController{


    public function getSensorState() {

        if(helper::checkGet(array('id_sensor'))){
            $sensor = new Sensor();
            $sensor->set_sensor($_GET['id_sensor']);
            echo json_encode($sensor->getValueSensor());
        }
        else
            echo json_encode("failed");
    }

    public function changeState(){
        if(helper::checkGet(array('id_sensor'))){
            $sensor = new Sensor();
            $sensor->set_sensor($_GET['id_sensor']);
            $sensor->setValue();

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















