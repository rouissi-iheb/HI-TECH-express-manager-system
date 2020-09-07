<?php
require_once('../includes/classes/article.class.php');
$a = new article();
$a->sortie($_GET['id']);
header('location:../../ListeArticles.php?repare');
?>
