<?php
require_once("database.class.php");
class client extends database
{
  function __construct()
  {
    parent::__construct();
  }
  function addClient($nom,$telephone){
    $req = "insert into client(nom,telephone) values(?,?)";
    $res = $this->pdo->prepare($req);
    $res->execute(array($nom,$telephone));
    $req = "select id from client where nom = ? and telephone = ?";
    $res = $this->pdo->prepare($req);
    $res->execute(array($nom,$telephone));
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
  function rechercher($nom){
    $res = $this->pdo->prepare("select * from client where nom like '%".$nom."%'");
    $res->execute(array());
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
  function showData($id){
    $res = $this->pdo->prepare("select * from client where id= ?");
    $res->execute(array($id));
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
  function listeClients(){
    $res = $this->pdo->prepare("select * from client");
    $res->execute(array());
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
  function countArticles($id,$etat){
    if($etat == 'totale'){
      $res = $this->pdo->prepare("select count(*) from articles where id_client = ?");
      $res->execute(array($id));
    }else{
      $res = $this->pdo->prepare("select count(*) from articles where id_client = ? and etat = ?");
      $res->execute(array($id,$etat));
    }
    return $res->fetchAll(PDO::FETCH_ASSOC)[0]['count(*)'];
  }
}
?>
