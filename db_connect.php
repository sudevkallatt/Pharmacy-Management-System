<?php
    $l = "localhost";
    $u = "root";
    $p = "";
    $db = "pharmacy";
    $con = mysqli_connect($l,$u,$p,$db);
    if(!$con){
        die("not connected: ".mysqli_connect_error());
    }
?>