<html>
    <head>
        <title>View Customer</title>
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
            <a href="customer.php">Back</a>
            <a href="index.php">logout</a>
        </nav>
        <?php
            include("db_connect.php");
            $results = mysqli_query($con, "SELECT * FROM customer");
             
				
        echo "<table cellspacing='5'>";
        echo "<tr> <th>Customer Name</th> <th>Phone no.</th> <th>Date </th> <th>Add medicine </th> <th>View medicine</th> <th>Delete</th> </tr>";

        while($row = mysqli_fetch_array($results )) {
                
                echo "<tr>";
                
                echo '<td>' . $row['customer_name'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['date'] . '</td>';
				?>
				<td><a href="add_medicine.php?pres_id=<?php echo $row['pres_id']?>">add</a></td>
                <td><a href="view_medicine.php?pres_id=<?php echo $row['pres_id']?>">view</a></td>
				<td><a href="delete_customer.php?pres_id=<?php echo $row['pres_id']?>">delete</a></td>

                </tr>
                <?php
		} 
        echo "</table>";
        ?>
    </body>
</html>