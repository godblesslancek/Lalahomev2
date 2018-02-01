<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 29/01/2018
 * Time: 17:50
 */


class BuildingController{

    public function getBuildingList(){

        if(helper::checkSession(array('IDuser'))){
            $building = new Building();
            if ($_GET['name'] == "undefined")
                $name  = "";
            else
                $name = $_GET['name'];
            echo json_encode($building->getBuilding($name));
        }
        else
            echo json_encode("failed");
    }

    public function createBuilding(){
        if(helper::checkSession(array('IDuser')) && helper::checkPost(array('Name','Number_flat','Adresse','BM'))){
            $building = new Building();
            $building_params = [
                "Name" => $_POST['Name'],
                "nb_of_flats" => $_POST['Number_flat'],
                "address" => $_POST["Adresse"],
                'id_user' => $_POST['BM']
            ];

            $building->create_building($building_params);
            header('Location: index.php?controller=pages&action=building_list');
        }
        else
            echo json_encode("failed");
    }

    public function updateBuilding(){
        if(helper::checkSession(array('IDuser')) && helper::checkPost(array('Name',"Number_flat","Adresse", "id_BM","ID"))){
            $building = new Building();
            $building_params = [
                "Name" => $_POST['Name'],
                "nb_of_flats" => $_POST['Number_flat'],
                "address" => $_POST["Adresse"],
                'id_user' => $_POST['id_BM'],
                'id_building' => $_POST["ID"]
            ];
            $building->update_building($building_params);
            header('Location: index.php?controller=pages&action=building_list');
        }
        else
            echo json_encode("failed");
    }

    public function deleteBuilding(){
        if(helper::checkSession(array('IDuser')) && helper::checkPost(array('id_building'))){
            $building = new Building();
            $building->delete_building($_POST['id_building']);
            echo json_encode("ok");
        }
        else
            echo json_encode("failed");
    }

    public function getBuilding(){
        if (helper::checkSession(['IDuser']) && helper::checkPost(['id_building'])){
            $building = new Building();
            $building->setBuilding($_POST['id_building']);
            echo json_encode($building->get());
        }
}

}
