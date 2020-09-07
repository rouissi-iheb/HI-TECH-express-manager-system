<?php
session_start();

require_once('../includes/classes/article.class.php');
require_once('../includes/classes/client.class.php');
require_once('../includes/classes/panneArticle.class.php');
require_once('../includes/classes/typeArticle.class.php');
require_once('../includes/classes/intervention.class.php');
require_once('../includes/classes/users.class.php');

$a = new article();
$c = new client();
$p = new panneArticle();
$t = new typeArticle();
$i = new intervention();
$u = new user();
$id = $_GET['id'];
$data = $a->getArticle($id);
$client = $c->showData($data['id_client']);
$panne = $p->getById($data['id_panne']);
$type = $t->getById($data['id_type']);
/*
print_r($data);
print_r($client[0]);
echo $panne." / ".$type;
foreach($i->getAllByArticle($id) as $row){
}
*/

$full = $data;
$full['client'] = $client[0];
$full['panne'] = $panne;
$full['type'] = $type;
$full['user'] = $u->getData($_SESSION['idUser']);
$prixtotale = 0;
foreach($i->getAllByArticle($id) as $row){
  $prixtotale = $prixtotale + $row['prix'];
}
$full['prixtotale'] = $prixtotale;

//$full['interv'] = $i->getAllByArticle($id);

if(isset($_GET['intervention'])){
  echo json_encode($i->getAllByArticle($id));
}else{
  echo json_encode($full);
}





















?>
