<?php
    include("db_connect.php");
    $cashier_id = $_GET["id"];
    
    $res = mysqli_query($con,"Delete from cashier where cashier_id=$cashier_id");
    if(isset($res)){
        header("Location:view_cashier.php");
    }else{
        echo "error";
    }
?>