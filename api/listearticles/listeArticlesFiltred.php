<?php
function genTable($filter){
  require_once('../includes/classes/article.class.php');
  require_once('../includes/classes/client.class.php');
  require_once('../includes/classes/panneArticle.class.php');
  require_once('../includes/classes/typeArticle.class.php');
  $a = new article();
  $c = new client();
  $pa = new panneArticle();
  $ta = new typeArticle();
  $liste = $a->getFiltred($filter);
  $table = '';
  foreach($liste as $row){
    $nomcli = $c->showData($row['id_client'])[0]['nom'];
    $telcli = $c->showData($row['id_client'])[0]['telephone'];
    $typea  = $ta->getById($row['id_type']);
    $pannea = $pa->getById($row['id_panne']);
    $id =
    $table.='
      <tr>
        <td>'.$row['id'].'</td>
        <td>'.$nomcli.'</td>
        <td>'.$telcli.'</td>
        <td>'.$row['marque'].'</td>
        <td >'.$typea.'</td>
        <td >'.$row['ref'].'</td>
        <td >'.$pannea.'</td>
        <td>'.$row['date'].'</td>
        <td >'.$row['etat'].'</td> <td>';
        if($filter=='encours' || $filter=='enattente'){
          $table.='<a class="btn btn-success btn-sm" href="intervenir.php?id='.$row['id'].'">intervenir</a> ';
        }
        if($filter=='repare'){
          $table.='<button class="btn btn-danger btn-sm" onclick="confirmer('.$row['id'].')">sortir</button> ';
        }

        $table.='<a class="btn btn-primary btn-sm" target="_blank" href="imprimer.php?id='.$row['id'].'&intervention">imprimer</a></td>
        </tr>';
  }
  return $table;
}
$table = '';
if($_GET['filter'] == 'encours'){
  $table .= genTable('encours');
  $table .= genTable('enattente');
}else{
  $table = genTable($_GET['filter']);
}
echo $table;
?>
