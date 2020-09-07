<?php
session_start();
require_once("../includes/classes/intervention.class.php");
$i = new intervention();
$data = json_decode(file_get_contents('php://input'));
$resp = $i->Add($data->ida,$_SESSION['idUser'],$data->prix,$data->details,$data->etat);
print_r($resp);
?>
