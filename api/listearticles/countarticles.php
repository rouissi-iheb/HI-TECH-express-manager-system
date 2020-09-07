<?php
require_once('../includes/classes/article.class.php');
$a = new article();
if(isset($_GET['totale'])){
  echo $a->countArticles('totale');
}elseif(isset($_GET['encours'])){
  echo $a->countArticles('encours');
}elseif(isset($_GET['enattente'])){
  echo $a->countArticles('enattente');
}elseif(isset($_GET['repare'])){
  echo $a->countArticles('repare');
}elseif(isset($_GET['unreparable'])){
  echo $a->countArticles('unreparable');
}elseif(isset($_GET['sortie'])){
  echo $a->countArticles('sortie');
}
?>
