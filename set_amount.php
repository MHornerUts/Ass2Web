<?php
session_start();


$obj = $_REQUEST["obj"];

$array = json_decode($obj, true);

unset($_SESSION["cart"]);

$_SESSION["cart"] = $array;

?>
