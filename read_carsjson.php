<?php

$strJSONContents = file_get_contents("cars.json");

$array = json_decode($strJSONContents, true);


$newStr = json_encode($array);

echo $newStr;
?>