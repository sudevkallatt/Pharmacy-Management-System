<?php
    include("db_connect.php");
?>

<html>
    <head>
        <title>Stock</title>
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
            <a href="pharmacist.php">Home</a>
            <a href="index.php">logout</a>
        </nav>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Available stock</th>
                <th>Description</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            <?php
                $results = mysqli_query($con,"Select stock_id,drug_name,quantity,description,status from stock;");
                while($row = mysqli_fetch_array($results)){
                    echo "<tr>";
                    echo "<td>".$row["stock_id"]."</td>";
                    echo "<td>".$row["drug_name"]."</td>";
                    echo "<td>".$row["quantity"]."</td>";
                    echo "<td>".$row["description"]."</td>";
                    echo "<td>".$row["status"]."</td>";
                    ?>
                    <td><a href="delete_stock.php?<?php echo"id=".$row['stock_id']; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
        </table>
    </body>
</html>