<?php  

require_once("config.php");

$root = new Usuario();

$root->loadbyid(3);

echo $root;

?>