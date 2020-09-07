<?php
require_once("database.class.php");
class user extends database
{
  function __construct()
  {
    parent::__construct();
  }

  function addUser($name,$user,$pass,$role){
    $res = $this->pdo->prepare("insert into users (fullName,user,pass,role) values(?,?,?,?)");
    $res->execute(array($name,$user,$pass,$role));
  }

  function login($user,$pass){
    $res = $this->pdo->prepare("select count(*) from users where user = ? and pass = ?");
    $res->execute(array($user,$pass));
    $count = $res->fetchAll(PDO::FETCH_ASSOC)[0]['count(*)'];
    if($count == 0){
      return false;
    }else{
      $res = $this->pdo->prepare("select * from users where user = ? and pass = ?");
      $res->execute(array($user,$pass));
      return $res->fetchAll(PDO::FETCH_ASSOC)[0];
    }
  }

  function getData($id){
    $res = $this->pdo->prepare("select * from users where id = ?");
    $res->execute(array($id));
    return $res->fetchAll(PDO::FETCH_ASSOC)[0];
  }

}
?>
