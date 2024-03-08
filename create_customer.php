<?php
    include("db_connect.php");
?>

<html>
    <head>
        <title>Create a New Customer</title>
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
            <a href="customer.php">Back</a>
            <a href="index.php">Logout</a>
        </nav>
        <form method="post">
            <h1>Create a new customer</h1>
            <input type="text" name="pres_id" placeholder="Prescription ID">
            <input type="text" name="name" placeholder="Customer Name">
            <input type="text" name="phone" placeholder="Phone Number">
            <select name="gender">
                <option>Male</option>
                <option>Female</option>
            </select>
            <input type="submit" name="submit">
        </form>
    </body>
</html>

<?php
    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        $gender=$_POST["gender"];

        $quer=mysqli_query($con,"select 1+max(pres_id) from customer;");
        $idd=mysqli_fetch_array($quer);
        $pres_id=$idd["0"];

        $query=mysqli_query($con,"insert into customer (pres_id,customer_name,phone,sex) values('$pres_id','$name','$phone','$gender');");
        if($query)
            header("Location:add_medicine.php?pres_id=$pres_id");
        
    }
?>