<?php
    include("db_connect.php");
    $pharmacist_id = $_GET["id"];
    
    $res = mysqli_query($con,"Delete from pharmacist where pharmacist_id=$pharmacist_id");
    if(isset($res)){
        header("Location:view_pharmacist.php");
    }else{
        echo "error";
    }
?>