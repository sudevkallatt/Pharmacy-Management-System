<html>
    <head>
        <title>View Pharmacist</title>
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
            <a href="admin_pharmacist.php">Back</a>
            <a href="index.php">logout</a>
        </nav>
        <?php
            include("db_connect.php");
            $results = mysqli_query($con, "SELECT * FROM pharmacist");
             
				
        echo "<table>";
        echo "<tr> <th>ID</th><th>Firstname </th> <th>Lastname </th> <th>Username </th><th>Update </th><th>Delete</th></tr>";

        while($row = mysqli_fetch_array($results )) {
                
                echo "<tr>";
                
                echo '<td>' . $row['pharmacist_id'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				?>
				<td><a href="update_pharmacist.php?id=<?php echo $row['pharmacist_id']?>">update</a></td>
				<td><a href="delete_pharmacist.php?id=<?php echo $row['pharmacist_id']?>">delete</a></td>
                <?php
		 } 
        echo "</table>";
        ?>
    </body>
</html>