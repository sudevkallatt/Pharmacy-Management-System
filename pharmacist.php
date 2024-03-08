<?php
    session_start();
    include("db_connect.php");
?>

<html>
    <head>
        <title>Pharmacist</title>
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
            padding: 0 2%;
            background-color: white;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
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
        <nav>
            <p><?php echo "Welcome: ".$_SESSION["username"]; ?></p>
        </nav>
        <div>
            <a href="customer.php">Customer</a>
            <a href="stock.php">Stock</a>
            <a href="index.php">logout</a>
        </div>
    </body>
</html>