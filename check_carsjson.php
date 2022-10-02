<?php
session_start();


$brandModelYear = $_REQUEST["model"];


$strJSONContents = file_get_contents("cars.json");

$array = json_decode($strJSONContents, true);



foreach ($array["cars"] as $value) {
  $check = $value["brand"] . "-" . $value["model"] . "-" . $value["modelyear"] ;
  
  if ($check == $brandModelYear) {
      echo $value["availability"] ;
      
      if ($value["availability"] == "Y") {
        $_SESSION["cart"][$check] = $value;
      }
  }
   
}


?>