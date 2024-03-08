<?php
    include("db_connect.php");
    $id = $_GET["id"];
    $result = mysqli_query($con,"delete from stock where stock_id=$id");
    if($result){
        header("Location:stock.php");
    }else{
        echo"No details in database";
    }
?>