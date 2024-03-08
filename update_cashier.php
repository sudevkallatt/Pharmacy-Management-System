<?php
    session_start();
    include("db_connect.php");
    $cashier_id = $_GET["id"];

    $results = mysqli_query($con,"SELECT * from cashier where cashier_id=$cashier_id");
    $result = mysqli_fetch_array($results);
    $first_name = $result["first_name"];
    $last_name = $result["last_name"];
    $staff_id = $result["staff_id"];
    $postal_address = $result["postal_address"];
    $phone = $result["phone"];
    $email = $result["email"];
    $username = $result["username"];
    $password = $result["password"];

    
?>

<html>
    <head>
        <title>Update Cashier</title>
    </head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *{
            box-sizing: border-box;
            font-family: "manrope","sans-serif";
        }
    </style>
    <body>
        <h1>Update Cashier</h1>
        <form method="post">  
            <label>First Name</label>
            <input name="first_name" type="text" value="<?php echo $first_name?>"><br>
            <label>Last Name</label>
            <input name="last_name" type="text" value="<?php echo $last_name?>"><br>
            <label>Staff id</label>
            <input name="staff_id" type="text" value="<?php echo $staff_id?>"><br>
            <label>Postal Address</label>
            <input name="postal_address" type="text" value="<?php echo $postal_address?>"><br>
            <label>Phone</label>
            <input name="phone" type="text" value="<?php echo $phone?>"><br>
            <label>Email</label>
            <input name="email" type="text" value="<?php echo $email?>"><br>
            <label>Username</label>
            <input name="username" type="text" value="<?php echo $username?>"><br>
            <label>Password</label>
            <input name="password" type="text" value="<?php echo $password?>"><br>
            <input name="submit" type="submit">
        </form>
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
        $res = mysqli_query($con,"Update cashier set first_name='$first_name', last_name='$last_name', staff_id='$staff_id',postal_address='$postal_address',phone='$phone',email='$email',username='$username', password='$password' WHERE cashier_id='$cashier_id'");
        if($res){
            header("Location:admin_cashier.php"); 
        }else{
            echo "error";
        }
    }
?>