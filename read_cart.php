<?php
session_start();

if (isset($_SESSION["cart"])) {
    if (!empty($_SESSION["cart"])){
        $array = $_SESSION["cart"];
    
    
        $newStr = json_encode($array);
    
        echo $newStr;
    } else {
        echo "Empty!";
    }
} else {
    echo "Empty!";
}  

?>
