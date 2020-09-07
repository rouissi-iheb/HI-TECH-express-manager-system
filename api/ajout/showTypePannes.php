<?php
require_once('../includes/classes/panneArticle.class.php');
$panne = new panneArticle();
$i=0;
foreach($panne->getAll() as $row){
if($i==0){
  echo '<option value="'.$row['id'].'" selected>'.$row['panne'].'</option>';
  $i++;
}else{
  echo '<option value="'.$row['id'].'">'.$row['panne'].'</option>';
}
}
?>
