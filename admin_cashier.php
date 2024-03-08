<?php
    include("db_connect.php");
?>

<html>
    <head>
        <title>Admin Cashier</title>
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
        div{
            display: flex;
            flex-direction: column;
            margin: 5% auto;
            background-color: white;
            width: 30%;
            padding: 2%;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        div *{
            padding: 5%;
            margin-top: 3%;
            text-align: center;
            color: #000;
            background-color: #f2f2f2;
            border-radius: 20px;
            text-decoration: none;
        }
    </style>
    <body>
        <div>
            <a href="view_cashier.php">View Cashier</a>
            <a href="add_cashier.php">Add Cashier</a>
            <a href="admin.php">Home</a>
            <a href="index.php">logout</a>
        </div>
    </body>
</html>