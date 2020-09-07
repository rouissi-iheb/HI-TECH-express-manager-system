<?php
require_once("database.class.php");
class article extends database
{
  function __construct()
  {
    parent::__construct();
  }
  function addArticle($id_client,$id_type,$autre_type,$marque,$ref,$remarques,$id_panne,$autre_panne){
    $res = $this->pdo->prepare("insert into articles (id_client,id_type,autretype,marque,ref,remarques,id_panne,autrepanne,date,etat) values(?,?,?,?,?,?,?,?,?,?)");
    $res->execute(array($id_client,$id_type,$autre_type,$marque,$ref,$remarques,$id_panne,$autre_panne,'20'.date("y-m-d"),"enattente"));
    $res = $this->pdo->prepare("select max(id) from articles");
    $res->execute(array());
    return $res->fetchAll(PDO::FETCH_ASSOC)[0]['max(id)'];
  }

  function getAll(){
    $res = $this->pdo->prepare("select * from articles");
    $res->execute(array());
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
  function getFiltred($etat){
    $res = $this->pdo->prepare("select * from articles where etat= ?");
    $res->execute(array($etat));
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
  function countArticles($etat){
    if($etat=="totale"){
      $res = $this->pdo->prepare("select count(*) from articles");
      $res->execute(array());
    }else{
      $res = $this->pdo->prepare("select count(*) from articles where etat= ?");
      $res->execute(array($etat));
    }
    return $res->fetchAll(PDO::FETCH_ASSOC)[0]['count(*)'];
  }

  function getArticle($id){
    $res = $this->pdo->prepare("select * from articles where id= ?");
    $res->execute(array($id));
    return $res->fetchAll(PDO::FETCH_ASSOC)[0];
  }

  function sortie($id){
    $res = $this->pdo->prepare("update articles set etat = 'sortie' , datesortie= ? where id = ?");
    $res->execute(array('20'.date("y-m-d"),$id));
  }

}
?>
