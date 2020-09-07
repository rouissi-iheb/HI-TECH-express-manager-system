<?php
session_start();
set_time_limit(20);
function setSession($userData){
  $_SESSION['idUser'] = $userData['id'];
  $_SESSION['fullName'] = $userData['fullName'];
  $_SESSION['role'] = $userData['role'];
}
function checkSession(){
  if(!isset($_SESSION['idUser']) || $_SESSION['idUser'] == ''){
    return false;
  }else{
    return true;
  }
}
function logout(){
  $_SESSION = array();
  session_destroy();
  unset($_SESSION);
}
?>
