<?php
    include("db_connect.php");
    $id = $_GET["pres_id"];
    $result = mysqli_query($con,"delete from customer where pres_id='$id';");
    if($result){
        header("Location:view_customer.php");
    }else{
        echo "error invalid id";
    }
?>