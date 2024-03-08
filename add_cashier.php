<?php
    include("db_connect.php");
?>

<html>
    <head>
        <title>Add Cashier</title>
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
            <a href="admin_cashier.php">Back</a>
            <a href="index.php">logout</a>
        </nav>  
        <h1>Add Cashier</h1>
        <form method="post">
            <input name="first_name" type="text" placeholder="First Name"><br>
            <input name="last_name" type="text" placeholder="Last Name"><br>
            <input name="staff_id" type="text" placeholder="Staff id"><br>
            <input name="postal_address" type="text" placeholder="Postal Address"><br>
            <input name="phone" type="text" placeholder="Phone"><br>
            <input name="email" type="text" placeholder="Email"><br>
            <input name="username" type="text" placeholder="Username"><br>
            <input name="password" type="text" placeholder="Password"><br>
            <input name="submit" type="submit" value="Submit">
        </form>
        <a href="admin_pharmacist.php">Back</a>
        <a href="index.php">logout</a>
    </body>
</html>

<?php
    if(isset($_POST['submit'])){
        $first_name=$_POST["first_name"];
        $last_name=$_POST["last_name"];
        $staff_id=$_POST["staff_id"];
        $postal_address=$_POST["postal_address"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $rows = mysqli_query($con,"select cashier_id from cashier;");
        $cashier_id=mysqli_num_rows($rows)+1;
        $res = mysqli_query($con,"Insert into cashier (first_name,last_name,staff_id,postal_address,phone,email,username,password) values('$first_name','$last_name','$staff_id','$postal_address','$phone','$email','$username','$password');");
        if($res){
            header("Location:admin_cashier.php"); 
        }else{
            echo "error";
        }
    }
?>