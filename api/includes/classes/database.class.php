<?php
abstract class database
{
  protected $pdo;
  function __construct()
  {
    include("config.php");
    $this->pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME",$DB_USER,$DB_PASS);
  }
}

?>
