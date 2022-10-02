<?php
session_start();

$array = $_SESSION["cart"];


$newStr = json_encode($array);

echo $newStr;


session_destroy();


?>
