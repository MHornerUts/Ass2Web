<?php
session_start();


$brandModelYear = $_REQUEST["model"];


unset($_SESSION["cart"][$brandModelYear])


?>
