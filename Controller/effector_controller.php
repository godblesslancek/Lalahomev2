<?php
/* récupérer état capteurs (param=idpiece,typecapteur, return etat)

changer etat capteur (param= idcapteur)

*/


class EffectorController{


    public function getEffectorState() {

        if(helper::checkGet(array('id_effector'))){
            $effector = new Effector();
            $effector->set_effector($_GET['id_effector']);
            echo json_encode($effector->getValueEffector());
        }
        else
            echo json_encode("failed");
    }

    public function changeState(){
        if(helper::checkGet(array('id_effector'))){
            $effector = new Effector();
            $effector->set_effector($_GET['id_effector']);
            $effector->changeValue();

            echo json_encode("done");
        }
        else
            echo json_encode("failed");

    }

    public function getEffectorList(){
        if(helper::checkGet(array('id_room'))){
            $effector = new Effector();
            echo json_encode($effector->getEffectorsList($_GET["id_room"]));
        }
        else
            echo json_encode("failed");
    }
}















