<?php
    session_start();
    include("db_connect.php");

    /*$SN= mysqli_query ($con, "SELECT 1+MAX(serialno) FROM receipts;");
    $serial=mysqli_fetch_array($SN);
    if($serial[0]==''){
        $serialNo=1000; 
    }else{
        $serialNo=$serial[0];
    }
    */
    

?>

<html>
    <head>
        <title>Cashier</title>
    </head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *{
            box-sizing: border-box;
            font-family: "manrope","sans-serif";
        }
        body{
            background-color: #f2f2f2;
            margin: 0;
        }
        nav{
            display: flex;
            justify-content: right;
            padding: 1% 2%;
            background-color: white;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        nav > a{
            text-decoration: none;
            color: black;
            padding-left: 2%;
        }
        form{
            margin: 5% auto;
            width: 30%;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 1%;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        label{
            border: 0;
        }
        form *:not(h1){
            margin-top: 3%;
            padding: 3%;
            border: 2px solid rgba(0,0,0,0.1);
            border-radius: 20px;
            background-color: white;
        }
        [name="submit"]{
            border-color: #e6e6e6;
            background-color: #e6e6e6;
            cursor:pointer;
        }
        h1{
            text-align: center;
            font-weight: bold;
        }
    </style>
    <body>
        <nav>
            <a href="index.php">Logout</a>
        </nav>
        <h1>Process payment</h1>
        <form method="post">
            <input type="text" name="presID" placeholder="Prescription ID:">
            <select name="payment">
                <option>Cash</option>
                <option>Credit Card</option>
                <option>Google Pay</option>
                <option>Cheque</option>
            </select>
            <input type="submit" name="submit">
        </form>
    </body>
</html>

<?php

if(isset($_POST["submit"])){
    $payment=$_POST["payment"];
    $presID=$_POST["presID"];
    $user=$_SESSION["username"];
    $total = 0;

    $tot = mysqli_query($con,"Select drug_name,strength,quantity from prescription where pres_id='$presID';");
    if($tot){ 
        while($row = mysqli_fetch_array($tot)){
            $drugName = $row["drug_name"];
            $strength = $row["strength"];
            $quantity = $row["quantity"];

            $co = mysqli_query($con,"Select cost from stock where drug_name='$drugName' and strength='$strength';");
            $cos = mysqli_fetch_array($co);
            $cost = $cos["0"];

            $total += ($cost*$quantity);
        }

        echo "<h5>Total:</h5>".$total;
    }else{
        echo "invalid details";
    }
    /*$receiptNum = mysqli_query($con,"SELECT 1+MAX(receiptNo) FROM receipts;");
    $receiptNo = mysqli_fetch_array($receiptNum);

    $query = mysqli_query($con,"insert into receipts (receiptNo,pres_id,total,payType,serialno,served_by) values('$receiptNo','$presID','','$payment','$serialNo','$user');");
    */
}

?>