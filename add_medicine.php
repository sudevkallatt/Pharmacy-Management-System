<?php
    include("db_connect.php");

    $pres_id = $_GET["pres_id"];
    $result = mysqli_query($con,"select * from customer where pres_id='$pres_id';");
    $row = mysqli_fetch_array($result);

    if(isset($_POST["submit"])){
        $drug=$_POST["drug"];
        $strength=$_POST["strength"];
        $dose=$_POST["dose"];
        $quantity=$_POST["quantity"];

        if($drug=="Drug name"){
            echo '<script language="javascript">';
            echo 'alert("Enter Drug Name.")';
            echo '</script>';
        }else{
            $res=mysqli_query($con,"Insert into prescription values('$pres_id','$drug','$strength','$dose','$quantity');");
        }
    }
?>

<html>
    <head>
        <title>Add Medicine</title>
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
            <a href="create_customer.php">Back</a>
        </nav>
        <form method="post">
            <h1>Prescribe more drugs</h1>
            <label>Customer Name: <?php echo $row["customer_name"];?></label><br>
            <label>Customer Phone: <?php echo $row["phone"];?></label><br>
            <select name="drug">
                <option selected>Drug name</option>
                <?php
                    $drugs=mysqli_query($con,"select drug_name from stock;");
                    while($row = mysqli_fetch_array($drugs)){
                        echo "<option>".$row["drug_name"]."</option>";
                    }
                ?>
            </select><br>
            <input type="text" name="strength" placeholder="Strength (eg: 100mg)"><br>
            <input type="text" name="dose" placeholder="Dose (eg: 1x3)"><br>
            <input type="text" name="quantity" placeholder="Quantity"><br>
            <input type="submit" name="submit">
        </form>
        <a href="view_customer.php">View Customer</a>
        <a href="index.php">logout</a>
    </body>
</html>