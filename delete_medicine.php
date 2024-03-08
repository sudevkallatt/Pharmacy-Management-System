<?php
    include("db_connect.php");

    $pres_id = $_GET["pres_id"];
    $drug_name = $_GET["drug_name"];
    $query = mysqli_query($con,"delete from prescription where pres_id='$pres_id' and drug_name='$drug_name';");
    if($query)
        header("Location:view_customer.php");
?>