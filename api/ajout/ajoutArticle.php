<?php
require_once("../includes/classes/client.class.php");
require_once("../includes/classes/article.class.php");
$data = json_decode(file_get_contents('php://input'));
$a = new article();
if($data->id == ''){
  $c = new client();
  $id_client = $c->addClient($data->nom,$data->tel)[0]['id'];
}else{
  $id_client = $data->id;
}
echo $a->addArticle($id_client,$data->typeid,$data->typeautre,$data->marque,$data->referance,$data->remarques,$data->panneid,$data->panneautre);
?>
