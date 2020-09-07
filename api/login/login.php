<?php
require_once("../includes/classes/users.class.php");
require_once("../includes/session.php");
$data = json_decode(file_get_contents('php://input'));
$u = new user();

if($u->login($data->user,$data->pass) == false){
  echo 'error';
}else{
  setSession($u->login($data->user,$data->pass));
  echo 'connected';
}


?>
