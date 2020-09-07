<?php
require_once('../includes/classes/client.class.php');
$c = new client();
$resp = json_encode($c->rechercher(urldecode($_GET['req'])));
print $resp;//substr($resp,1,strlen($resp)-2);
//$data->nom
?>
