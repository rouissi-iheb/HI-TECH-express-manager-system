<?php
require_once('../includes/classes/typeArticle.class.php');
$type = new typeArticle();
$i=0;
foreach($type->getAll() as $row){
  if($i == 0){
    echo '<option value="'.$row['id'].'" selected>'.$row['type'].'</option>';
    $i++;
  }else{
    echo '<option value="'.$row['id'].'">'.$row['type'].'</option>';
  }

}
?>
