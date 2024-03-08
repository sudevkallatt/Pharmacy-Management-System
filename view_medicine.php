<?php
    include("db_connect.php");

    $pres_id=$_GET["pres_id"];

    $query=mysqli_query($con,"select * from prescription where pres_id='$pres_id';");
?>

<html>
    <head>
        <title>View Medicine</title>
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
        table{
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            background-color: white;
            margin: 5% auto;
            border-radius: 5px;
            padding: 2%;
            width: 50%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        table th,
        table td {
        border: 1px solid #ddd;
        padding: 8px;
        }
        table th {
        background-color: #f2f2f2;
        text-align: left;
        }
        table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
        }
        table tbody tr:hover {
        background-color: #f2f2f2;
        }
    </style>
    <body>
        <nav>    
            <a href="view_customer.php">Back</a>
            <a href="index.php">Logout</a>
        </nav>
        <table cellspacing="3">
            <tr>
                <th>Prescription ID</th>
                <th>Drug Name</th>
                <th>Strength</th>
                <th>Dose</th>
                <th>quantity</th>
                <th>Delete</th>
            </tr>
            <?php
                while($row=mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$row["pres_id"]."</td>";
                    echo "<td>".$row["drug_name"]."</td>";
                    echo "<td>".$row["strength"]."</td>";
                    echo "<td>".$row["dose"]."</td>";
                    echo "<td>".$row["quantity"]."</td>";
                    echo "<td><a href='delete_medicine.php?pres_id=".$pres_id."&drug_name=".$row["drug_name"]."'>delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>