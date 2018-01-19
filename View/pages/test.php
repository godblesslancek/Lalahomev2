<?php
require_once('Model/Effectors.php');
echo 'Bonjour et bienvenue dans votre environnement de test.sfhjbqsfghj ';

$monCapteurTest = new Effector();

$monCapteurTest->create_effector(array("type_effector"=>"light","id_room"=>2,"value_effector"=>1));

echo $monCapteurTest->ID;

