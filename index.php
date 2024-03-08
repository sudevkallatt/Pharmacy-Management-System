<?php
    session_start();
    include("db_connect.php");
    if(isset($_POST["submit"])){
        $u = $_POST["username"];
        $p = $_POST["password"];
        $position = $_POST["position"];
        
        if($position != ""){
            if($position == "Admin"){
                $results = mysqli_query($con, "SELECT username FROM admin WHERE username = '$u' AND password = '$p'");
                $count = mysqli_num_rows($results);
                if($count == 1){
                    $_SESSION["username"] = $u;
                    header("Location:admin.php");
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("No such user is found.")';
                    echo '</script>';
                }
            }
            if($position == "Pharmacist"){
                $results = mysqli_query($con, "SELECT username FROM pharmacist WHERE username = '$u' AND password = '$p'");
                $count = mysqli_num_rows($results);
                if($count == 1){
                    $_SESSION["username"] = $u;
                    header("Location:pharmacist.php");
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("No such user is found.")';
                    echo '</script>';
                }
            }
            if($position == "Cashier"){
                $results = mysqli_query($con, "SELECT username FROM cashier WHERE username = '$u' AND password = '$p'");
                $count = mysqli_num_rows($results);
                if($count == 1){
                    $_SESSION["username"] = $u;
                    header("Location:cashier.php");
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("No such user is found.")';
                    echo '</script>';
                }
            }
        }else{
            echo "Please login with correct credentials ";
        }
    }
?>

<html>
    <head>
        <title>Login Page</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700&display=swap" rel="stylesheet">
        <style>
            *{
                box-sizing: border-box;
                font-family: "manrope","sans-serif";
            }
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                padding-top: 100px;
                background-color: #f2f2f2;
            }
            form{
                width: 30%;
                height: 30%;
                background-color: white;
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 1%;
                box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }
            form *:not(h1){
                margin-top: 5%;
                padding: 3%;
                border: 2px solid rgba(0,0,0,0.1);
                border-radius: 20px;
                background-color: white;
            }
            [name="submit"]{
                border-color: #3498db;
                background-color: #3498db;
                color: white;
                cursor:pointer;
            }
            h1{
                text-align: center;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <form action = "index.php" method = "post">
        <h1>Login</h1>
        <select name="position">
	        <option>Pharmacist</option>
			<option>Admin</option>
			<option>Cashier</option>
		</select>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
        </form>
    </body>
</html>