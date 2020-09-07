<?php
require_once("database.class.php");
class typeArticle extends database
{
  function __construct()
  {
    parent::__construct();
  }

  function getAll(){
    $req = "select * from types_article";
    $res = $this->pdo->prepare($req);
    $res->execute(array());
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  function getById($id){
    $req = "select type from types_article where id= ?";
    $res = $this->pdo->prepare($req);
    $res->execute(array($id));
    return $res->fetchAll(PDO::FETCH_ASSOC)[0]['type'];
  }
}


?>
