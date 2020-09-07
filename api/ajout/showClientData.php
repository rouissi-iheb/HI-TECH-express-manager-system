<?php
require_once('../includes/classes/client.class.php');
$c = new client();
$resp = json_encode($c->showData(urldecode($_GET['id'])));
print substr($resp,1,strlen($resp)-2);
?>
