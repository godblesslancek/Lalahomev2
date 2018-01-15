<?php
require_once('Model/Effectors.php');
echo 'Bonjour et bienvenue dans votre environnement de test.';

$monCapteurTest = new Effector;

$monCapteurTest->create_effector(array("type_effector"=>'temp',"id_room"=>2,"value_effector"=>True));

echo $monCapteurTest->ID;



