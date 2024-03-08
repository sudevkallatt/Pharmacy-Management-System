<?php
    session_start();
    include("db_connect.php");
    $pharmacist_id = $_GET["id"];

    $results = mysqli_query($con,"SELECT * from pharmacist where pharmacist_id=$pharmacist_id");
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
        <title>Update Pharmacist</title>
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
            label{
                border: 0;
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
    </head>
    <body>
        <form method="post">  
            <h1>Update Pharmacist</h1>
            <input name="first_name" type="text" placeholder="First Name" value="<?php echo $first_name?>"><br>
            <label>Last Name:</label>
            <input name="last_name" type="text" value="<?php echo $last_name?>"><br>
            <label>Staff id:</label>
            <input name="staff_id" type="text" value="<?php echo $staff_id?>"><br>
            <label>Postal Address:</label>
            <input name="postal_address" type="text" value="<?php echo $postal_address?>"><br>
            <label>Phone:</label>
            <input name="phone" type="text" value="<?php echo $phone?>"><br>
            <label>Email:</label>
            <input name="email" type="text" value="<?php echo $email?>"><br>
            <label>Username:</label>
            <input name="username" type="text" value="<?php echo $username?>"><br>
            <label>Password:</label>
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
        $res = mysqli_query($con,"Update pharmacist set first_name='$first_name', last_name='$last_name', staff_id='$staff_id',postal_address='$postal_address',phone='$phone',email='$email',username='$username', password='$password' WHERE pharmacist_id='$pharmacist_id'");
        if($res){
            header("Location:admin_pharmacist.php"); 
        }else{
            echo "error";
        }
    }
?>