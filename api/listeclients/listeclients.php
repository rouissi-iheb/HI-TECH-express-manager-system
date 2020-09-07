<?php
require_once('../includes/classes/client.class.php');
$c = new client();
$liste = $c->listeClients();
for($i=0;$i<count($liste);$i++){
  $liste[$i]['totale'] = $c->countArticles($liste[$i]['id'],'totale');
  $liste[$i]['enattente'] = $c->countArticles($liste[$i]['id'],'enattente');
  $liste[$i]['encours'] = $c->countArticles($liste[$i]['id'],'encours');
  $liste[$i]['reparer'] = $c->countArticles($liste[$i]['id'],'repare');
  $liste[$i]['unreparable'] = $c->countArticles($liste[$i]['id'],'unreparable');
  $liste[$i]['sortie'] = $c->countArticles($liste[$i]['id'],'sortie');
}
echo json_encode($liste);
?>
