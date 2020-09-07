<?php
require_once('../includes/classes/article.class.php');
require_once('../includes/classes/client.class.php');
require_once('../includes/classes/panneArticle.class.php');
require_once('../includes/classes/typeArticle.class.php');
$a = new article();
$c = new client();
$pa = new panneArticle();
$ta = new typeArticle();
$liste = $a->getAll();
$table='';
$class="";
foreach($liste as $row){
  $nomcli = $c->showData($row['id_client'])[0]['nom'];
  $telcli = $c->showData($row['id_client'])[0]['telephone'];
  $typea  = $ta->getById($row['id_type']);
  $pannea = $pa->getById($row['id_panne']);
  if($row['etat']=="encours"){
    $class="table-primary";
  }elseif($row['etat']=="enattente"){
    $class="table-warning";
  }elseif($row['etat']=="repare"){
    $class="table-success";
  }elseif($row['etat']=="unreparable"){
    $class="table-danger";
  }elseif($row['etat']=="sortie"){
    $class="table-secondary";
  }
  $table.='
    <tr class="'.$class.'">
      <td>'.$row['id'].'</td>
      <td>'.$nomcli.'</td>
      <td>'.$telcli.'</td>
      <td>'.$row['marque'].'</td>
      <td >'.$typea.'</td>
      <td >'.$row['ref'].'</td>
      <td >'.$pannea.'</td>
      <td>'.$row['date'].'</td>
      <td >'.$row['etat'].'</td>
    </tr>
  ';
}
echo $table;
?>
