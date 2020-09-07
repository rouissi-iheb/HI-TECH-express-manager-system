<?php
require_once("database.class.php");
class intervention extends database
{

  function __construct()
  {
    parent::__construct();
  }

  function Add($ida,$idu,$prix,$details,$etat){
    $prix = str_replace(",",".",$prix);
    $res = $this->pdo->prepare("insert into intervention (id_article,id_user,prix,detailes,date) values(?,?,?,?,?)");
    $res->execute(array($ida,$idu,$prix,$details,'20'.date("y-m-d")));

    $res = $this->pdo->prepare("update articles set etat = ? where id = ?");
    $res->execute(array($etat,$ida));


    $res = $this->pdo->prepare("select count(*) from intervention where id_article = ?");
    $res->execute(array($ida));
    $count = $res->fetchAll(PDO::FETCH_ASSOC)[0]['count(*)'];
    if($count == '1'){
      $res = $this->pdo->prepare("update articles set datedebint = ? where id = ?");
      $res->execute(array('20'.date("y-m-d"),$ida));
    }
    if($etat== 'unreparable' || $etat== 'repare'){
      $res = $this->pdo->prepare("update articles set datefinint = ? where id = ?");
      $res->execute(array('20'.date("y-m-d"),$ida));
    }
  }

  function getAllByArticle($id){
    $res = $this->pdo->prepare("select * from intervention where id_article = ?");
    $res->execute(array($id));
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
}
 ?>
